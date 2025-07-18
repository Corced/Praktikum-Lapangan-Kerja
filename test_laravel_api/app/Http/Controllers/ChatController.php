<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Models\Faq;
use App\Models\Layanan;
use App\Models\RawatJalan;
use App\Models\RuangRawat;
use App\Models\RapidSwab;
use Illuminate\Support\Facades\Log;
use Exception;

class ChatController extends Controller
{
    private function extractKeywords(string $question, string $topic): array
    {
        $cleanQuestion = preg_replace('/[^\w\s]/u', '', mb_strtolower($question));

        // Load topic-specific stopwords from config
        $stopWords = config("alias.stopwords.{$topic}", [
            'apa', 'itu', 'adalah', 'dan', 'di', 'ke', 'dari',
            'yang', 'untuk', 'atau', 'bisa', 'sih', 'ya',
        ]);

        $patterns = [
            '/^(apa\s*(itu|sih|ya)?\s*)/u',
            '/^(bisa\s*(dijelaskan|jelaskan|kasih\s*tau)?\s*)/u',
            '/^(tolong\s*(jelaskan|terangkan|infonya)?\s*)/u',
            '/^(mohon\s*(penjelasan|info|bantuannya)?\s*)/u',
            '/^(boleh\s*(tanya|tau|tahu)?\s*)/u',
            '/^(saya\s*(ingin|mau|pengen)\s*tahu\s*)/u',
            '/^(aku\s*(pengen|mau|ingin)\s*tahu\s*)/u',
            '/^([a-z0-9\s]+)\s+(adalah|itu|ya)\s*\??\s*$/u',
        ];

        $cleanQuestion = preg_replace($patterns, '', $cleanQuestion);

        $keywords = array_filter(
            explode(' ', $cleanQuestion),
            fn($word) => !in_array($word, $stopWords) && strlen($word) > 2
        );

        return array_unique($keywords);
    }

    private function matchEntitiesFromInput(string $input, string $topic): array
    {
        $entityMap = config("alias.map.{$topic}", []);
        
        if (!is_array($entityMap)) {
            Log::warning('Invalid entityMap configuration', ['topic' => $topic, 'entityMap' => $entityMap]);
            return [];
        }

        if (empty($entityMap)) {
            return [];
        }

        $input = mb_strtolower($input);
        $matchedEntities = [];

        foreach ($entityMap as $canonical => $aliases) {
            if (!is_array($aliases)) {
                Log::warning('Invalid aliases for canonical term', ['topic' => $topic, 'canonical' => $canonical, 'aliases' => $aliases]);
                continue;
            }

            if (preg_match('/\b' . preg_quote($canonical, '/') . '\b/ui', $input)) {
                $matchedEntities[] = $canonical;
                continue;
            }

            foreach ($aliases as $alias) {
                if (preg_match('/\b' . preg_quote($alias, '/') . '\b/ui', $input)) {
                    $matchedEntities[] = $canonical;
                    break;
                }
            }
        }

        return array_unique($matchedEntities);
    }

    private function calculateSimilarity(array $dbKeywords, array $userKeywords): float
    {
        $intersection = array_intersect($dbKeywords, $userKeywords);
        $union = array_unique(array_merge($dbKeywords, $userKeywords));
        return count($union) > 0 ? count($intersection) / count($union) : 0.0;
    }

    private function callGeminiApi(string $endpoint, array $payload, int $retries = 3, int $initialDelay = 1000): array
    {
        for ($attempt = 0; $attempt < $retries; $attempt++) {
            try {
                $response = Http::timeout(120)->post($endpoint, $payload);

                if ($response->status() === 503) {
                    $errorData = $response->json();
                    if (isset($errorData['error']['message']) && stripos($errorData['error']['message'], 'overloaded') !== false) {
                        if ($attempt < $retries - 1) {
                            $delay = $initialDelay * pow(2, $attempt); // Exponential backoff
                            usleep($delay * 1000); // Convert ms to microseconds
                            continue;
                        }
                        return [
                            'success' => false,
                            'status' => 503,
                            'message' => 'AI service is overloaded. Please try again later.'
                        ];
                    }
                    // Handle other 503 errors
                    if ($attempt < $retries - 1) {
                        $delay = $initialDelay * pow(2, $attempt);
                        usleep($delay * 1000);
                        continue;
                    }
                    return [
                        'success' => false,
                        'status' => 503,
                        'message' => 'AI service unavailable: ' . ($errorData['error']['message'] ?? 'Unknown error')
                    ];
                }

                if (!$response->successful()) {
                    throw new Exception('API error: ' . $response->body());
                }

                return [
                    'success' => true,
                    'data' => $response->json()
                ];
            } catch (Exception $e) {
                Log::error('Gemini API attempt failed', [
                    'attempt' => $attempt + 1,
                    'error' => $e->getMessage(),
                    'endpoint' => $endpoint,
                    'payload' => $payload
                ]);
                if ($attempt < $retries - 1) {
                    $delay = $initialDelay * pow(2, $attempt);
                    usleep($delay * 1000);
                    continue;
                }
                return [
                    'success' => false,
                    'status' => 500,
                    'message' => 'Error contacting AI service: ' . $e->getMessage()
                ];
            }
        }

        return [
            'success' => false,
            'status' => 500,
            'message' => 'Failed to contact AI service after all retries'
        ];
    }

    public function handle(Request $request)
    {
        $message = $request->input('message');
        $topic = strtolower(str_replace(' ', '_', $request->input('topic', 'faq')));
        $customPrompt = $request->input('prompt');
        $userId = $request->session()->getId(); // Unique session ID for user

        if (empty($message)) {
            return response()->json(['reply' => 'Please provide a message'], 400);
        }

        // Initialize or retrieve chat history from cache
        $cacheKey = "chat_history_{$userId}_{$topic}";
        $chatHistory = Cache::get($cacheKey, []);
        $cacheTTL = 60 * 60 * 24; // 24 hours TTL

        // Map topic to model
        $model = match ($topic) {
            'faq' => Faq::class,
            'layanan' => Layanan::class,
            'rawat_jalan' => RawatJalan::class,
            'ruang_rawat' => RuangRawat::class,
            'rapid_swab' => RapidSwab::class,
            'general' => Faq::class,
            default => null
        };

        if (!$model) {
            Log::warning('Invalid topic provided', ['topic' => $topic]);
            return response()->json(['reply' => 'Invalid topic provided'], 400);
        }

        $userMessage = mb_strtolower(trim(strip_tags($message)));
        $matchedResponses = [];

        // Try entity-based matching first
        $matchedEntities = $this->matchEntitiesFromInput($userMessage, $topic);
        if (!empty($matchedEntities)) {
            $entries = $model::where(function ($query) use ($matchedEntities) {
                foreach ($matchedEntities as $entity) {
                    $query->orWhere('question', 'LIKE', "%{$entity}%");
                }
            })->get();

            if ($entries->isNotEmpty()) {
                $matchedResponses = $entries->pluck('answer')->toArray();
            }
        }

        // If no entity matches, try keyword-based matching
        if (empty($matchedResponses)) {
            $entries = $model::all();
            $userKeywords = $this->extractKeywords($userMessage, $topic);

            foreach ($entries as $item) {
                $found = false;
                $cleanQuestion = mb_strtolower(trim(strip_tags($item->question)));
                $dbKeywords = $this->extractKeywords($cleanQuestion, $topic);

                switch ($item->match_type) {
                    case 'exact':
                        $found = strcasecmp($cleanQuestion, $userMessage) === 0;
                        break;

                    case 'contains':
                        if (empty($dbKeywords)) {
                            $found = mb_stripos($userMessage, $cleanQuestion) !== false;
                        } else {
                            $similarity = $this->calculateSimilarity($dbKeywords, $userKeywords);
                            $found = $similarity > 0.7;
                        }
                        break;

                    case 'regex':
                        $found = @preg_match($item->question, $userMessage) === 1;
                        break;
                }

                if ($found) {
                    $matchedResponses[] = $item->answer;
                }
            }
        }

        $responseData = null;
        if (!empty($matchedResponses)) {
            $responseData = [
                'reply' => implode("\n<hr>\n", $matchedResponses),
                'source' => $topic,
            ];
        } else {
            // Log unmatched queries for future analysis
            Log::info('Unmatched query', ['topic' => $topic, 'message' => $message]);

            // Fallback to LLM
            $prompt = ($customPrompt ?: "Anda adalah asisten perawatan kesehatan yang berspesialisasi dalam {$topic}. 
            Memberikan informasi yang akurat dan ringkas.") . "\nRelevant entities: " . implode(', ', $matchedEntities) . "\nQ: {$message}\nA:";

            $apiKey = env('GEMINI_API_KEY');
            if (empty($apiKey)) {
                return response()->json(['reply' => 'API key not configured'], 500);
            }

            $endpoint = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash-preview-05-20:generateContent?key={$apiKey}";

            // Call Gemini API with retry logic
            $result = $this->callGeminiApi($endpoint, [
                'contents' => [
                    ['parts' => [['text' => $prompt]]]
                ]
            ], 3, 1000);

            if (!$result['success']) {
                Log::error('Gemini API failed after retries', ['status' => $result['status'], 'message' => $result['message']]);
                return response()->json(['reply' => $result['message']], $result['status']);
            }

            $reply = $result['data']['candidates'][0]['content']['parts'][0]['text'] ?? 'No reply available';
            $responseData = [
                'reply' => $reply,
                'source' => 'LLM',
            ];
        }

        // Store in cache
        $chatHistory[] = [
            'user_message' => $message,
            'ai_reply' => $responseData['reply'],
            'source' => $responseData['source'],
            'timestamp' => now()->toIso8601String(),
        ];

        // Limit cache to last 50 messages to prevent excessive growth
        if (count($chatHistory) > 50) {
            $chatHistory = array_slice($chatHistory, -50);
        }

        Cache::put($cacheKey, $chatHistory, $cacheTTL);

        return response()->json($responseData);
    }

    public function getChatHistory(Request $request)
    {
        $topic = strtolower(str_replace(' ', '_', $request->input('topic', 'faq')));
        $userId = $request->session()->getId();
        $cacheKey = "chat_history_{$userId}_{$topic}";
        $chatHistory = Cache::get($cacheKey, []);

        return response()->json(['history' => $chatHistory]);
    }
}
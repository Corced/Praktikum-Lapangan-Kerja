<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Faq;
use App\Models\Layanan;

class ChatController extends Controller
{
    /**
     * Extract keywords by removing general stopwords only.
     */
    private function extractKeywords(string $question): array
    {
        // Normalize: remove punctuation, lowercase
        $cleanQuestion = preg_replace('/[^\w\s]/u', '', mb_strtolower($question));

        // Hanya stopwords umum — jangan masukkan kata domain!
        $stopWords = [
            'apa', 'itu', 'adalah', 'bagaimana', 'dengan', 'dan',
            'di', 'ke', 'dari', 'yang', 'untuk', 'atau'
        ];

        $keywords = array_filter(
            explode(' ', $cleanQuestion),
            fn($word) => !in_array($word, $stopWords) && strlen($word) > 0
        );

        return array_unique($keywords);
    }

    /**
     * Handle incoming chat request.
     */
    public function handle(Request $request)
    {
        $message = $request->input('message');
        $topic = $request->input('topic', 'faq');
        $customPrompt = $request->input('prompt');

        $matchedResponses = [];

        if ($message) {
            $userMessage = mb_strtolower(trim($message));

            if ($topic === 'faq') {
                $faqs = Faq::all();

                foreach ($faqs as $faq) {
                    $found = false;

                    switch ($faq->match_type) {
                        case 'exact':
                            if (strcasecmp(trim($faq->question), $userMessage) === 0) {
                                $found = true;
                            }
                            break;

                        case 'contains':
                            $keywords = $this->extractKeywords($faq->question);

                            if (count($keywords) === 0) {
                                if (mb_stripos($userMessage, mb_strtolower(trim($faq->question))) !== false) {
                                    $found = true;
                                }
                            } else {
                                foreach ($keywords as $keyword) {
                                    if (mb_stripos($userMessage, $keyword) !== false) {
                                        $found = true;
                                        break;
                                    }
                                }
                            }
                            break;

                        case 'regex':
                            if (@preg_match($faq->question, $userMessage)) {
                                $found = true;
                            }
                            break;
                    }

                    if ($found) {
                        $matchedResponses[] = $faq->answer;
                    }
                }
            } elseif ($topic === 'layanan') {
                $layanans = Layanan::all();

                foreach ($layanans as $layanan) {
                    $found = false;
                    $keywords = $this->extractKeywords($layanan->question);

                    switch ($layanan->match_type) {
                        case 'exact':
                            if (strcasecmp(trim($layanan->question), $userMessage) === 0) {
                                $found = true;
                            }
                            break;

                        case 'contains':
                            if (count($keywords) === 0) {
                                if (mb_stripos($userMessage, mb_strtolower(trim($layanan->question))) !== false) {
                                    $found = true;
                                }
                            } else {
                                foreach ($keywords as $keyword) {
                                    if (mb_stripos($userMessage, $keyword) !== false) {
                                        $found = true;
                                        break;
                                    }
                                }
                            }
                            break;

                        case 'regex':
                            if (@preg_match($layanan->question, $userMessage)) {
                                $found = true;
                            }
                            break;
                    }

                    if ($found) {
                        $matchedResponses[] = $layanan->answer;
                    }
                }
            }
        }

        if (count($matchedResponses) > 0) {
            return response()->json([
                'reply' => implode("\n<hr>\n", $matchedResponses),
                'source' => $topic === 'faq' ? 'FAQ' : 'Layanan',
            ]);
        }

        // ✅ Fallback only if no match found
        $prompt = ($customPrompt ?: "You are a helpful assistant.") . "\nQ: {$message}\nA:";

        $apiKey = env('GEMINI_API_KEY');
        $endpoint = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash-preview-05-20:generateContent?key={$apiKey}";

        $response = Http::post($endpoint, [
            'contents' => [
                ['parts' => [['text' => $prompt]]]
            ]
        ]);

        if (!$response->successful()) {
            return response()->json(['reply' => 'API error: ' . $response->body()], 500);
        }

        $json = $response->json();
        $reply = $json['candidates'][0]['content']['parts'][0]['text'] ?? 'No reply';

        return response()->json([
            'reply' => $reply,
            'source' => 'LLM',
        ]);
    }
}

<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatController extends Controller
{
    public function handle(Request $request)
    {
        $message = $request->input('message');
        $topic = $request->input('topic, faq' ); // User can specify topic
        $customPrompt = $request->input('prompt');


        $faqs = [
            "Mengapa kami Selalu Terdepan?" => "Kami didukung lebih dari 60 dokter spesialis dan sub spesialis, 15 dokter umum dan 2 dokter gigi untuk pelayanan pasien
Kami memiliki kecepatan layanan yang prima dan paripurna dengan didukung adanya pendaftaran online Hallo Soepraoen dan E-Rekam Medis
Kami juga memiliki perlengkapan medis yang modern dan lengkap, seperti treadmill, Ct Scan, dll
Sebagai Rumah Sakit rujukan utama seluruh Prajurit, PNS dan Masyarakat di Jawa Timur.",
            "Bagaimana Alur Pendaftaran?" => "Apakah Rumah Sakit Tk. II dr. Soepraoen melayani pasien BPJS? Rumah Sakit Tk. II dr. Soepraoen melayani Pasien BPJS, Pasien Asuransi yang bekerja sama, dan Pasien Umum/Swasta.
Bagaimana Alur Pendaftaran Pasien di Rumah Sakit Tk. II dr. Soepraoen? Pasien yang ingin berobat Rawat Jalan, bisa melakukan pendaftaran secara langsung ataupun secara online. Pasien yang berobat secara langsung, silakan datang ke loket pendaftaran pada hari pemeriksaan dengan membawa Kartu Berobat, Surat Rujukan, dan Kartu BPJS (bagi pasien BPJS), kartu Asuransi (bagi peserta Asuransi). Pelayanan loket pendaftaran buka setiap Senin s.d Jumat 07.00 s.d 12.00 WIB. Untuk pasien yang mendaftar secara online. Silakan klik link ini: https://www.rssoepraoen.co.id/informasi/pendaftaran#anjungan Alur Pendaftaran Pasien Online
Bagaimana Alur Pendaftaran Pasien Baru di Rumah Sakit Tk. II dr. Soepraoen? Pasien baru yang ingin berobat menyerahkan Foto Copy Kartu BPJS dan Foto Copy KTP masing-masing 4 lembar serta membawa Surat Rujukan dari Faskes Tingkat Pertama ke bagian Pendaftaran untuk mendapatkan kartu berobat Rumah Sakit Tk. II dr. Soepraoen.
Bagaimana Alur Pendaftaran Pasien lama di Rumah Sakit Tk. II dr. Soepraoen? Pasien lama yang ingin berobat membawa Surat Rujukan dari Faskes tingkat pertama ke bagian Pendaftaran.
Bagaimana Alur Pendaftaran Pasien Asuransi di Rumah Sakit Tk. II dr. Soepraoen? Bagi peserta Asuransi membawa Kartu Asuransi dan Surat Rujukan dari Faskes tingkat pertama ke bagian Pendaftaran",
            "Bagaimana dengan biaya perawatan pasien?" => "Kami secara khusus melayani pasien dari Prajurit, PNS dan Keluarganya, akan tetapi kami juga melayani masyarakat umum secara luas dengan layanan profesional dan terintegrasi.
Masyarakat umum dapat memakai Jaminan Kesehatan Nasional (JKN), Jasa Raharja, atau asuransi lain yang telah bekerja sama dengan Rumah Sakit Tk. II dr. Soepraoen untuk proses pembiayaan layanan.",
            "Bagaimana Jika ada kesulitan dalam mendapatkan Layanan Kesehatan?" => "Jangan khawatir jika anda memiliki pertanyaan atau keluhan layanan kami, untuk informasi lebih lanjut silahkan menghubungi petugas disini https://www.rssoepraoen.co.id/contact/whatsapp",
            // ...other FAQs...
        ];

        // If the topic is 'faq', do a keyword search in the FAQ questions and answers
        if ($topic === 'faq' && !empty($message)) {
            $matches = [];
            foreach ($faqs as $question => $answer) {
                // If the user's message matches the question exactly or partially
                if (stripos($question, $message) !== false) {
                    $matches[] = $answer;
                }
            }
            if (count($matches) > 0) {
                // Return all matching answers (joined if more than one)
                return response()->json(['reply' => implode('<hr>', $matches)]);
            } else {
                // Optionally, also search in the answers for keywords
                foreach ($faqs as $question => $answer) {
                    if (stripos($answer, $message) !== false) {
                        $matches[] = $answer;
                    }
                }
                if (count($matches) > 0) {
                    return response()->json(['reply' => implode('<hr>', $matches)]);
                }
                return response()->json(['reply' => 'No related FAQ found for your question.']);
            }
        }

        $reply = 'No reply';

        if ($customPrompt) {
            $prompt = $customPrompt . "\nQ: {$message}\nA:";
        } else {
            $prompt = "{{Use a valid and evidence based approach to answer topics such as : {$topic}\nQ: {$message}\nA; Think as yourself as a {$topic} expert, and answer the question based on the topic provided.}}";
        }
        $apiKey = env('GEMINI_API_KEY');
        $endpoint = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key={$apiKey}";

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

        return response()->json(['reply' => $reply]);
    }

        // Get only the FAQ for the requested topic
        /* $faqSection = $this->getFaqSection($topic); */

    // Example implementation
 /*   private function getFaqSection($topic)
    {
        // You can load from DB, file, or hardcode for demo
        Jikalau rumah sakit ingin mengimplimentasikan sistem FAQ, dapat menggunakan array dari sekian banyaknya pertanyaan
        yang akan dimasukkan ke $faqs dari rumah sakit.
        $faqs = [
            'hospital_installation' => "Q: How do I install hospital equipment?\nA: Follow the manufacturer's guidelines...",
            'other_topic' => "Q: How do I ...?\nA: ..."
        ];
        return $faqs[$topic] ?? "No FAQ available for this topic.";
    }
*/
}
<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;
use App\Models\User;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        Faq::create([
            'question' => 'Mengapa kami Selalu Terdepan?',
            'answer' => '<br><p>Kami didukung lebih dari 60 dokter spesialis dan sub spesialis, 15 dokter umum dan 2 dokter gigi untuk pelayanan pasien
Kami memiliki kecepatan layanan yang prima dan paripurna dengan didukung adanya pendaftaran online Hallo Soepraoen dan E-Rekam Medis
Kami juga memiliki perlengkapan medis yang modern dan lengkap, seperti treadmill, Ct Scan, dll
Sebagai Rumah Sakit rujukan utama seluruh Prajurit, PNS dan Masyarakat di Jawa Timur.</p></br>',
            'match_type' => 'contains',
        ]);

        Faq::create([
            'question' => 'Bagaimana Alur Pendaftaran?',
            'answer' => '<br><p>Apakah Rumah Sakit Tk. II dr. Soepraoen melayani pasien BPJS? Rumah Sakit Tk. II dr. Soepraoen melayani Pasien BPJS, Pasien Asuransi yang bekerja sama, dan Pasien Umum/Swasta.
Bagaimana Alur Pendaftaran Pasien di Rumah Sakit Tk. II dr. Soepraoen? Pasien yang ingin berobat Rawat Jalan, bisa melakukan pendaftaran secara langsung ataupun secara online. Pasien yang berobat secara langsung, silakan datang ke loket pendaftaran pada hari pemeriksaan dengan membawa Kartu Berobat, Surat Rujukan, dan Kartu BPJS (bagi pasien BPJS), kartu Asuransi (bagi peserta Asuransi). Pelayanan loket pendaftaran buka setiap Senin s.d Jumat 07.00 s.d 12.00 WIB. Untuk pasien yang mendaftar secara online. 
Silakan klik link ini: <a href="https://www.rssoepraoen.co.id/informasi/pendaftaran#anjungan">Alur Pendaftaran Pasien Online</a>
Bagaimana Alur Pendaftaran Pasien Baru di Rumah Sakit Tk. II dr. Soepraoen? Pasien baru yang ingin berobat menyerahkan Foto Copy Kartu BPJS dan Foto Copy KTP masing-masing 4 lembar serta membawa Surat Rujukan dari Faskes Tingkat Pertama ke bagian Pendaftaran untuk mendapatkan kartu berobat Rumah Sakit Tk. II dr. Soepraoen.
Bagaimana Alur Pendaftaran Pasien lama di Rumah Sakit Tk. II dr. Soepraoen? Pasien lama yang ingin berobat membawa Surat Rujukan dari Faskes tingkat pertama ke bagian Pendaftaran.
Bagaimana Alur Pendaftaran Pasien Asuransi di Rumah Sakit Tk. II dr. Soepraoen? Bagi peserta Asuransi membawa Kartu Asuransi dan Surat Rujukan dari Faskes tingkat pertama ke bagian Pendaftaran</p></br>',
            'match_type' => 'contains',
        ]);
        Faq::create([
            'question' => 'Bagaimana dengan biaya perawatan pasien?',
            'answer' => '<br><p>Kami secara khusus melayani pasien dari Prajurit, PNS dan Keluarganya, akan tetapi kami juga melayani masyarakat umum secara luas dengan layanan profesional dan terintegrasi.
Masyarakat umum dapat memakai Jaminan Kesehatan Nasional (JKN), Jasa Raharja, atau asuransi lain yang telah bekerja sama dengan Rumah Sakit Tk. II dr. Soepraoen untuk proses pembiayaan layanan.</p></br>',
            'match_type' => 'contains',
        ]);
        Faq::create([
            'question' => 'Bagaimana Jika ada kesulitan dalam mendapatkan Layanan Kesehatan?',
            'answer' => '<br><p>Jangan khawatir jika anda memiliki pertanyaan atau keluhan layanan kami, untuk informasi lebih lanjut silahkan menghubungi petugas <a href="https://www.rssoepraoen.co.id/contact/whatsapp">Disini</a></p></br>',
            'match_type' => 'contains',
        ]);
        Faq::create([
            'question' => 'Bagaimana cara pendaftaran offline?',
            'answer' => '<br><p>Untuk pendaftaran pasien secara offline<br><img href="/pendaftaran-offline.png"></br></p></br>',
            'match_type' => 'contains',
        ]);
        Faq::create([
            'question' => 'Bagaimana cara pendaftaran online?',
            'answer' => '<div class="flex flex-col md:flex-row justify-center items-center gap-6 p-4">
  <!-- Pasien BPJS -->
  <div class="w-full md:w-1/2 flex flex-col justify-center items-center p-4">
    <img
      src="/pasienbpjs.png"
      alt="QR Pasien BPJS"
      class="w-40 sm:w-48 md:w-56 h-auto object-contain"
    />
    <p class="mt-4 text-center text-gray-700 text-sm sm:text-base">
      Untuk pendaftaran pasien secara online
    </p>
    <a
      href="https://play.google.com/store/apps/details?id=app.bpjs.mobile&hl=id&gl=US&pli=1"
      class="bg-blue-900 text-white text-sm sm:text-base px-5 py-2 rounded-md mt-2"
    >
      Pendaftaran Online (Pasien BPJS - Mobile JKN)
    </a>
  </div>

  <!-- Pasien Swasta -->
  <div class="w-full md:w-1/2 flex flex-col justify-center items-center p-4">
    <img
      src="/pasienswasta.png"
      alt="QR Pasien Swasta"
      class="w-40 sm:w-48 md:w-56 h-auto object-contain"
    />
    <p class="mt-4 text-center text-gray-700 text-sm sm:text-base">
      Untuk pendaftaran pasien secara online
    </p>
    <a
      href="https://play.google.com/store/apps/details?id=com.rstds.halosoepraoen&pcampaignid=web_share"
      class="bg-blue-900 text-white text-sm sm:text-base px-5 py-2 rounded-md mt-2"
    >
      Pendaftaran Online (Pasien Swasta - Halo Soepraoen)
    </a>
  </div>
</div>
',
            'match_type' => 'contains',
        ]);
    }
}

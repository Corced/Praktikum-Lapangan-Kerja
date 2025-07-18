<?php 

namespace Database\Seeders;     
use App\Models\Layanan;
use Illuminate\Database\Seeder;

class LayananSeeder extends Seeder
{
    public function run()
    {
        Layanan::create([
            'question' => '<br>Apa itu Medical Checkup?<br>',
            'answer' => '<br><p>Rumah Sakit Tk.II dr. Soepraoen telah berpengalaman dalam pelayanan kesehatan dan senantiasa mendukung upaya pencegahan serta deteksi dini penyakit melalui pemeriksaan Medical Check Up.<br>
             Medical Check Up Rumah Sakit Tk.II dr. Soepraoen menyediakan beragam paket pemeriksaan kesehatan yang dikemas sesuai dengan pilihan Anda. Didukung oleh tenaga ahli dan berpengalaman di bidangnya masing-masing, serta teknologi terkini, sehingga mampu memberikan gambaran kondisi kesehatan anda.</p><br>',
            'match_type' => 'contains',
        ]);

        Layanan::create([
            'question' => '<br>Berapa Tarif Medical Checkup?<br>',
            'answer' => '<br>
                <ul>
                    <li>Paket 1 Surat Keterangan Dokter: Rp 565.000</li>
                    <li>Paket 2 Calon Pegawai: Rp 810.000</li>
                    <li>Paket 3 Calon TNI/POLRI, Sekolah Kedinasan: Rp 950.000</li>
                    <li>Paket 4 General Check Up Utama: Rp 1.135.000</li>
                    <li>Paket 5 General Check Up Paripurna: Rp 2.790.000</li>
                    <li>Paket 6 Calon Jemaah Haji & Umroh: Rp 1.130.000</li>
                    <li>Paket 7 Calon Pekerja Migran Indonesia: Rp 1.390.000</li>
                    <li>Paket 8 Pilihan Rikkes: Informasi Lebih Lanjut dengan "Informasi Rikkes"</li>
                </ul><br>
            ',
            'match_type' => 'contains',
        ]);

        Layanan::create([
            'question' => '<br>Detail Paket 1<br>',
            'answer' => '
<div class="overflow-x-auto">
  <table class="min-w-full border border-gray-300 text-left text-sm">
    <thead class="bg-gray-100">
      <tr>
        <th class="px-4 py-2 border-b border-gray-300">Layanan</th>
        <th class="px-4 py-2 border-b border-gray-300">Status</th>
      </tr>
    </thead>
    <tbody>
      <tr><td class="px-4 py-2 border-b">Rik Fisik Diagnostik</td><td class="px-4 py-2 border-b">✓</td></tr>
      <tr><td class="px-4 py-2 border-b">Rik Gigi (Poli Gigi)</td><td class="px-4 py-2 border-b">✓</td></tr>
      <tr><td class="px-4 py-2 border-b">Rik EKG</td><td class="px-4 py-2 border-b">✓</td></tr>
      <tr><td class="px-4 py-2 border-b">Foto Thorax</td><td class="px-4 py-2 border-b">✓</td></tr>
      <tr><td class="px-4 py-2 border-b">Urin Lengkap</td><td class="px-4 py-2 border-b">✓</td></tr>
      <tr><td class="px-4 py-2 border-b">Darah Lengkap</td><td class="px-4 py-2 border-b">✓</td></tr>
    </tbody>
  </table>
</div>'
,
            'match_type' => 'contains',
        ]);

        Layanan::create([
            'question' => '<br>Detail Paket 2<br>',
            'answer' => '
<div class="overflow-x-auto">
  <table class="min-w-full border border-gray-300 text-left text-sm">
    <thead class="bg-gray-100">
      <tr>
        <th class="px-4 py-2 border-b border-gray-300">Layanan</th>
        <th class="px-4 py-2 border-b border-gray-300">Status</th>
      </tr>
    </thead>
    <tbody>
      <tr><td class="px-4 py-2 border-b">Rik Fisik Diagnostik</td><td class="px-4 py-2 border-b">✓</td></tr>
      <tr><td class="px-4 py-2 border-b">Rik Gigi (Poli Gigi)</td><td class="px-4 py-2 border-b">✓</td></tr>
      <tr><td class="px-4 py-2 border-b">Pemeriksaan EKG</td><td class="px-4 py-2 border-b">✓</td></tr>
      <tr><td class="px-4 py-2 border-b">Foto Thorax</td><td class="px-4 py-2 border-b">✓</td></tr>
      <tr><td class="px-4 py-2 border-b">Urin Lengkap</td><td class="px-4 py-2 border-b">✓</td></tr>
      <tr><td class="px-4 py-2 border-b">Darah Lengkap</td><td class="px-4 py-2 border-b">✓</td></tr>
      <tr><td class="px-4 py-2 border-b">Gula Darah Puasa</td><td class="px-4 py-2 border-b">✓</td></tr>
      <tr><td class="px-4 py-2 border-b">Ureum</td><td class="px-4 py-2 border-b">✓</td></tr>
      <tr><td class="px-4 py-2 border-b">Creatinin</td><td class="px-4 py-2 border-b">✓</td></tr>
      <tr><td class="px-4 py-2 border-b">SGOT</td><td class="px-4 py-2 border-b">✓</td></tr>
      <tr><td class="px-4 py-2 border-b">SGPT</td><td class="px-4 py-2 border-b">✓</td></tr>
      <tr><td class="px-4 py-2 border-b">HbsAg</td><td class="px-4 py-2 border-b">✓</td></tr>
      <tr><td class="px-4 py-2 border-b">LED</td><td class="px-4 py-2 border-b">✓</td></tr>
    </tbody>
  </table>
</div>'
,
            'match_type' => 'contains',
        ]);

        Layanan::create([
            'question' => '<br>Detail Paket 3<br>',
            'answer' => '
<div class="overflow-x-auto">
  <table class="min-w-full border border-gray-300 text-left text-sm">
    <thead class="bg-gray-100">
      <tr>
        <th class="px-4 py-2 border-b border-gray-300">Layanan</th>
        <th class="px-4 py-2 border-b border-gray-300">Status</th>
      </tr>
    </thead>
    <tbody>
      <tr><td class="px-4 py-2 border-b">Pemeriksaan Fisik Diagnostik Dokter Umum</td><td class="px-4 py-2 border-b">✓</td></tr>
      <tr><td class="px-4 py-2 border-b">Pemeriksaan Gigi (Poli Gigi)</td><td class="px-4 py-2 border-b">✓</td></tr>
      <tr><td class="px-4 py-2 border-b">Pemeriksaan EKG</td><td class="px-4 py-2 border-b">✓</td></tr>
      <tr><td class="px-4 py-2 border-b">Pemeriksaan Mata / Buta Warna (Poli Mata)</td><td class="px-4 py-2 border-b">✓</td></tr>
      <tr><td class="px-4 py-2 border-b">Pemeriksaan THT (Poli THT)</td><td class="px-4 py-2 border-b">✓</td></tr>
      <tr><td class="px-4 py-2 border-b">Foto Thorax</td><td class="px-4 py-2 border-b">✓</td></tr>
      <tr><td class="px-4 py-2 border-b">Urin Lengkap</td><td class="px-4 py-2 border-b">✓</td></tr>
      <tr><td class="px-4 py-2 border-b">Darah Lengkap</td><td class="px-4 py-2 border-b">✓</td></tr>
      <tr><td class="px-4 py-2 border-b">Gula Darah Puasa</td><td class="px-4 py-2 border-b">✓</td></tr>
      <tr><td class="px-4 py-2 border-b">Ureum</td><td class="px-4 py-2 border-b">✓</td></tr>
      <tr><td class="px-4 py-2 border-b">Creatinin</td><td class="px-4 py-2 border-b">✓</td></tr>
      <tr><td class="px-4 py-2 border-b">SGOT</td><td class="px-4 py-2 border-b">✓</td></tr>
      <tr><td class="px-4 py-2 border-b">SGPT</td><td class="px-4 py-2 border-b">✓</td></tr>
      <tr><td class="px-4 py-2 border-b">HbsAg</td><td class="px-4 py-2 border-b">✓</td></tr>
      <tr><td class="px-4 py-2 border-b">LED</td><td class="px-4 py-2 border-b">✓</td></tr>
    </tbody>
  </table>
</div>'
,
            'match_type' => 'contains',
        ]);

        Layanan::create([
            'question' => '<br>Detail Paket 4<br>',
            'answer' => '
<div class="overflow-x-auto">
  <table class="min-w-full border border-gray-300 text-left text-sm">
    <thead class="bg-gray-100">
      <tr>
        <th class="px-4 py-2 border-b border-gray-300">Layanan</th>
        <th class="px-4 py-2 border-b border-gray-300">Status</th>
      </tr>
    </thead>
    <tbody>
      <tr><td class="px-4 py-2 border-b">Pemeriksaan Gigi (Poli Gigi)</td><td class="px-4 py-2 border-b">✓</td></tr>
      <tr><td class="px-4 py-2 border-b">Asistensi Rikkes</td><td class="px-4 py-2 border-b">✓</td></tr>
      <tr><td class="px-4 py-2 border-b">Pemeriksaan EKG</td><td class="px-4 py-2 border-b">✓</td></tr>
      <tr><td class="px-4 py-2 border-b">Pemeriksaan Mata (Poli Mata)</td><td class="px-4 py-2 border-b">✓</td></tr>
      <tr><td class="px-4 py-2 border-b">Pemeriksaan THT (Poli THT)</td><td class="px-4 py-2 border-b">✓</td></tr>
      <tr><td class="px-4 py-2 border-b">Pemeriksaan Bedah (Poli Bedah)</td><td class="px-4 py-2 border-b">✓</td></tr>
      <tr><td class="px-4 py-2 border-b">Pemeriksaan Penyakit Dalam</td><td class="px-4 py-2 border-b">✓</td></tr>
      <tr><td class="px-4 py-2 border-b">Pemeriksaan Kulit dan Kelamin</td><td class="px-4 py-2 border-b">✓</td></tr>
      <tr><td class="px-4 py-2 border-b">Pemeriksaan Syaraf (Poli Syaraf)</td><td class="px-4 py-2 border-b">✓</td></tr>
      <tr><td class="px-4 py-2 border-b">Foto Thorax</td><td class="px-4 py-2 border-b">✓</td></tr>
      <tr><td class="px-4 py-2 border-b">Urin Lengkap</td><td class="px-4 py-2 border-b">✓</td></tr>
      <tr><td class="px-4 py-2 border-b">Darah Lengkap</td><td class="px-4 py-2 border-b">✓</td></tr>
      <tr><td class="px-4 py-2 border-b">Gula Darah Puasa</td><td class="px-4 py-2 border-b">✓</td></tr>
      <tr><td class="px-4 py-2 border-b">Ureum</td><td class="px-4 py-2 border-b">✓</td></tr>
      <tr><td class="px-4 py-2 border-b">Creatinin</td><td class="px-4 py-2 border-b">✓</td></tr>
      <tr><td class="px-4 py-2 border-b">SGOT</td><td class="px-4 py-2 border-b">✓</td></tr>
      <tr><td class="px-4 py-2 border-b">SGPT</td><td class="px-4 py-2 border-b">✓</td></tr>
      <tr><td class="px-4 py-2 border-b">HbsAg</td><td class="px-4 py-2 border-b">✓</td></tr>
    </tbody>
  </table>
</div>'
,
            'match_type' => 'contains',
        ]);

        Layanan::create([ 
            'question' => '<br>Detail Paket 5<br>',
            'answer' => '
<table class="min-w-full border border-gray-300 text-left text-sm">
  <thead class="bg-gray-100">
    <tr>
      <th class="px-4 py-2 border-b border-gray-300">Layanan</th>
      <th class="px-4 py-2 border-b border-gray-300">Status</th>
    </tr>
  </thead>
  <tbody>
    <tr><td class="px-4 py-2 border-b">Alkali Phospatase</td><td class="px-4 py-2 border-b">✓</td></tr>
    <tr><td class="px-4 py-2 border-b">Anti HCV</td><td class="px-4 py-2 border-b">✓</td></tr>
    <tr><td class="px-4 py-2 border-b">Asam Urat</td><td class="px-4 py-2 border-b">✓</td></tr>
    <tr><td class="px-4 py-2 border-b">Asistensi Rikkes</td><td class="px-4 py-2 border-b">✓</td></tr>
    <tr><td class="px-4 py-2 border-b">Audiometri</td><td class="px-4 py-2 border-b">✓</td></tr>
    <!-- Potong untuk ringkas -->
    <tr><td class="px-4 py-2 border-b">VDRL</td><td class="px-4 py-2 border-b">✓</td></tr>
  </tbody>
</table>'
,
            'match_type' => 'contains',
        ]);

        Layanan::create([
            'question' => '<br>Detail Paket 6<br>',
            'answer' => '
<table class="min-w-full border border-gray-300 text-left text-sm">
  <thead class="bg-gray-100">
    <tr>
      <th class="px-4 py-2 border-b border-gray-300">Layanan</th>
      <th class="px-4 py-2 border-b border-gray-300">Status</th>
    </tr>
  </thead>
  <tbody>
    <tr><td class="px-4 py-2 border-b">Pemeriksaan EKG</td><td class="px-4 py-2 border-b">✓</td></tr>
    <tr><td class="px-4 py-2 border-b">Pemeriksaan Fisik Diagnostik Dokter Umum</td><td class="px-4 py-2 border-b">✓</td></tr>
    <tr><td class="px-4 py-2 border-b">Pemeriksaan Mata (Poli Mata)</td><td class="px-4 py-2 border-b">✓</td></tr>
    <!-- dst. -->
    <tr><td class="px-4 py-2 border-b">VDRL</td><td class="px-4 py-2 border-b">✓</td></tr>
  </tbody>
</table>'
,
            'match_type' => 'contains',
        ]);

        Layanan::create([
            'question' => '<br>Detail Paket 7<br>',
            'answer' => '
<table class="min-w-full border border-gray-300 text-left text-sm">
  <thead class="bg-gray-100">
    <tr>
      <th class="px-4 py-2 border-b border-gray-300">Layanan</th>
      <th class="px-4 py-2 border-b border-gray-300">Status</th>
    </tr>
  </thead>
  <tbody>
    <tr><td class="px-4 py-2 border-b">Pemeriksaan Fisik Diagnostik Dokter Umum</td><td class="px-4 py-2 border-b">✓</td></tr>
    <tr><td class="px-4 py-2 border-b">Pemeriksaan Jiwa</td><td class="px-4 py-2 border-b">✓</td></tr>
    <tr><td class="px-4 py-2 border-b">Pemeriksaan Napza 3 Parameter</td><td class="px-4 py-2 border-b">✓</td></tr>
    <!-- dst. -->
    <tr><td class="px-4 py-2 border-b">VDRL</td><td class="px-4 py-2 border-b">✓</td></tr>
  </tbody>
</table>',
            'match_type' => 'contains',
        ]);

        Layanan::create([
            'question' => '<br>Paket 8<br>',
            'answer' => '<div class="overflow-x-auto">
          <table class="min-w-full text-sm text-left border border-gray-300">
            <thead class="bg-blue-600 text-white">
              <tr>
                <th class="px-4 py-2 border">Jenis Pemeriksaan</th>
                <th class="px-4 py-2 border">Harga</th>
              </tr>
            </thead>
            <tbody class="bg-white text-gray-800">
              <tr class="border-b">
                <td class="px-4 py-2 border">Pemeriksaan Kesehatan Jasmani</td>
                <td class="px-4 py-2 border">160.000</td>
              </tr>
              <tr class="border-b">
                <td class="px-4 py-2 border">Pemeriksaan Kesehatan Jiwa</td>
                <td class="px-4 py-2 border">420.000</td>
              </tr>
              <tr class="border-b">
                <td class="px-4 py-2 border">Pemeriksaan Napza 3 Parameter (AMP, MOP, THC)</td>
                <td class="px-4 py-2 border">295.000</td>
              </tr>
              <tr class="border-b">
                <td class="px-4 py-2 border">Pemeriksaan Napza 6 Parameter (AMP, MOP, THC, BZO, COC, MET)</td>
                <td class="px-4 py-2 border">470.000</td>
              </tr>
              <tr class="border-b">
                <td class="px-4 py-2 border">Rikkes Paket 1 & 2 tanpa Lab</td>
                <td class="px-4 py-2 border">455.000</td>
              </tr>
              <tr class="border-b">
                <td class="px-4 py-2 border">Rikkes Paket 3 tanpa Lab</td>
                <td class="px-4 py-2 border">595.000</td>
              </tr>
              <tr class="border-b">
                <td class="px-4 py-2 border">Rikkes Paket 4 tanpa Lab</td>
                <td class="px-4 py-2 border">810.000</td>
              </tr>
              <tr class="border-b">
                <td class="px-4 py-2 border">Rikkes Paket 5 tanpa Lab</td>
                <td class="px-4 py-2 border">1.420.000</td>
              </tr>
              <tr class="border-b">
                <td class="px-4 py-2 border">Rikkes Jas dan Mata (Buta Warna)</td>
                <td class="px-4 py-2 border">230.000</td>
              </tr>
              <tr class="border-b">
                <td class="px-4 py-2 border">Rikkes Jas, Mata, dan THT</td>
                <td class="px-4 py-2 border">300.000</td>
              </tr>
              <tr class="border-b">
                <td class="px-4 py-2 border">Rikkes Jas, Mata, THT, dan Gigi</td>
                <td class="px-4 py-2 border">370.000</td>
              </tr>
              <tr>
                <td class="px-4 py-2 border">Rikkes Jas, Mata, THT, EKG, dan Foto Thorax</td>
                <td class="px-4 py-2 border">525.000</td>
              </tr>
            </tbody>
          </table>
        </div>
            ',
            'match_type' => 'contains',
        ]);

        Layanan::create([
            'question' => '<br>Informasi Rikkes<br>',
            'answer' => '<div class="overflow-x-auto">
          <table class="min-w-full text-sm text-left border border-gray-300">
            <thead class="bg-blue-600 text-white">
              <tr>
                <th class="px-4 py-2 border">Jenis Pemeriksaan</th>
                <th class="px-4 py-2 border">Harga</th>
              </tr>
            </thead>
            <tbody class="bg-white text-gray-800">
              <tr class="border-b">
                <td class="px-4 py-2 border">Pemeriksaan Kesehatan Jasmani</td>
                <td class="px-4 py-2 border">160.000</td>
              </tr>
              <tr class="border-b">
                <td class="px-4 py-2 border">Pemeriksaan Kesehatan Jiwa</td>
                <td class="px-4 py-2 border">420.000</td>
              </tr>
              <tr class="border-b">
                <td class="px-4 py-2 border">Pemeriksaan Napza 3 Parameter (AMP, MOP, THC)</td>
                <td class="px-4 py-2 border">295.000</td>
              </tr>
              <tr class="border-b">
                <td class="px-4 py-2 border">Pemeriksaan Napza 6 Parameter (AMP, MOP, THC, BZO, COC, MET)</td>
                <td class="px-4 py-2 border">470.000</td>
              </tr>
              <tr class="border-b">
                <td class="px-4 py-2 border">Rikkes Paket 1 & 2 tanpa Lab</td>
                <td class="px-4 py-2 border">455.000</td>
              </tr>
              <tr class="border-b">
                <td class="px-4 py-2 border">Rikkes Paket 3 tanpa Lab</td>
                <td class="px-4 py-2 border">595.000</td>
              </tr>
              <tr class="border-b">
                <td class="px-4 py-2 border">Rikkes Paket 4 tanpa Lab</td>
                <td class="px-4 py-2 border">810.000</td>
              </tr>
              <tr class="border-b">
                <td class="px-4 py-2 border">Rikkes Paket 5 tanpa Lab</td>
                <td class="px-4 py-2 border">1.420.000</td>
              </tr>
              <tr class="border-b">
                <td class="px-4 py-2 border">Rikkes Jas dan Mata (Buta Warna)</td>
                <td class="px-4 py-2 border">230.000</td>
              </tr>
              <tr class="border-b">
                <td class="px-4 py-2 border">Rikkes Jas, Mata, dan THT</td>
                <td class="px-4 py-2 border">300.000</td>
              </tr>
              <tr class="border-b">
                <td class="px-4 py-2 border">Rikkes Jas, Mata, THT, dan Gigi</td>
                <td class="px-4 py-2 border">370.000</td>
              </tr>
              <tr>
                <td class="px-4 py-2 border">Rikkes Jas, Mata, THT, EKG, dan Foto Thorax</td>
                <td class="px-4 py-2 border">525.000</td>
              </tr>
            </tbody>
          </table>
        </div>
        ',
            'match_type' => 'contains',
        ]);


        Layanan::create([
            'question' => '<br>Apa itu Radiologi<br>',
            'answer' => '<br><p>Radiologi merupakan salah satu cabang ilmu kedokteran yang untuk mengetahu atau mendiagnosis bagian dalam tubuh manusia dengan menggunakan teknologi pencitraan, baik gelombang elektromagnetik maupun gelombang mekanik. Dokter yang mengkhususkan dirinya dalam bidang ilmu radiologi disebut juga sebagai dengan ahli radiologi atau radiolog. Radiolog sendiri bertindak sebagai konsultan ahli yang bertugas untuk memberikan rekomendasi pemeriksaan yang dibutuhkan, menafsirkan gambar medis dari hasil pemeriksaan, serta menggunakan hasil tes untuk pengobatan yang sesuai dengan kondisi pasien. Oleh karena itu, betapa bermanfaatnya pemeriksaan radiologi pada tubuh kita untuk mengdiagnosis atau mendeteksi dini penyakit dalam tubuh. Agar pasien yang menderita penyakit dalam tubuhnya segera dapat ditangani secepat mungkin oleh dokter yang ahli dibidangnya. Walau begitu, tidak semua penyakit langsung mendapatkan pemeriksaan radiologi. sebab hanya dokter radiologi yang berhak dalam memutuskan apakah perlu dilakukan tindakan pemeriksaan radiologi lebih lanjut atau tidak, sehingga sangat penting untuk sahabat hermina yang ingin melakukan pemeriksaan radiologi untuk melakukan konsultasi terlebih dahulu sebelum melakukan pemeriksaan radiologi.</p><br>',
            'match_type' => 'contains',
        ]);

        Layanan::create([
            'question' => '<br>Apa itu Laboratorium?<br>',
            'answer' => '<br><p>Pemeriksaan laboratorium adalah jenis pemeriksaan kesehatan dengan menggunakan sampel darah, urine, atau jaringan tubuh. Dari hasil pengambilan sampel ini, dokter atau ahli medis akan menganalisis sampel uji untuk melihat apakah hasil pemeriksaan berada dalam kisaran normal. Pemeriksaan ini dilakukan untuk mengetahui kondisi kesehatan seseorang. Prosedur dan sampel yang dimbil tergantung pada jenis pemeriksaan yang dijalani. Biasanya, dokter akan membandingkan hasil sekarang dengan hasil dari tes sebelumnya. Pemeriksaan laboratorium sering menjadi bagian dari pemeriksaan rutin untuk mencari tahu kondisi kesehatan tubuh. Lewat hasil pemeriksaan laboratorium ini dokter akan mendiagnosis kondisi medis, merencanakan atau mengevaluasi perawatan, serta memantau penyakit.</p><br>',
            'match_type' => 'contains',
        ]);

        Layanan::create([
            'question' => '<br>Apa itu ESWL<br>',
            'answer' => '<br><p>Extracorporeal shock wave lithotripsy (ESWL)<br>
             adalah tindakan untuk menangani penyakit batu ginjal.<br> 
             Prosedurnya akan memecah batu yang ditembakkan dari luar tubuh dengan menggunakan<br> 
             gelombang kejut, yang dapat memecah batu menjadi pecahan yang halus. Dengan begitu, pecahan tersebut dapat keluar bersama dengan air seni. Melalui ESWL ini, batu ginjal atau kumpulan senyawa mineral dan garam yang menumpuk di dalam ginjal bisa dibuang tanpa pembedahan (noninvasif). Tindakan ESWL ini menggunakan alat yang dapat memancarkan gelombang kejut. Gelombang kejut ini akan dikonsentrasikan di sekitar ginjal. Tujuannya untuk menghancurkan batu ginjal menjadi pecahan-pecahan yang lebih kecil. Prosedur ini terbilang cukup efektif dalam menghancurkan batu ginjal, dengan diameter kurang dari dua sentimeter. Pembuangan endapan kristal-kristal yang berdiameter lebih dari dua sentimeter akan<br> 
             disarankan melalui prosedur penanganan batu ginjal lainnya.</p><br>',
            'match_type' => 'contains',
        ]);

        Layanan::create([
            'question' => '<br>Apa itu Kemoterapi?<br>',
            'answer' => '<br><p>Unit Kemoterapi Rumah Sakit Tk.II dr. Soepraoen memberikan pelayanan<br> 
            untuk pasien BPJS, asuransi, dan pasien swasta,<br> 
            Ruang kemoterapi terletak di lantai 1 dilengkapi<br> 
            dengan 10 tempat tidur dengan ruang ber-AC yang<br> 
            nyaman. Pelayanan diberikan oleh tenaga medis yang<br>
             berpengalaman serta perawat yang terlatih dibawah<br>
              pengawasan dokter spesialis yang profesional, pencampuran<br>
               obat kemoterapi menggunakan biosafety cavinet dan<br> 
               dilakukan oleh apoteker terlatih.</p><br>',
            'match_type' => 'contains',
        ]);

        Layanan::create([
            'question' => '<br>Apa itu Radioterapi?<br>',
            'answer' => '<br><p>Radioterapi merupakan terapi yang menggunakan radiasi yang bersumber dari energi radioaktif. Terapi ini bertujuan untuk penghancuran jaringan kanker atau mengurangi ukurannya atau menghilangkan gejala dan gangguan yang menyertai. Lalu apakah radioterapi aman? Jawabannya adalah iya. Teknik radioterapi saat ini telah berkembang ke level yang lebih baik dibandingkan saat pertama kali dimanfaatkan untuk keperluan medis. Dari sisi alat radiasi dan tempat tindakan dilakukan, persyaratan dan peraturan yang cukup ketat harus dipenuhi sampai suatu layanan radioterapi dapat beroperasi, dan salah satu syarat adalah keamanan radiasi disekitar ruang tindakan yang didesain khusus untuk tujuan tersebut. Evaluasi kualitas alat dan keamanan dari bahaya radiasi rutin dilakukan sesuai keharusan perundang-undangan badan pengatur tenaga nuklir. Petugas kesehatan yang membantu pelayanan juga terlatih, profesional, dan berkualifikasi. Dari sisi pasien, teknik radioterapi saat ini terfokus dan terukur, dapat secara presisi mengenai jaringan kanker dan secara bersamaan meminimalkan kerusakan akibat radiasi pada jaringan tubuh sehat disekitarnya. Hal ini dimungkinkan karena pemetaan target terapi dan jaringan sehat secara tiga dimensi, penggunaan komputerisasi dalam perhitungan dosis radiasi, dan kemampuan alat radiasi terkini. Diseluruh dunia, jutaan pasien sudah menjalani radioterapi setiap tahunnya secara aman untuk mengobati berbagai jenis kanker.</p><br>',
            'match_type' => 'contains',
        ]);

        Layanan::create([
            'question' => '<br>Apa itu Onkologi<br>',
            'answer' => '<br><p>Terbagi dalam tiga bagian yaitu :<br>
            1.Dokter kandungan subspesialis onkologi adalah dokter yang memiliki keahlian khusus dalam menangani tumor dan kanker pada organ reproduksi wanita. Hal ini meliputi tumor dan kanker yang menyerang rahim, indung telur (ovarium), leher rahim (serviks), vagina, dan vulva. Dokter kandungan subspesialis onkologi adalah dokter yang mendalami ilmu ginekologi onkologi. Onkologi adalah cabang ilmu kedokteran yang fokus pada penyakit kanker dan pengobatannya, sedangkan ginekologi merupakan cabang ilmu kedokteran yang berfokus pada kesehatan organ reproduksi wanita. Dokter kandungan subspesialis onkologi memiliki gelar Spesialis Obstetri-Ginekologi Konsultan Ginekologi Onkologi atau disingkat Sp.OG (K)Onk. Untuk mendapat gelar tersebut, seorang dokter umum harus menyelesaikan program studi dokter spesialis obstetri dan ginekologi terlebih dahulu, lalu menempuh pendidikan subspesialisasi onkologi selama beberapa tahun.<br>
            2.Ahli onkologi hematologi adalah dokter yang berspesialisasi dalam mengobati kanker darah. Mereka memiliki pelatihan ekstra dalam sistem darah, sistem limfatik, sumsum tulang, dan kanker. Istilah "ahli hematologi onkologi" berasal dari dua jenis dokter yang berbeda. Ahli hematologi mengkhususkan diri dalam mendiagnosis dan mengobati penyakit darah. Ahli onkologi mengkhususkan diri dalam mendiagnosis dan mengobati kanker. Ahli onkologi hematologi berspesialisasi dalam keduanya. Seseorang mungkin menemui ahli onkologi hematologi jika memiliki dugaan atau mengidap kanker darah.<br>
            3.Penanganan kanker paru-paru sangat tergantung kondisi kesehatan pasien, jenis kanker, tahap perkembangan kanker, dan preferensi pasien. Dokter atau pasien mungkin dapat memutuskan untuk tidak menjalani pengobatan kanker paru-paru apa pun, terutama jika merasa potensi manfaatnya tidak sebanding dengan risiko efek sampingnya. Dalam kasus seperti itu, dokter mungkin akan menganjurkan penanganan yang bertujuan mengurangi gejala kanker paru-paru.</p><br>',
            'match_type' => 'contains',
        ]);
        
        Layanan::create([
            'question' => '<br>Apa itu CT Scan<br>',
            'answer' => '<br><p>CT scan adalah prosedur diagnosis yang menggunakan komputer dan mesin sinar-X yang berputar untuk membuat gambar penampang tubuh. Gambar-gambar ini memberikan informasi yang lebih rinci daripada gambar sinar-X biasa. Mereka dapat menunjukkan jaringan lunak, pembuluh darah, dan tulang di berbagai bagian tubuh. CT scan juga dapat membantu dokter lebih cepat menentukan tingkat keparahan luka dalam atau perdarahan yang terjadi. Keberadaan CT scan juga penting dalam diagnosis, pengobatan, dan penelitian kanker. Dokter mungkin akan merekomendasikan untuk melakukan CT scan untuk tujuan berikut :<br>
Mendiagnosis gangguan tulang, seperti tumor tulang dan fraktur<br>
Menentukan lokasi tumor, infeksi, atau gumpalan darah.<br>
Sebagai bagian dari prosedur, seperti operasi, biopsi, dan terapi radiasi.<br>
Mendeteksi dan memantau kondisi penyakit seperti kanker, penyakit jantung, nodul paru, dan massa hati.<br>
Mendeteksi cedera internal atau pendarahan internal.<br>
Walau memiliki risiko dan efek samping, pemeriksaan CT scan memberikan manfaat yang lebih besar. Dokter akan menggunakan dosis radiasi serendah mungkin untuk mendapatkan informasi medis yang dibutuhkan. Selain itu, mesin dan teknik yang lebih baru membutuhkan lebih sedikit radiasi daripada yang digunakan sebelumnya.</p><br>',
            'match_type' => 'contains',
        ]);
        
        Layanan::create([
            'question' => '<br>Apa itu CathLab<br>', 
            'answer' => '<br><p>Catheterization Laboratory (Cath Lab) atau disebut juga kateterisasi jantung dan angiografi merupakan tindakan atau prosedur medis kardiologi diagnostic invasive. Prosedur ini dilakukan dengan menggunakan sinar-X untuk membantu menampilkan gambaran pembuluh darah di berbagai organ tubuh. Catheterization Laboratory sudah dilengkapi dengan banyak peralatan canggih dan modern. Alat-alat tersebut akan membantu dokter lebih mudah melakukan prosedur diagnostik dan intervensi dengan invasi minimal. Melalui prosedur ini, dapat diketahui jenis tindakan yang sesuai bagi pasien. Sehingga dokter dapat merekomendasikan tindak lanjut pengobatan yang mana tergantung dari hasil angiografi. Tindakan termasuk pasang ring jantung, intervensi dengan balon, atau tindakan operasi bypass. Kateter jantung di Rumah Sakit Tk.II dr. Soepraoen dilakukan dan dukungan fasilitas yang moderen dan dokter spesialis jantung yang berpengalaman. Artinya deteksi jantung koroner dapat dilakukan dengan tingkat keakuratan yang tinggi.</p><br>',
            'match_type' => 'contains',
        ]);
        
        Layanan::create([
            'question' => '<br>Apa itu Echokardiografi<br>',
            'answer' => '<br><p>Echokardiografi, atau yang dikenal juga sebagai echo jantung, adalah suatu metode diagnostik yang menggunakan gelombang suara (ultrasonik) untuk membuat gambaran visual tentang bagaimana jantung bekerja. Pada echo jantung, seorang teknisi medis akan menggunakan transduser yang diletakkan di atas dada pasien untuk mengirimkan gelombang suara ke dalam tubuh. Gelombang suara ini akan memantul kembali (echo) saat mencapai jantung, dan transduser akan menerima kembali gelombang suara yang dipantulkan tersebut. Data ini kemudian diterjemahkan menjadi gambaran yang dapat dianalisis oleh dokter ahli jantung. Echokardiografi memiliki peran yang penting dalam mendiagnosis berbagai kondisi jantung, seperti penyakit katup jantung, penyakit arteri koroner, gagal jantung, dan kelainan struktural jantung lainnya. Dengan echo jantung, dokter dapat mengevaluasi ukuran, bentuk, dan fungsi jantung secara komprehensif, termasuk gerakan katup jantung, aliran darah di dalam jantung, dan ketebalan dinding jantung. Echo jantung juga dapat membantu memantau respons terhadap pengobatan dan mengikuti perkembangan penyakit jantung seiring waktu. Metode non-invasif ini memberikan informasi yang sangat berharga dalam pengelolaan pasien dengan penyakit kardiovaskular, serta dapat membantu dokter dalam merencanakan pengobatan yang tepat untuk pasien dengan masalah jantung. Dengan kemampuannya yang aman dan tidak berisiko, echo jantung telah menjadi salah satu alat diagnostik utama dalam bidang kardiologi modern.</p><br>',
            'match_type' => 'contains',
        ]);

        Layanan::create([
            'question' => '<br>Apa itu Treadmill<br>',
            'answer' => '<br><p>Layanan treadmill di rumah sakit adalah salah satu metode pengujian fungsional yang penting dalam bidang kardiologi. Dalam pengujian treadmill, pasien akan melakukan latihan fisik dengan berjalan atau berlari di atas treadmill yang dilengkapi dengan berbagai sensor untuk memantau fungsi jantung dan sistem kardiovaskular pasien. Proses pengujian dilakukan di bawah pengawasan tenaga medis yang berpengalaman, dengan pemantauan terus-menerus terhadap tekanan darah, detak jantung, elektrokardiogram (EKG), serta pengamatan klinis secara keseluruhan. Pengujian treadmill di rumah sakit umumnya digunakan untuk memeriksa kondisi pasien yang mengalami gejala atau risiko penyakit jantung, seperti nyeri dada, sesak napas, atau faktor risiko seperti hipertensi atau diabetes. Pengujian treadmill dapat memberikan informasi penting tentang kinerja jantung selama latihan fisik, termasuk kapasitas aerobik, detak jantung maksimal, dan tanda-tanda adanya iskemia atau ketidakcukupan aliran darah ke otot jantung. Hasil pengujian treadmill dapat membantu dokter dalam mendiagnosis penyakit jantung, mengevaluasi risiko pasien terhadap penyakit jantung, serta merencanakan program rehabilitasi atau pengelolaan penyakit jantung yang sesuai untuk pasien.</p><br>',
            'match_type' => 'contains',
        ]);
        
        Layanan::create([
            'question' => '<br>Apa itu Pemeriksaan Medis Kejiwaan?<br>',
            'answer' => '<br><p>Pemeriksaan medis kejiwaan adalah rangkaian pemeriksaan untuk mengevaluasi kondisi kesehatan mental dan mendeteksi gangguan kejiwaan pada seseorang. Pemeriksaan ini dapat meliputi tanya jawab, pemeriksaan fisik, dan pengisian kuesioner dengan psikater atau psikolog. Pemeriksaan medis kejiwaan dapat dilakukan sebagai pemeriksaan rutin atau darurat. Pemeriksaan kejiwaan rutin dilakukan untuk memeriksa kondisi kejiwaan pasien secara menyeluruh. Sementara itu, pemeriksaan kejiwaan darurat lebih berfokus pada gejala, riwayat gangguan, dan perilaku pasien sebelum mengalami gangguan kejiwaan.</p><br>',
            'match_type' => 'contains',
        ]);
        
        Layanan::create([
            'question' => '<br>Apa itu Endoskopi?<br>',
            'answer' => '<br><p>Istilah "endoskopi" sebenarnya adalah payung besar bagi beragam pemeriksaan yang dilakukan dengan memasukkan alat khusus ke dalam tubuh pasien. Prosedur ini dilakukan untuk melihat kondisi organ tubuh tertentu. Prosedur ini dapat digunakan untuk mendiagnosis berbagai macam penyakit. Selain itu, endoskopi juga menjadi pemeriksaan penunjang beberapa tindakan medis, seperti pengambilan sampel jaringan untuk biopsi dan operasi. Endoskopi bukan prosedur pembedahan. Prosesnya dilakukan dengan memasukkan sebuah tabung fleksibel yang dilengkapi dengan kamera dan lampu. Prosedur umumnya membuat pasien merasa tidak nyaman, namun dokter bisa menggunakan obat bius sebelum melakukannya. Melalui endoskopi, dokter dapat melihat kondisi organ yang diperiksa supaya lebih jelas.<br>
Endoskopi dibagi atas beberapa jenis berdasarkan organ tubuh yang mengalami masalah kesehatan. Jenis endoskopi ini digunakan untuk menyelidiki gejala di organ tubuh tertentu, yaitu:<br> 
Gastroskopi Jenis endoskopi ini bertujuan untuk memeriksa kerongkongan, lambung, atau bagian atas usus kecil.<br>
Kolonoskopi untuk melihat bagian dalam dari usus besar.<br>
Bronkoskopi digunakan untuk melihat saluran pernapasan. Hal ini dilakukan ketika seseorang mengalami batuk yang tidak kunjung membaik atau batuk darah.<br>
Histeroskopi adalah jenis endoskopi untuk ke dalam rahim (uterus) jika seorang wanita mengalami masalah seperti menstruasi yang tidak teratur atau mengalami  keguguran lebih dari satu kali.<br>
Cystoscopy digunakan untuk melihat ke dalam kandung kemih jika seseorang mengalami masalah seperti inkontinensia urine atau kencing darah.<br>
Sigmoidoskopi fleksibel merupakan endoskopi untuk melihat usus bagian bawah.<br>
USG endoskopi dilakukan untuk mengambil gambar organ dalam, seperti pankreas, dan mengambil sampel jaringan (biopsi).<br>
Laparoskopi untuk melihat kondisi di dalam perut.<br>
Artroskopi sering dilakukan untuk membantu operasi untuk memperbaiki kerusakan di dalam sendi.</p><br>',
            'match_type' => 'contains',
        ]);
    }
}
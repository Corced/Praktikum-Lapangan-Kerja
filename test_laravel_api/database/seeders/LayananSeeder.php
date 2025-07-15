<?php 

namespace Database\Seeders;     
use App\Models\Layanan;
use Illuminate\Database\Seeder;

class LayananSeeder extends Seeder
{
    public function run()
    {
        Layanan::create([
            'question' => 'Apa itu Medical Checkup?',
            'answer' => 'Rumah Sakit Tk.II dr. Soepraoen telah berpengalaman dalam pelayanan kesehatan dan senantiasa mendukung upaya pencegahan serta deteksi dini penyakit melalui pemeriksaan Medical Check Up.
             Medical Check Up Rumah Sakit Tk.II dr. Soepraoen menyediakan beragam paket pemeriksaan kesehatan yang dikemas sesuai dengan pilihan Anda. Didukung oleh tenaga ahli dan berpengalaman di bidangnya masing-masing, serta teknologi terkini, sehingga mampu memberikan gambaran kondisi kesehatan anda.',
            'match_type' => 'contains',
        ]);

        Layanan::create([
            'question' => 'Berapa Tarif Medical Checkup?',
            'answer' => '
                <ul>
                    <li>Paket 1 Surat Keterangan Dokter: Rp 565.000</li>
                    <li>Paket 2 Calon Pegawai: Rp 810.000</li>
                    <li>Paket 3 Calon TNI/POLRI, Sekolah Kedinasan: Rp 950.000</li>
                    <li>Paket 4 General Check Up Utama: Rp 1.135.000</li>
                    <li>Paket 5 General Check Up Paripurna: Rp 2.790.000</li>
                    <li>Paket 6 Calon Jemaah Haji & Umroh: Rp 1.130.000</li>
                    <li>Paket 7 Calon Pekerja Migran Indonesia: Rp 1.390.000</li>
                    <li>Paket 8 Pilihan Rikkes: Informasi Lebih Lanjut dengan "Informasi Rikkes"</li>
                </ul>
            ',
            'match_type' => 'contains',
        ]);

                Layanan::create([
            'question' => 'Detail Paket 1',
            'answer' => 'Rik Fisik Diagnostik

✓

Rik Gigi (Poli Gigi)

✓

Rik EKG

✓

Foto Thorax

✓

Pemeriksaan Lab :
Urin lengkap

✓

Darah lengkap

✓',
            'match_type' => 'contains',
        ]);

                Layanan::create([
            'question' => 'Detail Paket 2',
            'answer' => 'Rik Fisik Diagnostik

✓

Rik Gigi (Poli Gigi)

✓

Pemeriksaan EKG

✓

Foto Thorax

✓

Pemeriksaan Lab :
Urin lengkap

✓

Darah lengkap

✓

Gula darah puasa

✓

Ureum

✓

Creatinin

✓

SGOT

✓

SGPT

✓

HbsAg

✓

LED

✓',




            'match_type' => 'contains',
        ]);

                Layanan::create([
            'question' => 'Detail Paket 3',
            'answer' => 'Pemeriksaan Fisik Diagnostik Dokter Umum

✓

Pemeriksaan Gigi (Poli Gigi)

✓

Pemeriksaan EKG

✓

Pemeriksaan Mata / Buta Warna (poli Mata)

✓

Pemeriksaan THT (Poli THT)

✓

Foto Thorax

✓

Pemeriksaan Lab :
Urin lengkap

✓

Darah lengkap

✓

Gula darah puasa

✓

Ureum

✓

Creatinin

✓

SGOT

✓

SGPT

✓

HbsAg

✓

LED

✓',
            'match_type' => 'contains',
        ]);

                Layanan::create([
            'question' => 'Detail Paket 4',
            'answer' => 'Pemeriksaan Gigi (Poli Gigi)

✓

Asistensi Rikkes

✓

Pemeriksaan EKG

✓

Pemeriksaan Mata (Poli Mata)

✓

Pemeriksaan THT (Poli THT)

✓

Pemeriksaan Bedah (Poli Bedah)

✓

Pemeriksaan Penyakit Dalam

✓

Pemeriksaan Kulit dan Kelamin

✓

Pemeriksaan Syaraf (Poli Syaraf)

✓

Foto Thorax

✓

Pemeriksaan Lab :
Urin lengkap

✓

Darah lengkap

✓

Gula darah puasa

✓

Ureum

✓

Creatinin

✓

SGOT

✓

SGPT

✓

HbsAg

✓.',
            'match_type' => 'contains',
        ]);

        Layanan::create([ 'question' => 'Detail Paket 5',
            'answer' => 'Alkali Phospatase

✓

Anti HCV

✓

Asam Urat

✓

Asistensi Rikkes

✓

Audiometri

✓

Cholesterol HDL

✓

Cholesterol LDL

✓

Cholesterol Total

✓

Pemeriksaan EKG

✓

Pemeriksaan Mata (Poli Mata)

✓

Pemeriksaan Gigi (Poli Gigi)

✓

Pemeriksaan THT (Poli THT)

✓

Pemeriksaan Bedah (Poli Bedah)

✓

Pemeriksaan Penyakit Dalam

✓

Pemeriksaan Paru (Poli Paru)

✓

Pemeriksaan Kulit dan Kelamin

✓

Pemeriksaan Syaraf (Poli Syaraf)

✓

Foto Thorax

✓

Spirometri

✓

Treadmill

✓

Pemeriksaan Lab :
Urin lengkap

✓

Darah lengkap

✓

Gula darah puasa

✓

Gula darah 2 jam PP

✓

Ureum

✓

Creatinin

✓

SGOT

✓

SGPT

✓

HbsAg

✓

HIV (3 Reagen)

✓

Narkoba 3 Parameter

✓

Trigerliserida

✓

VDRL

✓',
            'match_type' => 'contains',
        ]);

                Layanan::create([
            'question' => 'Detail Paket 6',
            'answer' => 'Pemeriksaan EKG

✓

Pemeriksaan Fisik Diagnostik Dokter Umum

✓

Pemeriksaan Mata (Poli Mata)

✓

Pemeriksaan THT (Poli THT)

✓

Foto Thorax

✓

TPHA

✓

Pemeriksaan Lab :
Urin lengkap

✓

Darah lengkap

✓

Gula darah puasa

✓

Ureum

✓

Creatinin

✓

SGOT

✓

SGPT

✓

HbsAg

✓

Cholesterol HDL

✓

Cholesterol LDL

✓

Cholesterol Total

✓

LED

✓

VDRL

✓',
            'match_type' => 'contains',
        ]);

        Layanan::create(['question' => 'Detail Paket 7',
            'answer' => 'Pemeriksaan Fisik Diagnostik Dokter Umum

✓

Pemeriksaan Jiwa

✓

Pemeriksaan Napza 3 Parameter

✓

Pengecatan BTA

✓

Pengecatan GO (Pria)

✓

Pemeriksaan THT (Poli THT)

✓

Foto Thorax

✓

TPHA

✓

Pemeriksaan Lab :
Urin lengkap

✓

Darah lengkap

✓

Gol. Darah ABO

✓

Gula darah puasa

✓

Ureum

✓

Creatinin

✓

SGOT

✓

SGPT

✓

Tes Kehamilan (Wanita)

✓

HbsAg

✓

LED

✓

VDRL

✓',
            'match_type' => 'contains',
        ]);

        Layanan::create([
            'question' => 'Informasi Rikkes',
            'answer' => '
                <ul>
                    <li>Pemeriksaan Kesehatan Jasmani: 160.000</li>
                    <li>Pemeriksaan Kesehatan Jiwa: 420.000</li>
                    <li>Pemeriksaan Napza 3 Parameter (AMP, MOP, THC): 295.000</li>
                    <li>Pemeriksaan Napza 6 Parameter (AMP, MOP, THC, BZO, COC, MET): 470.000</li>
                    <li>Rikkes Paket 1 & 2 tanpa Lab: 455.000</li>
                    <li>Rikkes Paket 3 tanpa Lab: 595.000</li>
                    <li>Rikkes Paket 4 tanpa Lab: 810.000</li>
                    <li>Rikkes Paket 5 tanpa Lab: 1.420.000</li>
                    <li>Rikkes Jas dan Mata (Buta Warna): 230.000</li>
                    <li>Rikkes Jas, Mata, dan THT: 300.000</li>
                    <li>Rikkes Jas, Mata, THT, dan Gigi: 370.000</li>
                    <li>Rikkes Jas, Mata, THT, EKG, dan Foto Thorax: 525.000</li>
                </ul>
            ',
            'match_type' => 'contains',
        ]);

        Layanan::create([
            'question' => 'Apa itu ESWL',
            'answer' => 'Extracorporeal shock wave lithotripsy (ESWL)
             adalah tindakan untuk menangani penyakit batu ginjal. 
             Prosedurnya akan memecah batu yang ditembakkan dari luar tubuh dengan menggunakan 
             gelombang kejut, yang dapat memecah batu menjadi pecahan yang halus. Dengan begitu, pecahan tersebut dapat keluar bersama dengan air seni. Melalui ESWL ini, batu ginjal atau kumpulan senyawa mineral dan garam yang menumpuk di dalam ginjal bisa dibuang tanpa pembedahan (noninvasif). Tindakan ESWL ini menggunakan alat yang dapat memancarkan gelombang kejut. Gelombang kejut ini akan dikonsentrasikan di sekitar ginjal. Tujuannya untuk menghancurkan batu ginjal menjadi pecahan-pecahan yang lebih kecil. Prosedur ini terbilang cukup efektif dalam menghancurkan batu ginjal, dengan diameter kurang dari dua sentimeter. Pembuangan endapan kristal-kristal yang berdiameter lebih dari dua sentimeter akan 
             disarankan melalui prosedur penanganan batu ginjal lainnya.',
            'match_type' => 'contains',
        ]);

                Layanan::create([
            'question' => 'Apa itu Kemoterapi?',
            'answer' => 'Unit Kemoterapi Rumah Sakit Tk.II dr. Soepraoen memberikan pelayanan 
            untuk pasien BPJS, asuransi, dan pasien swasta, 
            Ruang kemoterapi terletak di lantai 1 dilengkapi 
            dengan 10 tempat tidur dengan ruang ber-AC yang 
            nyaman. Pelayanan diberikan oleh tenaga medis yang
             berpengalaman serta perawat yang terlatih dibawah
              pengawasan dokter spesialis yang profesional, pencampuran
               obat kemoterapi menggunakan biosafety cavinet dan 
               dilakukan oleh apoteker terlatih.',
            'match_type' => 'contains',
        ]);

                Layanan::create([
            'question' => 'Apa itu Radioterapi?',
            'answer' => 'Radioterapi merupakan terapi yang menggunakan radiasi yang bersumber dari energi radioaktif. Terapi ini bertujuan untuk penghancuran jaringan kanker atau mengurangi ukurannya atau menghilangkan gejala dan gangguan yang menyertai. Lalu apakah radioterapi aman? Jawabannya adalah iya. Teknik radioterapi saat ini telah berkembang ke level yang lebih baik dibandingkan saat pertama kali dimanfaatkan untuk keperluan medis. Dari sisi alat radiasi dan tempat tindakan dilakukan, persyaratan dan peraturan yang cukup ketat harus dipenuhi sampai suatu layanan radioterapi dapat beroperasi, dan salah satu syarat adalah keamanan radiasi disekitar ruang tindakan yang didesain khusus untuk tujuan tersebut. Evaluasi kualitas alat dan keamanan dari bahaya radiasi rutin dilakukan sesuai keharusan perundang-undangan badan pengatur tenaga nuklir. Petugas kesehatan yang membantu pelayanan juga terlatih, profesional, dan berkualifikasi. Dari sisi pasien, teknik radioterapi saat ini terfokus dan terukur, dapat secara presisi mengenai jaringan kanker dan secara bersamaan meminimalkan kerusakan akibat radiasi pada jaringan tubuh sehat disekitarnya. Hal ini dimungkinkan karena pemetaan target terapi dan jaringan sehat secara tiga dimensi, penggunaan komputerisasi dalam perhitungan dosis radiasi, dan kemampuan alat radiasi terkini. Diseluruh dunia, jutaan pasien sudah menjalani radioterapi setiap tahunnya secara aman untuk mengobati berbagai jenis kanker.',
            'match_type' => 'contains',
        ]);

                Layanan::create([
            'question' => 'Apa itu Onkologi',
            'answer' => 'Terbagi dalam tiga bagian yaitu :
            1.Dokter kandungan subspesialis onkologi adalah dokter yang memiliki keahlian khusus dalam menangani tumor dan kanker pada organ reproduksi wanita. Hal ini meliputi tumor dan kanker yang menyerang rahim, indung telur (ovarium), leher rahim (serviks), vagina, dan vulva. Dokter kandungan subspesialis onkologi adalah dokter yang mendalami ilmu ginekologi onkologi. Onkologi adalah cabang ilmu kedokteran yang fokus pada penyakit kanker dan pengobatannya, sedangkan ginekologi merupakan cabang ilmu kedokteran yang berfokus pada kesehatan organ reproduksi wanita. Dokter kandungan subspesialis onkologi memiliki gelar Spesialis Obstetri-Ginekologi Konsultan Ginekologi Onkologi atau disingkat Sp.OG (K)Onk. Untuk mendapat gelar tersebut, seorang dokter umum harus menyelesaikan program studi dokter spesialis obstetri dan ginekologi terlebih dahulu, lalu menempuh pendidikan subspesialisasi onkologi selama beberapa tahun.
            2.Ahli onkologi hematologi adalah dokter yang berspesialisasi dalam mengobati kanker darah. Mereka memiliki pelatihan ekstra dalam sistem darah, sistem limfatik, sumsum tulang, dan kanker. Istilah “ahli hematologi onkologi” berasal dari dua jenis dokter yang berbeda. Ahli hematologi mengkhususkan diri dalam mendiagnosis dan mengobati penyakit darah. Ahli onkologi mengkhususkan diri dalam mendiagnosis dan mengobati kanker. Ahli onkologi hematologi berspesialisasi dalam keduanya. Seseorang mungkin menemui ahli onkologi hematologi jika memiliki dugaan atau mengidap kanker darah.
            3.Penanganan kanker paru-paru sangat tergantung kondisi kesehatan pasien, jenis kanker, tahap perkembangan kanker, dan preferensi pasien. Dokter atau pasien mungkin dapat memutuskan untuk tidak menjalani pengobatan kanker paru-paru apa pun, terutama jika merasa potensi manfaatnya tidak sebanding dengan risiko efek sampingnya. Dalam kasus seperti itu, dokter mungkin akan menganjurkan penanganan yang bertujuan mengurangi gejala kanker paru-paru.',
            'match_type' => 'contains',
        ]);
                        Layanan::create([
            'question' => 'Apa itu CT Scan',
            'answer' => 'CT scan adalah prosedur diagnosis yang menggunakan komputer dan mesin sinar-X yang berputar untuk membuat gambar penampang tubuh. Gambar-gambar ini memberikan informasi yang lebih rinci daripada gambar sinar-X biasa. Mereka dapat menunjukkan jaringan lunak, pembuluh darah, dan tulang di berbagai bagian tubuh. CT scan juga dapat membantu dokter lebih cepat menentukan tingkat keparahan luka dalam atau perdarahan yang terjadi. Keberadaan CT scan juga penting dalam diagnosis, pengobatan, dan penelitian kanker. Dokter mungkin akan merekomendasikan untuk melakukan CT scan untuk tujuan berikut :
Mendiagnosis gangguan tulang, seperti tumor tulang dan fraktur
Menentukan lokasi tumor, infeksi, atau gumpalan darah.
Sebagai bagian dari prosedur, seperti operasi, biopsi, dan terapi radiasi.
Mendeteksi dan memantau kondisi penyakit seperti kanker, penyakit jantung, nodul paru, dan massa hati.
Mendeteksi cedera internal atau pendarahan internal.
Walau memiliki risiko dan efek samping, pemeriksaan CT scan memberikan manfaat yang lebih besar. Dokter akan menggunakan dosis radiasi serendah mungkin untuk mendapatkan informasi medis yang dibutuhkan. Selain itu, mesin dan teknik yang lebih baru membutuhkan lebih sedikit radiasi daripada yang digunakan sebelumnya.',
            'match_type' => 'contains',
        ]);
                        Layanan::create([
            'question' => 'Apa itu CathLab',
            'answer' => 'Catheterization Laboratory (Cath Lab) atau disebut juga kateterisasi jantung dan angiografi merupakan tindakan atau prosedur medis kardiologi diagnostic invasive. Prosedur ini dilakukan dengan menggunakan sinar-X untuk membantu menampilkan gambaran pembuluh darah di berbagai organ tubuh. Catheterization Laboratory sudah dilengkapi dengan banyak peralatan canggih dan modern. Alat-alat tersebut akan membantu dokter lebih mudah melakukan prosedur diagnostik dan intervensi dengan invasi minimal. Melalui prosedur ini, dapat diketahui jenis tindakan yang sesuai bagi pasien. Sehingga dokter dapat merekomendasikan tindak lanjut pengobatan yang mana tergantung dari hasil angiografi. Tindakan termasuk pasang ring jantung, intervensi dengan balon, atau tindakan operasi bypass. Kateter jantung di Rumah Sakit Tk.II dr. Soepraoen dilakukan dan dukungan fasilitas yang moderen dan dokter spesialis jantung yang berpengalaman. Artinya deteksi jantung koroner dapat dilakukan dengan tingkat keakuratan yang tinggi.',
            'match_type' => 'contains',
        ]);
                        Layanan::create([
            'question' => 'Apa itu Echokardiografi',
            'answer' => 'Echokardiografi, atau yang dikenal juga sebagai echo jantung, adalah suatu metode diagnostik yang menggunakan gelombang suara (ultrasonik) untuk membuat gambaran visual tentang bagaimana jantung bekerja. Pada echo jantung, seorang teknisi medis akan menggunakan transduser yang diletakkan di atas dada pasien untuk mengirimkan gelombang suara ke dalam tubuh. Gelombang suara ini akan memantul kembali (echo) saat mencapai jantung, dan transduser akan menerima kembali gelombang suara yang dipantulkan tersebut. Data ini kemudian diterjemahkan menjadi gambaran yang dapat dianalisis oleh dokter ahli jantung. Echokardiografi memiliki peran yang penting dalam mendiagnosis berbagai kondisi jantung, seperti penyakit katup jantung, penyakit arteri koroner, gagal jantung, dan kelainan struktural jantung lainnya. Dengan echo jantung, dokter dapat mengevaluasi ukuran, bentuk, dan fungsi jantung secara komprehensif, termasuk gerakan katup jantung, aliran darah di dalam jantung, dan ketebalan dinding jantung. Echo jantung juga dapat membantu memantau respons terhadap pengobatan dan mengikuti perkembangan penyakit jantung seiring waktu. Metode non-invasif ini memberikan informasi yang sangat berharga dalam pengelolaan pasien dengan penyakit kardiovaskular, serta dapat membantu dokter dalam merencanakan pengobatan yang tepat untuk pasien dengan masalah jantung. Dengan kemampuannya yang aman dan tidak berisiko, echo jantung telah menjadi salah satu alat diagnostik utama dalam bidang kardiologi modern.',
            'match_type' => 'contains',
        ]);

        Layanan::create([
            'question' => 'Apa itu Treadmill',
            'answer' => 'Layanan treadmill di rumah sakit adalah salah satu metode pengujian fungsional yang penting dalam bidang kardiologi. Dalam pengujian treadmill, pasien akan melakukan latihan fisik dengan berjalan atau berlari di atas treadmill yang dilengkapi dengan berbagai sensor untuk memantau fungsi jantung dan sistem kardiovaskular pasien. Proses pengujian dilakukan di bawah pengawasan tenaga medis yang berpengalaman, dengan pemantauan terus-menerus terhadap tekanan darah, detak jantung, elektrokardiogram (EKG), serta pengamatan klinis secara keseluruhan. Pengujian treadmill di rumah sakit umumnya digunakan untuk memeriksa kondisi pasien yang mengalami gejala atau risiko penyakit jantung, seperti nyeri dada, sesak napas, atau faktor risiko seperti hipertensi atau diabetes. Pengujian treadmill dapat memberikan informasi penting tentang kinerja jantung selama latihan fisik, termasuk kapasitas aerobik, detak jantung maksimal, dan tanda-tanda adanya iskemia atau ketidakcukupan aliran darah ke otot jantung. Hasil pengujian treadmill dapat membantu dokter dalam mendiagnosis penyakit jantung, mengevaluasi risiko pasien terhadap penyakit jantung, serta merencanakan program rehabilitasi atau pengelolaan penyakit jantung yang sesuai untuk pasien.',
            'match_type' => 'contains',
        ]);
        Layanan::created([
            'question' => 'Apa itu Pemeriksaan Medis Kejiwaan?',
            'answer' => 'Pemeriksaan medis kejiwaan adalah rangkaian pemeriksaan untuk mengevaluasi kondisi kesehatan mental dan mendeteksi gangguan kejiwaan pada seseorang. Pemeriksaan ini dapat meliputi tanya jawab, pemeriksaan fisik, dan pengisian kuesioner dengan psikater atau psikolog. Pemeriksaan medis kejiwaan dapat dilakukan sebagai pemeriksaan rutin atau darurat. Pemeriksaan kejiwaan rutin dilakukan untuk memeriksa kondisi kejiwaan pasien secara menyeluruh. Sementara itu, pemeriksaan kejiwaan darurat lebih berfokus pada gejala, riwayat gangguan, dan perilaku pasien sebelum mengalami gangguan kejiwaan.',
            'match_type' => 'contains',
        ]);
        Layanan::create([
            'question' => 'Apa itu Endoskopi?',
            'answer' => 'Istilah "endoskopi" sebenarnya adalah payung besar bagi beragam pemeriksaan yang dilakukan dengan memasukkan alat khusus ke dalam tubuh pasien. Prosedur ini dilakukan untuk melihat kondisi organ tubuh tertentu. Prosedur ini dapat digunakan untuk mendiagnosis berbagai macam penyakit. Selain itu, endoskopi juga menjadi pemeriksaan penunjang beberapa tindakan medis, seperti pengambilan sampel jaringan untuk biopsi dan operasi. Endoskopi bukan prosedur pembedahan. Prosesnya dilakukan dengan memasukkan sebuah tabung fleksibel yang dilengkapi dengan kamera dan lampu. Prosedur umumnya membuat pasien merasa tidak nyaman, namun dokter bisa menggunakan obat bius sebelum melakukannya. Melalui endoskopi, dokter dapat melihat kondisi organ yang diperiksa supaya lebih jelas.
Endoskopi dibagi atas beberapa jenis berdasarkan organ tubuh yang mengalami masalah kesehatan. Jenis endoskopi ini digunakan untuk menyelidiki gejala di organ tubuh tertentu, yaitu: 
Gastroskopi Jenis endoskopi ini bertujuan untuk memeriksa kerongkongan, lambung, atau bagian atas usus kecil.
Kolonoskopi untuk melihat bagian dalam dari usus besar.
Bronkoskopi digunakan untuk melihat saluran pernapasan. Hal ini dilakukan ketika seseorang mengalami batuk yang tidak kunjung membaik atau batuk darah.
Histeroskopi adalah jenis endoskopi untuk ke dalam rahim (uterus) jika seorang wanita mengalami masalah seperti menstruasi yang tidak teratur atau mengalami  keguguran lebih dari satu kali.
Cystoscopy digunakan untuk melihat ke dalam kandung kemih jika seseorang mengalami masalah seperti inkontinensia urine atau kencing darah.
Sigmoidoskopi fleksibel merupakan endoskopi untuk melihat usus bagian bawah.
USG endoskopi dilakukan untuk mengambil gambar organ dalam, seperti pankreas, dan mengambil sampel jaringan (biopsi).
Laparoskopi untuk melihat kondisi di dalam perut.
Artroskopi sering dilakukan untuk membantu operasi untuk memperbaiki kerusakan di dalam sendi.',
            'match_type' => 'contains',
        ]);
    }
}
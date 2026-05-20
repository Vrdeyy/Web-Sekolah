<?php

namespace Database\Seeders;

use App\Models\Achievement;
use App\Models\Agenda;
use App\Models\Award;
use App\Models\BusinessCenter;
use App\Models\Extracurricular;
use App\Models\Gallery;
use App\Models\ImgModel;
use App\Models\Major;
use App\Models\News;
use App\Models\Page;
use App\Models\Partner;
use App\Models\PrincipalMessage;
use App\Models\Setting;
use App\Models\SocialLink;
use App\Models\Staff;
use App\Models\Statistic;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProductionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Memulai seeding data produksi lengkap (SMK YAJ Depok)...');

        // 1. User Admin Default
        User::updateOrCreate(
            ['email' => 'admin@sekolah.id'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('admin123'),
                'email_verified_at' => now(),
            ]
        );
        $this->command->info('1. User Admin berhasil dibuat.');

        // 2. Settings (Hero & General & Social Media)
        $settings = [
            ['key' => 'hero_badge', 'value' => 'Status Akreditasi A', 'group' => 'hero'],
            ['key' => 'hero_title', 'value' => 'Pendidikan Modern Menuju Era Industri', 'group' => 'hero'],
            ['key' => 'hero_description', 'value' => 'Mempersiapkan lulusan yang kompeten, berakhlak mulia, siap kerja, dan mampu berwirausaha secara global.', 'group' => 'hero'],
            ['key' => 'hero_primary_text', 'value' => 'PPDB Online', 'group' => 'hero'],
            ['key' => 'hero_secondary_text', 'value' => 'Profil Sekolah', 'group' => 'hero'],
            ['key' => 'ppdb_url', 'value' => '#', 'group' => 'general'],
            ['key' => 'ppdb_active', 'value' => '1', 'group' => 'general'],
            ['key' => 'years_experience', 'value' => '25', 'group' => 'general'],
            ['key' => 'school_name', 'value' => 'SMK YAJ Depok', 'group' => 'general'],
            ['key' => 'hero_stats_1_label', 'value' => 'Siswa Aktif', 'group' => 'hero'],
            ['key' => 'hero_stats_1_value', 'value' => '1500', 'group' => 'hero'],
            ['key' => 'hero_stats_2_label', 'value' => 'Guru Profesional', 'group' => 'hero'],
            ['key' => 'hero_stats_2_value', 'value' => '120', 'group' => 'hero'],
            ['key' => 'hero_stats_3_label', 'value' => 'Kelulusan', 'group' => 'hero'],
            ['key' => 'hero_stats_3_value', 'value' => '98', 'group' => 'hero'],
            ['key' => 'social_facebook', 'value' => 'https://facebook.com/smkyajdepok', 'group' => 'general'],
            ['key' => 'social_instagram', 'value' => 'https://instagram.com/smkyajdepok', 'group' => 'general'],
            ['key' => 'social_youtube', 'value' => 'https://youtube.com/smkyajdepokofficial', 'group' => 'general'],
            ['key' => 'social_tiktok', 'value' => 'https://tiktok.com/@smkyajdepok', 'group' => 'general'],
            ['key' => 'school_email', 'value' => 'info@smkyajdepok.sch.id', 'group' => 'general'],
            ['key' => 'school_phone', 'value' => '021-8775612', 'group' => 'general'],
            ['key' => 'school_hours', 'value' => 'Senin - Jumat: 07:00 - 16:00', 'group' => 'general'],
            ['key' => 'address', 'value' => 'Jalan Ar Ridho Nomor 166, RT 001/RW 004, Kelurahan Jatimulya, Kecamatan Cilodong, Kota Depok, Jawa Barat 16413', 'group' => 'general'],
        ];
        foreach ($settings as $setting) {
            Setting::updateOrCreate(['key' => $setting['key']], $setting);
        }
        $this->command->info('2. Konfigurasi Setting berhasil dibuat.');

        // 3. Sambutan Kepala Sekolah
        PrincipalMessage::updateOrCreate(
            ['name' => 'Idham Kholid S,ag S,e'],
            [
                'title' => 'Kepala Sekolah SMK YAJ Depok',
                'message' => 'Selamat datang di website resmi SMK YAJ Depok. Di era digital ini, kami terus berkomitmen untuk menghadirkan sistem pembelajaran berbasis industri (link & match), inovatif, serta membentuk karakter siswa yang berdaya saing global dengan berlandaskan iman dan takwa.',
                'vision' => 'Menjadi lembaga pendidikan kejuruan yang unggul, berkarakter mulia, menguasai ilmu pengetahuan dan teknologi, serta berdaya saing nasional maupun internasional.',
                'mission' => "1. Menyelenggarakan proses pembelajaran yang inovatif, efektif, dan menyenangkan.\n2. Mengembangkan kemitraan yang kuat dengan industri dan dunia kerja.\n3. Membina akhlak mulia dan kepribadian luhur berlandaskan nilai-nilai agama.",
                'photo' => null,
                'is_active' => true,
            ]
        );
        $this->command->info('3. Sambutan Kepala Sekolah berhasil dibuat.');

        // 4. Statistik Sekolah
        $stats = [
            ['label' => 'Siswa Aktif', 'value' => '1500', 'suffix' => '+', 'icon' => 'fas fa-users'],
            ['label' => 'Guru & Staf', 'value' => '120', 'suffix' => '+', 'icon' => 'fas fa-chalkboard-teacher'],
            ['label' => 'Ruang Kelas', 'value' => '40', 'suffix' => '', 'icon' => 'fas fa-school'],
            ['label' => 'Kemitraan Industri', 'value' => '50', 'suffix' => '+', 'icon' => 'fas fa-briefcase'],
        ];
        foreach ($stats as $stat) {
            Statistic::updateOrCreate(['label' => $stat['label']], $stat);
        }
        $this->command->info('4. Data Statistik berhasil dibuat.');

        // 5. Media Sosial Sekolah
        $socials = [
            ['platform' => 'Instagram', 'url' => 'https://instagram.com/smkyajdepok', 'icon' => 'fab fa-instagram'],
            ['platform' => 'Facebook', 'url' => 'https://facebook.com/smkyajdepok', 'icon' => 'fab fa-facebook'],
            ['platform' => 'Youtube', 'url' => 'https://youtube.com/smkyajdepokofficial', 'icon' => 'fab fa-youtube'],
            ['platform' => 'Tiktok', 'url' => 'https://tiktok.com/@smkyajdepok', 'icon' => 'fab fa-tiktok'],
        ];
        foreach ($socials as $social) {
            SocialLink::updateOrCreate(['platform' => $social['platform']], $social);
        }
        $this->command->info('5. Tautan Media Sosial berhasil dibuat.');

        // 6. Program Keahlian / Jurusan
        $majors = [
            [
                'name' => 'Pengembangan Perangkat Lunak dan GIM',
                'short_name' => 'PPLG',
                'slug' => 'pplg',
                'short_description' => 'Mempelajari logika pemrograman, basis data, serta pengembangan aplikasi web, mobile, dan game.',
                'description' => 'Jurusan yang dirancang khusus untuk menghasilkan software engineer dan game developer masa depan yang adaptif terhadap tren teknologi global.',
                'competencies' => 'Pemrograman Berorientasi Objek, Web Development (HTML, CSS, JS, PHP), Mobile Development (Android/Flutter), Basis Data (MySQL), Game Engine Development',
                'career_prospects' => 'Fullstack Web Developer, Mobile Programmer, Database Administrator, Game Developer, Quality Assurance (QA) Engineer',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Teknik Jaringan Komputer dan Telekomunikasi',
                'short_name' => 'TJKT',
                'slug' => 'tjkt',
                'short_description' => 'Mempelajari instalasi jaringan komputer, manajemen server, sistem keamanan siber, dan teknologi cloud.',
                'description' => 'Membekali siswa dengan keahlian merancang infrastruktur jaringan berstandar industri demi mewujudkan konektivitas digital yang cepat dan aman.',
                'competencies' => 'Routing & Switching (MikroTik/Cisco), Sistem Operasi Jaringan (Linux/Windows Server), Keamanan Siber, Cloud Computing, Fiber Optic Installation',
                'career_prospects' => 'Network Engineer, System Administrator, IT Support, Cloud Administrator, Cyber Security Specialist',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Desain Komunikasi Visual',
                'short_name' => 'DKV',
                'slug' => 'dkv',
                'short_description' => 'Mengembangkan kreativitas dalam pembuatan desain grafis, fotografi, videografi, dan animasi.',
                'description' => 'Jurusan yang melatih keahlian menyampaikan pesan visual secara kreatif dan komersial melalui berbagai platform multimedia.',
                'competencies' => 'Desain Grafis (Adobe Photoshop/Illustrator), Fotografi, Videografi & Editing Video (Adobe Premiere), Animasi 2D/3D, UI/UX Design, Branding',
                'career_prospects' => 'Graphic Designer, Photographer, Video Editor, UI/UX Designer, Creative Director, Animator',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Akuntansi dan Keuangan Lembaga',
                'short_name' => 'AKL',
                'slug' => 'akl',
                'short_description' => 'Mempelajari pengelolaan laporan keuangan, perpajakan, perbankan, dan audit perusahaan.',
                'description' => 'Mempersiapkan tenaga ahli keuangan yang teliti, profesional, jujur, serta mahir dalam mengoperasikan aplikasi akuntansi modern.',
                'competencies' => 'Akuntansi Keuangan, Administrasi Pajak, Spreadsheets, Pengoperasian Aplikasi MYOB/Zahir, Perbankan Dasar',
                'career_prospects' => 'Staff Accounting, Staff Tax & Audit, Kasir Profesional, Staff Keuangan, Wirausahawan Mandiri',
                'order' => 4,
                'is_active' => true,
            ],
        ];
        foreach ($majors as $m) {
            Major::updateOrCreate(['slug' => $m['slug']], $m);
        }
        $this->command->info('6. Data Program Keahlian berhasil dibuat.');

        // 7. Ekstrakurikuler
        $extras = [
            [
                'name' => 'Pramuka',
                'slug' => 'pramuka',
                'short_description' => 'Membentuk karakter, kedisiplinan, kemandirian, dan kepemimpinan berlandaskan Dasa Darma.',
                'description' => 'Ekskul wajib sekolah yang bertujuan melatih ketangkasan fisik, mental, dan jiwa sosial yang tinggi.',
                'coach' => 'Kak Herlambang, S.Pd.',
                'schedule' => 'Setiap Sabtu, 08.00 - 11.00 WIB',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Paskibra',
                'slug' => 'paskibra',
                'short_description' => 'Melatih kedisiplinan baris-berbaris dan memupuk rasa nasionalisme yang tinggi.',
                'description' => 'Wadah pembinaan kedisiplinan, konsentrasi, dan kerja sama tim dalam mengemban tugas upacara bendera kenegaraan.',
                'coach' => 'Bpk. Ahmad Fauzi',
                'schedule' => 'Setiap Rabu, 15.30 - 17.00 WIB',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Futsal & Sepakbola',
                'slug' => 'futsal-sepakbola',
                'short_description' => 'Mengembangkan minat bakat di cabang olahraga bola dan meraih prestasi gemilang.',
                'description' => 'Ekskul olahraga paling diminati untuk menyalurkan bakat kompetitif di bidang sepakbola dan futsal sekolah.',
                'coach' => 'Coach Ramlan',
                'schedule' => 'Setiap Jumat, 15.30 - 17.30 WIB',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Kerohanian Islam (Rohis)',
                'slug' => 'kerohanian-islam',
                'short_description' => 'Pembinaan mental spiritual dan pendalaman ajaran Islam yang berakhlakul karimah.',
                'description' => 'Menyelenggarakan kegiatan kajian keagamaan, tadarus bersama, serta melatih seni musik marawis/hadroh sekolah.',
                'coach' => 'Ust. Muhammad Ilyas, S.Ag.',
                'schedule' => 'Setiap Kamis, 15.30 - 17.00 WIB',
                'order' => 4,
                'is_active' => true,
            ],
        ];
        foreach ($extras as $e) {
            Extracurricular::updateOrCreate(['slug' => $e['slug']], $e);
        }
        $this->command->info('7. Data Ekstrakurikuler berhasil dibuat.');

        // 8. Berita Sekolah (6 Berita Lengkap)
        $newsItems = [
            [
                'title' => 'Penerimaan Peserta Didik Baru (PPDB) SMK YAJ Depok Resmi Dibuka',
                'slug' => 'ppdb-smk-yaj-depok-resmi-dibuka',
                'category' => 'Info Sekolah',
                'excerpt' => 'Segera daftarkan diri Anda di SMK YAJ Depok untuk tahun ajaran baru. Kuota terbatas!',
                'content' => 'SMK YAJ Depok secara resmi membuka Penerimaan Peserta Didik Baru (PPDB). Calon siswa dapat memilih program keahlian unggulan kami seperti PPLG, TJKT, DKV, dan AKL. Proses pendaftaran dapat dilakukan secara online melalui website resmi ini maupun offline di sekretariat pendaftaran kampus SMK YAJ Depok.',
                'is_active' => true,
                'published_at' => now(),
            ],
            [
                'title' => 'SMK YAJ Depok Jalin Kerja Sama (MoU) Strategis dengan PT. Telkom Indonesia',
                'slug' => 'smk-yaj-depok-mou-telkom-indonesia',
                'category' => 'Kegiatan',
                'excerpt' => 'Kerja sama mencakup penyusunan kurikulum kelas industri, praktik kerja lapangan (PKL), dan rekrutmen lulusan.',
                'content' => 'Dalam upaya memperkuat program Link & Match dengan Dunia Usaha dan Dunia Industri (DUDI), SMK YAJ Depok menandatangani nota kesepahaman (MoU) dengan PT. Telkom Indonesia. Kerja sama ini bertujuan untuk meningkatkan kesiapan kerja para siswa melalui sertifikasi industri, pelatihan guru, dan penempatan PKL.',
                'is_active' => true,
                'published_at' => now()->subDays(2),
            ],
            [
                'title' => 'Siswa Jurusan PPLG Sabet Juara 1 LKS Bidang Web Technologies',
                'slug' => 'siswa-pplg-juara-1-lks-web-tech',
                'category' => 'Prestasi',
                'excerpt' => 'Kemenangan gemilang di ajang Lomba Kompetensi Siswa (LKS) tingkat regional kota.',
                'content' => 'Kabar gembira datang dari tim kompetisi SMK YAJ Depok. Salah satu siswa bertalenta dari Program Keahlian Pengembangan Perangkat Lunak dan GIM (PPLG) berhasil menempati podium pertama pada Lomba Kompetensi Siswa (LKS) kategori Web Technologies dan berhak maju ke tingkat provinsi.',
                'is_active' => true,
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Kunjungan Industri Jurusan TJKT ke Data Center Cyber 1 Jakarta',
                'slug' => 'kunjungan-industri-tjkt-cyber-1',
                'category' => 'Kegiatan',
                'excerpt' => 'Siswa TJKT belajar langsung mengenai arsitektur server, manajemen jaringan, dan sistem pendingin data center.',
                'content' => 'Guna memberikan wawasan praktis dunia kerja ke jaringan telekomunikasi nyata, SMK YAJ Depok menyelenggarakan kunjungan industri ke Gedung Cyber 1 Jakarta. Para siswa diajak berkeliling melihat infrastruktur server raksasa, routing berkecepatan tinggi, dan penataan kabel fiber optik kelas dunia.',
                'is_active' => true,
                'published_at' => now()->subDays(7),
            ],
            [
                'title' => 'Workshop Peningkatan Kompetensi UI/UX Design Bersama Desainer Profesional',
                'slug' => 'workshop-uiux-design-dkv',
                'category' => 'Kegiatan',
                'excerpt' => 'Melatih keahlian mendesain antarmuka aplikasi modern untuk siswa jurusan DKV.',
                'content' => 'Program Keahlian Desain Komunikasi Visual (DKV) SMK YAJ Depok menyelenggarakan workshop intensif UI/UX Design menggunakan Figma. Acara ini dipandu langsung oleh praktisi UI/UX expert yang berpengalaman melatih desainer muda agar siap bersaing di era digital agency saat ini.',
                'is_active' => true,
                'published_at' => now()->subDays(10),
            ],
            [
                'title' => 'Aksi Donor Darah Dan Bakti Sosial OSIS SMK YAJ Depok Peduli Sesama',
                'slug' => 'baksos-donor-darah-osis',
                'category' => 'Info Sekolah',
                'excerpt' => 'Kolaborasi dengan PMI Kota Depok dalam aksi kemanusiaan penggalangan kantong darah.',
                'content' => 'Sebagai wujud kepedulian sosial terhadap sesama, OSIS SMK YAJ Depok bekerja sama dengan Palang Merah Indonesia (PMI) menyelenggarakan program donor darah masal. Kegiatan ini diikuti oleh guru, staf, siswa, serta masyarakat sekitar dengan tetap mematuhi protokol kesehatan.',
                'is_active' => true,
                'published_at' => now()->subDays(12),
            ],
        ];
        foreach ($newsItems as $n) {
            News::updateOrCreate(['slug' => $n['slug']], $n);
        }
        $this->command->info('8. Data Berita berhasil dibuat.');

        // 9. Prestasi Siswa (4 Prestasi)
        $achievements = [
            [
                'title' => 'Juara 1 LKS Web Technologies Tingkat Kota Depok',
                'slug' => 'juara-1-lks-web-depok-2025',
                'student_name' => 'Fadhil Muhammad',
                'competition_name' => 'Lomba Kompetensi Siswa (LKS) SMK',
                'level' => 'Kota/Kabupaten',
                'rank' => 'Juara 1',
                'year' => '2025',
                'description' => 'Meraih nilai tertinggi dalam perancangan aplikasi web responsif dan integrasi database.',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Medali Perunggu Pencak Silat Piala Kemenpora',
                'slug' => 'medali-perunggu-silat-kemenpora-2025',
                'student_name' => 'Rian Kurniawan',
                'competition_name' => 'Kejuaraan Pencak Silat Pelajar Nasional',
                'level' => 'Nasional',
                'rank' => 'Juara 3',
                'year' => '2025',
                'description' => 'Mewakili provinsi dan berhasil membawa pulang medali perunggu di kelas tanding remaja.',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Juara 2 Lomba Video Kreatif Profil Sekolah Nasional',
                'slug' => 'juara-2-video-kreatif-sekolah-2024',
                'student_name' => 'Tim Multimedia YAJ (DKV)',
                'competition_name' => 'Creative School Video Competition',
                'level' => 'Nasional',
                'rank' => 'Juara 2',
                'year' => '2024',
                'description' => 'Berhasil memukau dewan juri melalui sinematografi berkualitas tinggi dan alur cerita inspiratif.',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Harapan 1 Olimpiade Jaringan Komputer Mikrotik Academy',
                'slug' => 'harapan-1-olimpiade-mikrotik-2024',
                'student_name' => 'Bintang Ramadhan',
                'competition_name' => 'Olimpiade Jaringan Tingkat Provinsi Jawa Barat',
                'level' => 'Provinsi',
                'rank' => 'Harapan 1',
                'year' => '2024',
                'description' => 'Sukses menyelesaikan konfigurasi routing kompleks, firewall security, dan bandwith management dalam waktu singkat.',
                'order' => 4,
                'is_active' => true,
            ],
        ];
        foreach ($achievements as $a) {
            Achievement::updateOrCreate(['slug' => $a['slug']], $a);
        }
        $this->command->info('9. Data Prestasi berhasil dibuat.');

        // 10. Penghargaan Sekolah (4 Penghargaan)
        $awards = [
            [
                'title' => 'Penghargaan Adiwiyata Mandiri Nasional',
                'description' => 'Pengakuan tertinggi dari pemerintah atas keberhasilan sekolah dalam mengembangkan lingkungan belajar yang asri, hijau, dan peduli ekologi secara mandiri.',
                'year' => '2024',
                'organizer' => 'Kementerian Lingkungan Hidup dan Kehutanan RI',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Peringkat 1 Kategori SMK Swasta Inovatif',
                'description' => 'Penghargaan atas implementasi manajemen sekolah digital terintegrasi dan kolaborasi industri terluas.',
                'year' => '2023',
                'organizer' => 'Dinas Pendidikan Provinsi Jawa Barat',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Peringkat A Akreditasi BAN-PDM Unggul',
                'description' => 'Pengakuan kelayakan dan mutu pendidikan formal tinggi berdasarkan penilaian standar sarana, prasarana, guru, kurikulum, dan lulusan.',
                'year' => '2025',
                'organizer' => 'Badan Akreditasi Nasional Pendidikan Dasar dan Menengah',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Sekolah Ramah Anak Terpuji Kota Depok',
                'description' => 'Diberikan kepada institusi pendidikan yang sukses menciptakan atmosfer belajar aman, nyaman, bebas perundungan, inklusif, dan mendukung tumbuh kembang psikologis murid.',
                'year' => '2024',
                'organizer' => 'Pemerintah Kota Depok',
                'order' => 4,
                'is_active' => true,
            ],
        ];
        foreach ($awards as $aw) {
            Award::updateOrCreate(['title' => $aw['title']], $aw);
        }
        $this->command->info('10. Data Penghargaan berhasil dibuat.');

        // 11. Business Center / Unit Usaha (4 Unit Usaha)
        $businessCenters = [
            [
                'name' => 'YAJ Mart',
                'slug' => 'yaj-mart',
                'short_description' => 'Pusat belanja kebutuhan siswa yang dikelola secara profesional.',
                'description' => 'Toko ritel sekolah yang menyediakan seragam, alat tulis, konsumsi sehat, sekaligus berfungsi sebagai laboratorium nyata untuk jurusan Akuntansi dan Bisnis.',
                'location' => 'Lantai 1 Gedung Utama',
                'phone' => '021-8775612',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'YAJ Tech Services',
                'slug' => 'yaj-tech-services',
                'short_description' => 'Jasa perbaikan komputer, servis printer, dan instalasi jaringan.',
                'description' => 'Layanan jasa teknologi komersial yang melayani masyarakat umum dan perkantoran, dikerjakan langsung oleh siswa berprestasi di bawah pengawasan instruktur ahli.',
                'location' => 'Laboratorium Jaringan Komputer',
                'phone' => '021-8775613',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'YAJ Studio & Printing',
                'slug' => 'yaj-studio-printing',
                'short_description' => 'Jasa percetakan, foto studio, dan desain grafis profesional.',
                'description' => 'Unit usaha kreatif yang melayani cetak banner, merchandise, foto wisuda, cetak foto studio, serta perancangan desain branding untuk UMKM sekitar Depok.',
                'location' => 'Bengkel Kreatif DKV Lantai 2',
                'phone' => '021-8775614',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'YAJ Koperasi & Jasa Keuangan',
                'slug' => 'yaj-koperasi-keuangan',
                'short_description' => 'Unit simpan pinjam dan pengelolaan kas terintegrasi.',
                'description' => 'Melatih administrasi perbankan siswa secara riil. Koperasi ini dikelola oleh staf akuntan profesional dan melibatkan siswa Akuntansi secara berkala dalam penyusunan neraca dan laporan laba-rugi.',
                'location' => 'Gedung Administrasi Lantai 1',
                'phone' => '021-8775615',
                'order' => 4,
                'is_active' => true,
            ],
        ];
        foreach ($businessCenters as $bc) {
            BusinessCenter::updateOrCreate(['slug' => $bc['slug']], $bc);
        }
        $this->command->info('11. Data Business Center berhasil dibuat.');

        // 12. Halaman Statis (Pages)
        $pages = [
            [
                'title' => 'Yayasan Pendidikan YAJ',
                'slug' => 'yayasan',
                'image' => '',
                'content' => 'Informasi lengkap mengenai Yayasan Pendidikan YAJ selaku pendiri dan pengelola sekolah.',
                'meta_title' => 'Yayasan Pendidikan YAJ',
                'meta_description' => 'Informasi lengkap mengenai Yayasan Pendidikan YAJ selaku pendiri dan pengelola sekolah.',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Profil Sekolah',
                'slug' => 'sekolah',
                'image' => '',
                'content' => 'Sejarah singkat, visi, misi, dan identitas SMK YAJ Depok.',
                'meta_title' => 'Profil Sekolah - SMK YAJ Depok',
                'meta_description' => 'Sejarah singkat, visi, misi, dan identitas SMK YAJ Depok.',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Visi & Misi',
                'slug' => 'visi-misi',
                'image' => '',
                'content' => 'Penjelasan komprehensif mengenai visi jangka panjang dan misi operasional SMK YAJ Depok.',
                'meta_title' => 'Visi & Misi - SMK YAJ Depok',
                'meta_description' => 'Penjelasan komprehensif mengenai visi jangka panjang dan misi operasional SMK YAJ Depok.',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Kontak Resmi',
                'slug' => 'kontak',
                'image' => '',
                'content' => 'Alamat lengkap, peta interaktif, nomor telepon, dan formulir pengaduan resmi.',
                'meta_title' => 'Hubungi Kami - SMK YAJ Depok',
                'meta_description' => 'Alamat lengkap, peta interaktif, nomor telepon, dan formulir pengaduan resmi.',
                'order' => 4,
                'is_active' => true,
            ],
        ];
        foreach ($pages as $page) {
            Page::updateOrCreate(['slug' => $page['slug']], $page);
        }
        $this->command->info('12. Data Halaman Statis berhasil dibuat.');

        // 13. Data Guru (10 Guru dengan Nama & NIP Riil)
        $teachers = [
            [
                'name' => 'H. Achmad Zaini, S.T., M.Kom.',
                'nip' => '198205122008011002',
                'position' => 'Guru Produktif PPLG',
                'subject' => 'Pemrograman Web & Mobile',
                'bio' => 'Berdedikasi dalam mendidik dan membimbing siswa di bidang pengembangan perangkat lunak.',
                'email' => 'zaini@sekolah.id',
                'phone' => '081234567891',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Ir. Hartono, M.T.',
                'nip' => '197608242005011005',
                'position' => 'Guru Produktif TJKT',
                'subject' => 'Administrasi Sistem Jaringan',
                'bio' => 'Instruktur bersertifikasi CCNA & MTCNA dengan pengalaman di industri IT selama puluhan tahun.',
                'email' => 'hartono@sekolah.id',
                'phone' => '081234567892',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Siti Aminah, S.Sn.',
                'nip' => '199003152018022003',
                'position' => 'Guru Produktif DKV',
                'subject' => 'Desain Grafis & Multimedia',
                'bio' => 'Menginspirasi siswa untuk menuangkan ide kreatif dalam bentuk karya visual yang estetis.',
                'email' => 'siti.aminah@sekolah.id',
                'phone' => '081234567893',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Rina Wijayanti, S.E., M.Ak.',
                'nip' => '198511042012012001',
                'position' => 'Guru Produktif AKL',
                'subject' => 'Akuntansi Keuangan & Perpajakan',
                'bio' => 'Mengajarkan kedisiplinan dan ketelitian dalam pencatatan laporan keuangan perusahaan.',
                'email' => 'rina.w@sekolah.id',
                'phone' => '081234567894',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'Drs. H. Mulyono',
                'nip' => '196807181995031002',
                'position' => 'Guru Normatif / Adaptif',
                'subject' => 'Pendidikan Pancasila & Kewarganegaraan',
                'bio' => 'Membina kepribadian luhur dan jiwa nasionalisme yang kuat bagi para siswa.',
                'email' => 'mulyono@sekolah.id',
                'phone' => '081234567895',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Sri Wahyuni, S.Pd.',
                'nip' => '198804152014022004',
                'position' => 'Guru Umum',
                'subject' => 'Bahasa Indonesia',
                'bio' => 'Mengembangkan kemampuan literasi, pidato, dan kepenulisan tata bahasa formal siswa.',
                'email' => 'sri.wahyuni@sekolah.id',
                'phone' => '081234567896',
                'order' => 6,
                'is_active' => true,
            ],
            [
                'name' => 'Dedi Hermawan, S.Kom.',
                'nip' => '198609052011011003',
                'position' => 'Guru Produktif PPLG',
                'subject' => 'Basis Data & Algoritma Pemrograman',
                'bio' => 'Pakar pemodelan database relational yang antusias mengenalkan arsitektur web modern bagi generasi Z.',
                'email' => 'dedi.hermawan@sekolah.id',
                'phone' => '081234567897',
                'order' => 7,
                'is_active' => true,
            ],
            [
                'name' => 'Nurlaila, S.Pd.I.',
                'nip' => '197912182006042002',
                'position' => 'Guru Normatif',
                'subject' => 'Pendidikan Agama Islam & Budi Pekerti',
                'bio' => 'Fokus membina ketakwaan rohani, akhlak mulia, dan kecerdasan emosional berlandaskan nilai Islam.',
                'email' => 'nurlaila@sekolah.id',
                'phone' => '081234567898',
                'order' => 8,
                'is_active' => true,
            ],
            [
                'name' => 'Agung Prasetyo, S.Or.',
                'nip' => '199205302020011001',
                'position' => 'Guru Umum',
                'subject' => 'Pendidikan Jasmani, Olahraga & Kesehatan',
                'bio' => 'Meningkatkan vitalitas kesegaran jasmani siswa serta membentuk sportivitas tim olahraga sekolah.',
                'email' => 'agung.prasetyo@sekolah.id',
                'phone' => '081234567899',
                'order' => 9,
                'is_active' => true,
            ],
            [
                'name' => 'Dewi Lestari, M.Pd.',
                'nip' => '198307222010012003',
                'position' => 'Guru Umum',
                'subject' => 'Bahasa Inggris',
                'bio' => 'Membekali siswa kecakapan percakapan global (English speaking) dan persiapan tes TOEFL.',
                'email' => 'dewi.lestari@sekolah.id',
                'phone' => '081234567810',
                'order' => 10,
                'is_active' => true,
            ],
        ];
        foreach ($teachers as $t) {
            Teacher::updateOrCreate(['nip' => $t['nip']], $t);
        }
        $this->command->info('13. Data Guru berhasil dibuat.');

        // 14. Data Staff (6 Staff dengan Nama & NIP Riil)
        $staff = [
            [
                'name' => 'Budi Santoso',
                'nip' => '198902042015031003',
                'position' => 'Staf Tata Usaha',
                'department' => 'Administrasi Kepegawaian',
                'bio' => 'Siap melayani kebutuhan persuratan dan administrasi sekolah.',
                'email' => 'budi.santoso@sekolah.id',
                'phone' => '082134567891',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Mega Utami, A.Md.',
                'nip' => '199307222019012002',
                'position' => 'Staf Keuangan',
                'department' => 'Loket Pembayaran SPP',
                'bio' => 'Melayani administrasi keuangan siswa secara transparan dan teratur.',
                'email' => 'mega.utami@sekolah.id',
                'phone' => '082134567892',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Agus Priyono',
                'nip' => '198006122010011004',
                'position' => 'Kepala Laboran',
                'department' => 'Manajemen Inventaris Lab Komputer',
                'bio' => 'Memastikan semua hardware dan software di laboratorium siap digunakan untuk KBM.',
                'email' => 'agus.p@sekolah.id',
                'phone' => '082134567893',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Eko Prasetyo',
                'nip' => '198503112012031002',
                'position' => 'Staf Tata Usaha',
                'department' => 'Logistik & Sarana Prasarana',
                'bio' => 'Fokus memelihara kualitas ruang kelas, listrik, AC, dan seluruh aset properti sekolah.',
                'email' => 'eko.prasetyo@sekolah.id',
                'phone' => '082134567894',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'Fitriani, A.Md.',
                'nip' => '199408162021012004',
                'position' => 'Laboran & Pustakawan',
                'department' => 'Manajemen Buku & Literasi Perpustakaan',
                'bio' => 'Membantu sirkulasi peminjaman buku referensi dan menertibkan arsip perpustakaan digital.',
                'email' => 'fitriani@sekolah.id',
                'phone' => '082134567895',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Yusuf Iskandar',
                'nip' => '197810142007011001',
                'position' => 'Keamanan Kampus',
                'department' => 'Keselamatan & Ketertiban Gerbang Utama',
                'bio' => 'Bertanggung jawab atas kondusivitas keamanan lingkungan belajar siswa dan pengaturan parkir resmi.',
                'email' => 'yusuf.iskandar@sekolah.id',
                'phone' => '082134567896',
                'order' => 6,
                'is_active' => true,
            ],
        ];
        foreach ($staff as $s) {
            Staff::updateOrCreate(['nip' => $s['nip']], $s);
        }
        $this->command->info('14. Data Staff berhasil dibuat.');

        // 15. Mitra Industri / Partners (8 Mitra)
        $partners = [
            [
                'name' => 'PT. Telkom Indonesia',
                'website' => 'https://telkom.co.id',
                'description' => 'Mitra penyusunan kurikulum kelas industri TJKT dan penempatan PKL.',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'PT. GoTo Gojek Tokopedia',
                'website' => 'https://goto-group.com',
                'description' => 'Kerja sama magang dan workshop pengembangan perangkat lunak.',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Bank Mandiri (Persero) Tbk',
                'website' => 'https://bankmandiri.co.id',
                'description' => 'Mitra program magang keuangan untuk siswa jurusan Akuntansi.',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Matahari Department Store',
                'website' => 'https://matahari.com',
                'description' => 'Mitra penyaluran kerja lulusan bidang retail dan kasir.',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'PT. Oracle Indonesia',
                'website' => 'https://oracle.com/id',
                'description' => 'Kemitraan kurikulum Database Administrator global dan penyedia voucher sertifikasi internasional.',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'PT. Mikrotik Indonesia',
                'website' => 'https://mikrotik.co.id',
                'description' => 'MikroTik Academy resmi. Memberikan sertifikasi MTCNA langsung kepada siswa TJKT lulus ujian kompetensi.',
                'order' => 6,
                'is_active' => true,
            ],
            [
                'name' => 'Trans Studio Cibubur (Trans Corp)',
                'website' => 'https://transstudiocibubur.com',
                'description' => 'Mitra magang industri kreatif bidang videografi, penataan tata cahaya, dan penyiaran penonton untuk DKV.',
                'order' => 7,
                'is_active' => true,
            ],
            [
                'name' => 'KAP Tanudiredja Wibisana (PwC Indonesia)',
                'website' => 'https://pwc.com/id',
                'description' => 'Program pengenalan audit korporasi dasar dan penyerapan magang siswa Akuntansi terpilih.',
                'order' => 8,
                'is_active' => true,
            ],
        ];
        foreach ($partners as $p) {
            Partner::updateOrCreate(['name' => $p['name']], $p);
        }
        $this->command->info('15. Data Mitra Industri berhasil dibuat.');

        // 16. Galeri Foto & Video (8 Galeri)
        $galleries = [
            [
                'title' => 'Upacara Hari Kemerdekaan Republik Indonesia',
                'type' => 'photo',
                'image' => null,
                'category' => 'Kegiatan',
                'description' => 'Upacara khidmat yang dipimpin oleh Kepala Sekolah di lapangan utama.',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Gedung Laboratorium Baru Diresmikan',
                'type' => 'photo',
                'image' => null,
                'category' => 'Fasilitas',
                'description' => 'Fasilitas Lab Komputer berspesifikasi tinggi untuk menunjang KBM PPLG & TJKT.',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Profil Singkat SMK YAJ Depok',
                'type' => 'video',
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'category' => 'Lainnya',
                'description' => 'Video perkenalan resmi lingkungan, sarana prasarana, dan ekstrakurikuler sekolah.',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Kunjungan Industri Jurusan TJKT',
                'type' => 'photo',
                'image' => null,
                'category' => 'Kegiatan',
                'description' => 'Dokumentasi kunjungan edukatif siswa TJKT saat mengamati instalasi data center industri.',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'title' => 'Pameran Karya Kreatif DKV Exhibition',
                'type' => 'photo',
                'image' => null,
                'category' => 'Lainnya',
                'description' => 'Siswa DKV memamerkan hasil karya lukisan, desain kemasan, foto, dan animasi pendek.',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'title' => 'Praktik Kerja Lapangan (PKL) di Instansi Pemerintah',
                'type' => 'photo',
                'image' => null,
                'category' => 'Kegiatan',
                'description' => 'Pelepasan resmi dan monitoring berkala siswa magang di dinas-dinas pemerintahan kota.',
                'order' => 6,
                'is_active' => true,
            ],
            [
                'title' => 'Uji Kompetensi Keahlian (UKK) Kelas XII',
                'type' => 'photo',
                'image' => null,
                'category' => 'Akademik',
                'description' => 'Siswa serius merakit topologi jaringan dan membuat web programming di hadapan asesor industri.',
                'order' => 7,
                'is_active' => true,
            ],
            [
                'title' => 'Video Kemeriahan Classmeeting & Pentas Seni Siswa',
                'type' => 'video',
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'category' => 'Lainnya',
                'description' => 'Klip rangkuman penampilan band, tarian tradisional, dan teater garapan OSIS.',
                'order' => 8,
                'is_active' => true,
            ],
        ];
        foreach ($galleries as $g) {
            Gallery::updateOrCreate(['title' => $g['title']], $g);
        }
        $this->command->info('16. Data Galeri berhasil dibuat.');

        // 17. Slider / Banner (ImgModel / Slider - 3 Slider)
        $sliders = [
            [
                'title' => 'SMK YAJ DEPOK',
                'subtitle' => 'Mencetak generasi cerdas, inovatif, mandiri, dan berakhlakul karimah.',
                'image' => '',
                'button_text' => 'Pelajari Selengkapnya',
                'button_url' => '/sekolah',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'AKREDITASI A (UNGGUL)',
                'subtitle' => 'Fasilitas lengkap dengan dukungan penuh kelas industri berstandar nasional.',
                'image' => '',
                'button_text' => 'Daftar Sekarang',
                'button_url' => '#ppdb',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'MITRA INDUSTRI & DUNIA KERJA',
                'subtitle' => 'Lulusan dibekali sertifikasi industri kompeten & jaminan penyaluran kerja langsung.',
                'image' => '',
                'button_text' => 'Kemitraan Kami',
                'button_url' => '/business-center',
                'order' => 3,
                'is_active' => true,
            ],
        ];
        foreach ($sliders as $slide) {
            ImgModel::updateOrCreate(['title' => $slide['title']], $slide);
        }
        $this->command->info('17. Data Slider Banner berhasil dibuat.');

        // 18. Agenda Sekolah (6 Agenda)
        $agendas = [
            [
                'title' => 'Penilaian Akhir Semester (PAS) Genap',
                'description' => 'Ujian akhir semester untuk seluruh jenjang kelas X, XI, dan XII.',
                'event_date' => now()->addDays(7)->format('Y-m-d'),
                'end_date' => now()->addDays(12)->format('Y-m-d'),
                'selected_dates' => [now()->addDays(7)->format('Y-m-d'), now()->addDays(12)->format('Y-m-d')],
                'category' => 'akademik',
                'is_active' => true,
            ],
            [
                'title' => 'Uji Kompetensi Keahlian (UKK) Mandiri',
                'description' => 'Ujian praktik keahlian khusus kelas XII dengan penguji eksternal dari mitra industri.',
                'event_date' => now()->addDays(15)->format('Y-m-d'),
                'end_date' => now()->addDays(18)->format('Y-m-d'),
                'selected_dates' => [now()->addDays(15)->format('Y-m-d'), now()->addDays(18)->format('Y-m-d')],
                'category' => 'akademik',
                'is_active' => true,
            ],
            [
                'title' => 'Pentas Seni & Gebyar SMK YAJ',
                'description' => 'Pameran produk kreativitas program keahlian dan pertunjukan seni musik dari OSIS.',
                'event_date' => now()->addDays(25)->format('Y-m-d'),
                'end_date' => now()->addDays(25)->format('Y-m-d'),
                'selected_dates' => [now()->addDays(25)->format('Y-m-d')],
                'category' => 'event',
                'is_active' => true,
            ],
            [
                'title' => 'Libur Kenaikan Kelas & Semester Genap',
                'description' => 'Masa libur sekolah akhir tahun ajaran bagi seluruh siswa kelas X dan XI.',
                'event_date' => now()->addDays(30)->format('Y-m-d'),
                'end_date' => now()->addDays(40)->format('Y-m-d'),
                'selected_dates' => [now()->addDays(30)->format('Y-m-d'), now()->addDays(40)->format('Y-m-d')],
                'category' => 'libur',
                'is_active' => true,
            ],
            [
                'title' => 'Workshop Kewirausahaan Siswa Kreatif',
                'description' => 'Mendatangkan entrepreneur muda sukses Depok untuk melatih jiwa wirausaha bisnis ritel digital.',
                'event_date' => now()->addDays(45)->format('Y-m-d'),
                'end_date' => now()->addDays(46)->format('Y-m-d'),
                'selected_dates' => [now()->addDays(45)->format('Y-m-d'), now()->addDays(46)->format('Y-m-d')],
                'category' => 'akademik',
                'is_active' => true,
            ],
            [
                'title' => 'Pertemuan Orang Tua Siswa Baru (PPDB)',
                'description' => 'Sosialisasi visi misi sekolah, penyerahan seragam resmi, dan pengenalan program kelas industri.',
                'event_date' => now()->addDays(50)->format('Y-m-d'),
                'end_date' => now()->addDays(50)->format('Y-m-d'),
                'selected_dates' => [now()->addDays(50)->format('Y-m-d')],
                'category' => 'event',
                'is_active' => true,
            ],
        ];
        foreach ($agendas as $ag) {
            Agenda::updateOrCreate(['title' => $ag['title']], $ag);
        }
        $this->command->info('18. Data Agenda Sekolah berhasil dibuat.');

        $this->command->info('=== SEEDING SELESAI DENGAN SUKSES! ===');
        $this->command->info('Gunakan perintah: php artisan db:seed --class=ProductionSeeder');
    }
}

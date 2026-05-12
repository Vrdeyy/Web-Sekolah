<?php

namespace Database\Seeders;

use App\Models\Achievement;
use App\Models\Award;
use App\Models\BusinessCenter;
use App\Models\Extracurricular;
use App\Models\Gallery;
use App\Models\Major;
use App\Models\News;
use App\Models\Page;
use App\Models\Partner;
use App\Models\PrincipalMessage;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\SocialLink;
use App\Models\Staff;
use App\Models\Statistic;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;

class DevelopmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Proteksi: Cuma jalan di LOCAL environment
        if (!App::environment('local')) {
            $this->command->error('Seeder ini hanya boleh dijalankan di environment LOCAL!');
            return;
        }

        $this->command->info('Memulai seeding data pengembangan...');

        // 1. User Admin (buat login)
        User::updateOrCreate(
            ['email' => 'admin@sekolah.id'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('admin123'),
                'email_verified_at' => now(),
            ]
        );
        $this->command->info('User admin created/updated: admin@sekolah.id / admin123');

        // 2. Settings (Hero & General)
        $settings = [
            ['key' => 'hero_badge', 'value' => 'Status Akreditasi A', 'group' => 'hero'],
            ['key' => 'hero_title', 'value' => 'Pendidikan Online Serasa Kelas Nyata', 'group' => 'hero'],
            ['key' => 'hero_description', 'value' => 'Sistem pembelajaran sekolah modern dengan kelas interaktif, materi terstruktur, dan pendampingan guru profesional.', 'group' => 'hero'],
            ['key' => 'hero_primary_text', 'value' => 'PPDB Online', 'group' => 'hero'],
            ['key' => 'hero_secondary_text', 'value' => 'Profil Sekolah', 'group' => 'hero'],
            ['key' => 'ppdb_url', 'value' => '#', 'group' => 'general'],
            ['key' => 'ppdb_active', 'value' => '1', 'group' => 'general'],
            ['key' => 'years_experience', 'value' => '25', 'group' => 'general'],
            ['key' => 'school_name', 'value' => 'SMK YAJ Depok', 'group' => 'general'],
            ['key' => 'hero_stats_1_label', 'value' => 'Siswa Aktif', 'group' => 'hero'],
            ['key' => 'hero_stats_1_value', 'value' => '1500', 'group' => 'hero'],
            ['key' => 'hero_stats_2_label', 'value' => 'Guru Profesional', 'group' => 'hero'],
            ['key' => 'hero_stats_3_label', 'value' => 'Kelulusan', 'group' => 'hero'],
            ['key' => 'hero_stats_3_value', 'value' => '98', 'group' => 'hero'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(['key' => $setting['key']], $setting);
        }

        // 3. Principal Message
        PrincipalMessage::updateOrCreate(
            ['name' => 'Drs. H. Syamsuddin, M.Pd'],
            [
                'title' => 'Kepala Sekolah SMK YAJ',
                'message' => 'Selamat datang di website resmi sekolah kami. Kami berkomitmen untuk terus berinovasi dalam dunia pendidikan.',
                'vision' => 'Menjadi lembaga pendidikan unggul yang menghasilkan lulusan berakhlak mulia dan kompeten.',
                'mission' => 'Menyelenggarakan pembelajaran berkualitas dan berbasis industri.',
                'photo' => null,
                'is_active' => true,
            ]
        );

        // 4. Statistics
        $stats = [
            ['label' => 'Siswa Aktif', 'value' => '1500', 'suffix' => '+', 'icon' => 'fas fa-users'],
            ['label' => 'Guru & Staf', 'value' => '120', 'suffix' => '+', 'icon' => 'fas fa-chalkboard-teacher'],
            ['label' => 'Ruang Kelas', 'value' => '40', 'suffix' => '', 'icon' => 'fas fa-school'],
        ];
        foreach ($stats as $stat) {
            Statistic::updateOrCreate(['label' => $stat['label']], $stat);
        }

        // 5. Social Links
        $socials = [
            ['platform' => 'Instagram', 'url' => 'https://instagram.com', 'icon' => 'fab fa-instagram'],
            ['platform' => 'Facebook', 'url' => 'https://facebook.com', 'icon' => 'fab fa-facebook'],
            ['platform' => 'Youtube', 'url' => 'https://youtube.com', 'icon' => 'fab fa-youtube'],
        ];
        foreach ($socials as $social) {
            SocialLink::updateOrCreate(['platform' => $social['platform']], $social);
        }

        // 6. Data Manual & Factory (Realistic)
        $this->command->info('Seeding data berita, guru, dan jurusan...');

        // Jurusan (Majors)
        $majors = [
            [
                'name' => 'Pengembangan Perangkat Lunak dan GIM',
                'short_name' => 'PPLG',
                'slug' => 'pplg',
                'short_description' => 'Mempelajari pembuatan software dan pengembangan game.',
                'description' => 'Jurusan yang fokus pada logika pemrograman, basis data, dan pengembangan aplikasi di berbagai platform.',
                'competencies' => 'Pemrograman Web, Mobile App, Basis Data, Game Development',
            ],
            [
                'name' => 'Teknik Jaringan Komputer dan Telekomunikasi',
                'short_name' => 'TJKT',
                'slug' => 'tjkt',
                'short_description' => 'Fokus pada infrastruktur jaringan dan server.',
                'description' => 'Mempelajari cara merancang, membangun, dan mengelola infrastruktur jaringan komputer serta administrasi server.',
                'competencies' => 'Networking, Server Administration, Cyber Security, Cloud Computing',
            ],
            [
                'name' => 'Desain Komunikasi Visual',
                'short_name' => 'DKV',
                'slug' => 'dkv',
                'short_description' => 'Mengembangkan kreativitas dalam desain dan multimedia.',
                'description' => 'Mempelajari teknik komunikasi visual menggunakan elemen grafis, fotografi, dan videografi untuk menyampaikan pesan.',
                'competencies' => 'Graphic Design, Videography, Photography, Illustration',
            ],
            [
                'name' => 'Akuntansi dan Keuangan Lembaga',
                'short_name' => 'AKL',
                'slug' => 'akl',
                'short_description' => 'Mempelajari pengelolaan keuangan dan perpajakan.',
                'description' => 'Menghasilkan tenaga profesional di bidang akuntansi, audit, dan keuangan yang kompeten serta teliti.',
                'competencies' => 'Financial Accounting, Taxation, Spreadsheets, Auditing',
            ],
        ];
        foreach ($majors as $m) {
            Major::updateOrCreate(['slug' => $m['slug']], $m);
        }

        // Ekstrakurikuler
        $extras = [
            [
                'name' => 'Pramuka',
                'slug' => 'pramuka',
                'short_description' => 'Membentuk karakter dan kemandirian.',
                'description' => 'Kegiatan kepramukaan untuk melatih jiwa kepemimpinan, kemandirian, dan kerja sama tim.',
                'coach' => 'Kak Sudirman',
                'schedule' => 'Sabtu, 08.00 - 12.00',
            ],
            [
                'name' => 'Paskibra',
                'slug' => 'paskibra',
                'short_description' => 'Melatih kedisiplinan dan cinta tanah air.',
                'description' => 'Pasukan Pengibar Bendera yang fokus pada kedisiplinan, ketangkasan baris-berbaris, dan jiwa patriotisme.',
                'coach' => 'Bpk. Heru',
                'schedule' => 'Rabu, 15.30 - 17.00',
            ],
            [
                'name' => 'Futsal',
                'slug' => 'futsal',
                'short_description' => 'Mengembangkan bakat olahraga bola.',
                'description' => 'Wadah bagi siswa untuk mengembangkan bakat dan prestasi di bidang olahraga futsal.',
                'coach' => 'Coach Andi',
                'schedule' => 'Jumat, 15.30 - 17.30',
            ],
            [
                'name' => 'Rohis',
                'slug' => 'rohis',
                'short_description' => 'Pembinaan akhlak dan nilai keagamaan.',
                'description' => 'Kegiatan kerohanian Islam untuk memperdalam ilmu agama dan membina akhlak mulia siswa.',
                'coach' => 'Ust. Mansyur',
                'schedule' => 'Kamis, 15.30 - 17.00',
            ],
        ];
        foreach ($extras as $e) {
            Extracurricular::updateOrCreate(['slug' => $e['slug']], $e);
        }

        // Berita (News)
        $newsItems = [
            [
                'title' => 'PPDB Tahun Ajaran 2026/2027 Resmi Dibuka',
                'slug' => 'ppdb-2026-dibuka',
                'category' => 'Info Sekolah',
                'excerpt' => 'SMK YAJ Depok kembali membuka pendaftaran siswa baru untuk tahun ajaran 2026/2027.',
                'content' => 'SMK YAJ Depok dengan bangga mengumumkan bahwa pendaftaran peserta didik baru telah resmi dibuka. Tersedia berbagai program keahlian unggulan dengan fasilitas lengkap dan kurikulum berbasis industri.',
                'is_active' => true,
                'published_at' => now(),
            ],
            [
                'title' => 'Siswa PPLG Meraih Juara 1 LKS Tingkat Provinsi',
                'slug' => 'juara-lks-pplg',
                'category' => 'Prestasi',
                'excerpt' => 'Prestasi membanggakan di bidang Web Technologies pada ajang LKS Provinsi.',
                'content' => 'Seorang siswa dari jurusan Pengembangan Perangkat Lunak dan GIM (PPLG) berhasil mengharumkan nama sekolah dengan meraih medali emas dalam kompetisi LKS tingkat Provinsi bidang Web Technologies.',
                'is_active' => true,
                'published_at' => now(),
            ],
            [
                'title' => 'Kunjungan Industri ke PT. Telkom Indonesia',
                'slug' => 'kunjungan-industri-telkom',
                'category' => 'Kegiatan',
                'excerpt' => 'Siswa TJKT memperdalam wawasan di Telkom Indonesia.',
                'content' => 'Dalam rangka link and match dengan industri, siswa kelas XI TJKT melakukan kunjungan industri ke PT. Telkom Indonesia untuk melihat implementasi infrastruktur jaringan skala nasional.',
                'is_active' => true,
                'published_at' => now(),
            ],
        ];
        foreach ($newsItems as $n) {
            News::updateOrCreate(['slug' => $n['slug']], $n);
        }

        // Prestasi (Achievements)
        $achievements = [
            [
                'title' => 'Juara 1 LKS Web Technologies',
                'slug' => 'juara-1-lks-web-provinsi',
                'student_name' => 'Ahmad Bagus',
                'competition_name' => 'Lomba Kompetensi Siswa (LKS)',
                'level' => 'Provinsi',
                'rank' => '1',
                'year' => '2025',
                'description' => 'Meraih juara pertama dalam bidang lomba Web Technologies.',
                'is_active' => true,
            ],
            [
                'title' => 'Juara 2 Futsal Cup Regional',
                'slug' => 'juara-2-futsal-regional',
                'student_name' => 'Tim Futsal SMK YAJ',
                'competition_name' => 'Futsal Pelajar Cup',
                'level' => 'Regional',
                'rank' => '2',
                'year' => '2025',
                'description' => 'Mendapatkan posisi runner-up setelah pertandingan sengit di final.',
                'is_active' => true,
            ],
        ];
        foreach ($achievements as $a) {
            Achievement::updateOrCreate(['slug' => $a['slug']], $a);
        }

        // Penghargaan Sekolah (Awards)
        $awards = [
            [
                'title' => 'Sekolah Adiwiyata Tingkat Nasional',
                'description' => 'Penghargaan atas komitmen sekolah dalam menjaga kelestarian lingkungan dan budaya hijau.',
                'year' => '2024',
                'organizer' => 'Kementerian Lingkungan Hidup',
                'is_active' => true,
            ],
            [
                'title' => 'Best Vocational School for Tech Innovation',
                'description' => 'Penghargaan sebagai SMK terbaik dalam inovasi teknologi dan pembelajaran digital.',
                'year' => '2023',
                'organizer' => 'Indonesia Education Awards',
                'is_active' => true,
            ],
        ];
        foreach ($awards as $aw) {
            Award::updateOrCreate(['title' => $aw['title']], $aw);
        }

        // Business Center
        $businessCenters = [
            [
                'name' => 'YAJ Mart',
                'slug' => 'yaj-mart',
                'short_description' => 'Toko ritel sekolah yang dikelola siswa.',
                'description' => 'Unit usaha ritel yang menyediakan kebutuhan harian siswa sekaligus menjadi tempat praktik jurusan Akuntansi.',
                'location' => 'Gedung A, Lantai 1',
                'phone' => '021-1234567',
                'is_active' => true,
            ],
            [
                'name' => 'YAJ Tech Services',
                'slug' => 'yaj-tech-services',
                'short_description' => 'Jasa servis komputer dan instalasi jaringan.',
                'description' => 'Unit layanan teknologi yang mengerjakan perbaikan hardware, software, dan instalasi jaringan profesional.',
                'location' => 'Laboratorium TJKT',
                'phone' => '021-7654321',
                'is_active' => true,
            ],
        ];
        foreach ($businessCenters as $bc) {
            BusinessCenter::updateOrCreate(['slug' => $bc['slug']], $bc);
        }

        // Jalankan sisanya pake factory dikit aja buat pelengkap
        Teacher::factory()->count(5)->create();
        Staff::factory()->count(3)->create();
        Partner::factory()->count(4)->create();
        Gallery::factory()->count(6)->create();
        Slider::factory()->count(3)->create();

        // 7. Manual Pages
        $pages = [
            ['title' => 'Yayasan', 'slug' => 'yayasan', 'content' => 'Informasi mengenai Yayasan pengelola sekolah.'],
            ['title' => 'Profil Sekolah', 'slug' => 'sekolah', 'content' => 'Sejarah dan profil SMK YAJ Depok.'],
            ['title' => 'Visi & Misi', 'slug' => 'visi-misi', 'content' => 'Visi dan misi sekolah kami.'],
            ['title' => 'Kontak Kami', 'slug' => 'kontak', 'content' => 'Informasi kontak dan lokasi sekolah.'],
        ];
        foreach ($pages as $page) {
            Page::updateOrCreate(['slug' => $page['slug']], $page);
        }

        $this->command->info('Seeding selesai! Semua data pengembangan berhasil dibuat.');
        $this->command->info('Gunakan: php artisan db:seed --class=DevelopmentSeeder');
    }
}

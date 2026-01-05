<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\PrincipalMessage;
use App\Models\Major;
use App\Models\SocialLink;
use App\Models\Statistic;
use App\Models\Page;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        User::firstOrCreate(
            ['email' => 'admin@sekolah.id'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('admin123'),
            ]
        );

        // Settings
        $settings = [
            ['key' => 'school_name', 'value' => 'SMK YAJ', 'type' => 'text', 'group' => 'general'],
            ['key' => 'school_tagline', 'value' => 'Pilihan Yang Tepat Di Sekolah Yang Berkualitas', 'type' => 'text', 'group' => 'general'],
            ['key' => 'school_description', 'value' => 'Sekolah Menengah Kejuruan yang berkomitmen mencetak generasi yang terampil, berkarakter, dan siap bersaing di dunia kerja.', 'type' => 'textarea', 'group' => 'general'],
            ['key' => 'school_email', 'value' => 'info@sekolah.id', 'type' => 'text', 'group' => 'contact'],
            ['key' => 'school_phone', 'value' => '(021) 12345678', 'type' => 'text', 'group' => 'contact'],
            ['key' => 'school_address', 'value' => 'Jl. Pendidikan No. 123, Jakarta', 'type' => 'textarea', 'group' => 'contact'],
            ['key' => 'school_hours', 'value' => 'Senin - Jumat: 07:00 - 17:00, Sabtu: 07:00 - 15:00', 'type' => 'text', 'group' => 'contact'],
            ['key' => 'ppdb_url', 'value' => 'https://ppdb.sekolah.id', 'type' => 'url', 'group' => 'ppdb'],
            ['key' => 'ppdb_active', 'value' => '1', 'type' => 'text', 'group' => 'ppdb'],
            ['key' => 'years_experience', 'value' => '20', 'type' => 'text', 'group' => 'general'],
            ['key' => 'school_logo', 'value' => null, 'type' => 'image', 'group' => 'general'],
        ];

        foreach ($settings as $setting) {
            Setting::firstOrCreate(['key' => $setting['key']], $setting);
        }

        // Sliders
        Slider::firstOrCreate(
            ['title' => 'SMK YAJ'],
            [
                'subtitle' => 'Pilihan Yang Tepat Di Sekolah Yang Berkualitas',
                'image' => 'sliders/default-banner.jpg',
                'button_text' => 'DAFTAR PPDB',
                'button_url' => 'https://ppdb.sekolah.id',
                'order' => 1,
                'is_active' => true,
            ]
        );

        // Principal Message
        PrincipalMessage::firstOrCreate(
            ['name' => 'Drs. H. Ahmad Fauzi, M.Pd.'],
            [
                'title' => 'Kepala Sekolah',
                'message' => '<p>Assalamu\'alaikum warahmatullahi wabarakatuh,</p><p>Saya selaku kepala sekolah SMK YAJ mengucapkan selamat datang kepada seluruh pengunjung website kami. Selamat datang di SMK YAJ, Lembaga pendidikan yang berkomitmen mencetak generasi yang terampil, berkarakter, dan siap bersaing di dunia kerja serta melanjutkan pendidikan ke jenjang yang lebih tinggi.</p><p>Di era globalisasi dan digitalisasi ini, tantangan di dunia industri semakin kompleks. Oleh karena itu, kami di SMK YAJ senantiasa berupaya memberikan pendidikan berbasis kompetensi, mengedepankan nilai-nilai kejujuran, disiplin, dan inovasi.</p><p>Wassalamu\'alaikum warahmatullahi wabarakatuh.</p>',
                'vision' => '<p>Terwujudnya Sekolah Kejuruan yang Religius, Disiplin dan Terampil dalam Menyongsong Generasi Emas di tahun 2045.</p>',
                'mission' => '<p>Mewujudkan peserta didik yang berperilaku baik, patuh, dan memiliki jiwa kepemimpinan.</p>',
                'is_active' => true,
            ]
        );

        // Majors
        $majors = [
            ['name' => 'Teknik Jaringan Komputer dan Telekomunikasi', 'short_name' => 'TJKT', 'short_description' => 'Mempelajari jaringan komputer, telekomunikasi, dan infrastruktur IT modern.'],
            ['name' => 'Pengembangan Perangkat Lunak dan Gim', 'short_name' => 'PPLG', 'short_description' => 'Mempelajari pemrograman, pengembangan aplikasi, dan pembuatan game.'],
            ['name' => 'Desain Komunikasi Visual', 'short_name' => 'DKV', 'short_description' => 'Mempelajari desain grafis, multimedia, dan komunikasi visual.'],
            ['name' => 'Perhotelan', 'short_name' => 'PH', 'short_description' => 'Mempelajari manajemen hotel, pelayanan tamu, dan hospitality.'],
            ['name' => 'Manajemen Perkantoran dan Layanan Bisnis', 'short_name' => 'MPLB', 'short_description' => 'Mempelajari administrasi perkantoran, layanan bisnis, dan manajemen.'],
            ['name' => 'Pemasaran', 'short_name' => 'PM', 'short_description' => 'Mempelajari strategi pemasaran, penjualan, dan bisnis digital.'],
        ];

        foreach ($majors as $index => $major) {
            Major::firstOrCreate(
                ['slug' => \Illuminate\Support\Str::slug($major['name'])],
                array_merge($major, [
                    'slug' => \Illuminate\Support\Str::slug($major['name']),
                    'order' => $index + 1,
                    'is_active' => true,
                ])
            );
        }

        // Social Links
        $socialLinks = [
            ['platform' => 'youtube', 'url' => 'https://youtube.com/@sekolahyaj'],
            ['platform' => 'instagram', 'url' => 'https://instagram.com/smkyaj'],
            ['platform' => 'facebook', 'url' => 'https://facebook.com/smkyaj'],
            ['platform' => 'twitter', 'url' => 'https://twitter.com/smkyaj'],
        ];

        foreach ($socialLinks as $index => $link) {
            SocialLink::firstOrCreate(
                ['platform' => $link['platform']],
                array_merge($link, [
                    'order' => $index + 1,
                    'is_active' => true,
                ])
            );
        }

        // Statistics
        $statistics = [
            ['label' => 'Tahun Pengalaman', 'value' => '20', 'suffix' => '+'],
            ['label' => 'Siswa Aktif', 'value' => '1500', 'suffix' => '+'],
            ['label' => 'Guru & Staff', 'value' => '80', 'suffix' => '+'],
            ['label' => 'Alumni', 'value' => '5000', 'suffix' => '+'],
        ];

        foreach ($statistics as $index => $stat) {
            Statistic::firstOrCreate(
                ['label' => $stat['label']],
                array_merge($stat, [
                    'order' => $index + 1,
                    'is_active' => true,
                ])
            );
        }

        // Pages - untuk halaman statis (Yayasan, Sekolah, Visi & Misi)
        $pages = [
            [
                'title' => 'Yayasan',
                'slug' => 'yayasan',
                'content' => '<h2>Tentang Yayasan</h2>
                <p>Yayasan Adi Jaya (YAJ) adalah lembaga pendidikan yang berdedikasi untuk mencerdaskan kehidupan bangsa melalui pendidikan berkualitas. Didirikan pada tahun 2004, yayasan ini telah berkontribusi dalam mencetak generasi muda yang terampil dan berkarakter.</p>
                
                <h3>Sejarah Yayasan</h3>
                <p>Yayasan Adi Jaya didirikan oleh para tokoh pendidikan yang memiliki visi untuk membangun lembaga pendidikan kejuruan yang berkualitas. Bermula dari sebuah cita-cita sederhana, kini YAJ telah berkembang menjadi salah satu yayasan pendidikan terkemuka di wilayahnya.</p>
                
                <h3>Struktur Organisasi</h3>
                <ul>
                    <li>Ketua Yayasan</li>
                    <li>Sekretaris</li>
                    <li>Bendahara</li>
                    <li>Pengawas</li>
                </ul>
                
                <h3>Komitmen Kami</h3>
                <p>Yayasan berkomitmen untuk terus meningkatkan kualitas pendidikan, fasilitas, dan layanan kepada seluruh peserta didik. Kami percaya bahwa pendidikan adalah investasi terbaik untuk masa depan bangsa.</p>',
                'is_active' => true,
                'order' => 1,
            ],
            [
                'title' => 'Sekolah',
                'slug' => 'sekolah',
                'content' => '<h2>Profil SMK YAJ</h2>
                <p>SMK YAJ adalah sekolah menengah kejuruan yang bernaung di bawah Yayasan Adi Jaya. Sekolah ini berdiri sejak tahun 2004 dan telah meluluskan ribuan alumni yang sukses di berbagai bidang pekerjaan.</p>
                
                <h3>Fasilitas Sekolah</h3>
                <ul>
                    <li>Ruang Kelas Ber-AC</li>
                    <li>Laboratorium Komputer</li>
                    <li>Laboratorium Bahasa</li>
                    <li>Perpustakaan Digital</li>
                    <li>Ruang Praktik Perhotelan</li>
                    <li>Studio Desain</li>
                    <li>Lapangan Olahraga</li>
                    <li>Masjid</li>
                    <li>Kantin Sehat</li>
                    <li>Business Center</li>
                </ul>
                
                <h3>Akreditasi</h3>
                <p>SMK YAJ telah terakreditasi A oleh Badan Akreditasi Nasional Sekolah/Madrasah (BAN-S/M), yang menunjukkan bahwa sekolah ini memenuhi standar kualitas pendidikan nasional.</p>
                
                <h3>Kerjasama Industri</h3>
                <p>Kami menjalin kerjasama dengan berbagai perusahaan dan industri untuk memberikan pengalaman praktik kerja lapangan (PKL) yang bermakna bagi siswa-siswi kami.</p>',
                'is_active' => true,
                'order' => 2,
            ],
            [
                'title' => 'Visi & Misi',
                'slug' => 'visi-misi',
                'content' => '<h2>Visi</h2>
                <p><strong>Terwujudnya Sekolah Kejuruan yang Religius, Disiplin dan Terampil dalam Menyongsong Generasi Emas di tahun 2045.</strong></p>
                
                <h2>Misi</h2>
                <ol>
                    <li>Mewujudkan peserta didik yang berperilaku baik, patuh, dan memiliki jiwa kepemimpinan.</li>
                    <li>Meningkatkan kompetensi keahlian sesuai dengan kebutuhan dunia usaha dan dunia industri (DUDI).</li>
                    <li>Mengembangkan keterampilan peserta didik dalam bidang teknologi dan informasi.</li>
                    <li>Menumbuhkan jiwa wirausaha yang mandiri dan inovatif.</li>
                    <li>Menciptakan lingkungan belajar yang kondusif, aman, dan nyaman.</li>
                    <li>Menjalin kerjasama yang baik dengan dunia usaha dan dunia industri.</li>
                    <li>Mengembangkan potensi peserta didik melalui kegiatan ekstrakurikuler.</li>
                </ol>
                
                <h2>Tujuan</h2>
                <ol>
                    <li>Menghasilkan lulusan yang kompeten dan siap kerja.</li>
                    <li>Menghasilkan lulusan yang mampu berwirausaha.</li>
                    <li>Menghasilkan lulusan yang dapat melanjutkan ke perguruan tinggi.</li>
                    <li>Meningkatkan kualitas sumber daya manusia yang profesional.</li>
                </ol>
                
                <h2>Motto</h2>
                <p><strong>"Pilihan Yang Tepat Di Sekolah Yang Berkualitas"</strong></p>',
                'is_active' => true,
                'order' => 3,
            ],
        ];

        foreach ($pages as $page) {
            Page::firstOrCreate(
                ['slug' => $page['slug']],
                $page
            );
        }

        // Extracurriculars
        $extracurriculars = [
            ['name' => 'Pramuka', 'slug' => 'pramuka', 'short_description' => 'Kegiatan kepramukaan untuk membentuk karakter dan kepemimpinan siswa.', 'schedule' => 'Sabtu, 13:00-15:00'],
            ['name' => 'Basket', 'slug' => 'basket', 'short_description' => 'Olahraga basket untuk mengembangkan kerjasama tim dan kebugaran.', 'schedule' => 'Selasa & Kamis, 15:00-17:00'],
            ['name' => 'Futsal', 'slug' => 'futsal', 'short_description' => 'Olahraga futsal untuk mengasah kemampuan bermain bola.', 'schedule' => 'Senin & Rabu, 15:00-17:00'],
            ['name' => 'Rohani Islam', 'slug' => 'rohis', 'short_description' => 'Kegiatan keagamaan untuk memperdalam ilmu agama Islam.', 'schedule' => 'Jumat, 11:00-12:00'],
            ['name' => 'Paduan Suara', 'slug' => 'paduan-suara', 'short_description' => 'Pengembangan bakat menyanyi dan seni musik vokal.', 'schedule' => 'Rabu, 15:00-17:00'],
            ['name' => 'English Club', 'slug' => 'english-club', 'short_description' => 'Klub bahasa Inggris untuk meningkatkan kemampuan berbahasa.', 'schedule' => 'Kamis, 15:00-17:00'],
        ];

        foreach ($extracurriculars as $index => $ekskul) {
            \App\Models\Extracurricular::firstOrCreate(
                ['slug' => $ekskul['slug']],
                array_merge($ekskul, [
                    'order' => $index + 1,
                    'is_active' => true,
                ])
            );
        }

        // Sample Achievements
        $achievements = [
            ['title' => 'Juara 1 Lomba Kompetensi Siswa Tingkat Provinsi', 'student_name' => 'Ahmad Rizky', 'level' => 'Provinsi', 'rank' => 'Juara 1', 'year' => '2024'],
            ['title' => 'Juara 2 Olimpiade Matematika', 'student_name' => 'Siti Aisyah', 'level' => 'Kota/Kabupaten', 'rank' => 'Juara 2', 'year' => '2024'],
            ['title' => 'Best Innovation Award - IT Competition', 'student_name' => 'Budi Santoso', 'level' => 'Nasional', 'rank' => 'Best Innovation', 'year' => '2023'],
        ];

        foreach ($achievements as $index => $achievement) {
            \App\Models\Achievement::firstOrCreate(
                ['title' => $achievement['title']],
                array_merge($achievement, [
                    'slug' => \Illuminate\Support\Str::slug($achievement['title']),
                    'order' => $index + 1,
                    'is_active' => true,
                ])
            );
        }

        // Sample Awards
        $awards = [
            ['title' => 'Sekolah Adiwiyata', 'year' => '2023', 'organizer' => 'Kementerian Lingkungan Hidup'],
            ['title' => 'Akreditasi A', 'year' => '2022', 'organizer' => 'BAN-S/M'],
            ['title' => 'Sekolah Sehat', 'year' => '2023', 'organizer' => 'Kemenkes RI'],
            ['title' => 'Sekolah Ramah Anak', 'year' => '2024', 'organizer' => 'KPAI'],
        ];

        foreach ($awards as $index => $award) {
            \App\Models\Award::firstOrCreate(
                ['title' => $award['title']],
                array_merge($award, [
                    'order' => $index + 1,
                    'is_active' => true,
                ])
            );
        }

        // Sample News
        $newsItems = [
            [
                'title' => 'Wisuda Angkatan ke-20 SMK YAJ',
                'slug' => 'wisuda-angkatan-ke-20-smk-yaj',
                'excerpt' => 'SMK YAJ sukses menggelar wisuda angkatan ke-20 dengan meluluskan 350 siswa yang siap terjun ke dunia kerja.',
                'content' => '<p>Pada hari Sabtu, 15 Desember 2024, SMK YAJ menggelar acara wisuda untuk angkatan ke-20. Acara ini dihadiri oleh para orang tua siswa, guru, dan perwakilan dari berbagai perusahaan mitra.</p><p>Kepala Sekolah dalam sambutannya menyampaikan rasa bangga atas prestasi para wisudawan yang telah berhasil menyelesaikan pendidikan mereka dengan baik.</p>',
                'category' => 'Kegiatan',
                'is_featured' => true,
                'published_at' => now(),
            ],
            [
                'title' => 'Kunjungan Industri ke PT Telkom Indonesia',
                'slug' => 'kunjungan-industri-ke-pt-telkom',
                'excerpt' => 'Siswa jurusan TJKT melakukan kunjungan industri ke PT Telkom Indonesia untuk mempelajari teknologi jaringan terkini.',
                'content' => '<p>Dalam rangka meningkatkan wawasan siswa tentang dunia industri, SMK YAJ mengadakan kunjungan industri ke PT Telkom Indonesia. Kegiatan ini diikuti oleh 60 siswa jurusan Teknik Jaringan Komputer dan Telekomunikasi.</p>',
                'category' => 'Kunjungan',
                'is_featured' => false,
                'published_at' => now()->subDays(3),
            ],
            [
                'title' => 'Workshop Design Thinking untuk Siswa',
                'slug' => 'workshop-design-thinking',
                'excerpt' => 'Workshop design thinking diadakan untuk meningkatkan kreativitas dan kemampuan problem solving siswa.',
                'content' => '<p>SMK YAJ bekerja sama dengan startup lokal mengadakan workshop design thinking untuk siswa kelas XI. Workshop ini bertujuan untuk mengajarkan metode berpikir kreatif dalam menyelesaikan masalah.</p>',
                'category' => 'Workshop',
                'is_featured' => false,
                'published_at' => now()->subDays(7),
            ],
            [
                'title' => 'Pembukaan Pendaftaran PPDB 2025/2026',
                'slug' => 'pembukaan-ppdb-2025-2026',
                'excerpt' => 'PPDB SMK YAJ tahun ajaran 2025/2026 resmi dibuka! Segera daftarkan diri Anda.',
                'content' => '<p>Pendaftaran Peserta Didik Baru (PPDB) SMK YAJ untuk tahun ajaran 2025/2026 telah resmi dibuka. Calon siswa dapat mendaftar melalui website resmi atau datang langsung ke sekolah.</p>',
                'category' => 'Pengumuman',
                'is_featured' => true,
                'published_at' => now()->subDays(1),
            ],
        ];

        foreach ($newsItems as $item) {
            \App\Models\News::firstOrCreate(
                ['slug' => $item['slug']],
                array_merge($item, [
                    'author' => 'Admin',
                    'views' => rand(50, 500),
                    'is_active' => true,
                ])
            );
        }
    }
}


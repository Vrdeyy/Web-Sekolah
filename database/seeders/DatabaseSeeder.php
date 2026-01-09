<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\ImgModel;
use App\Models\PrincipalMessage;
use App\Models\Major;
use App\Models\SocialLink;
use App\Models\Statistic;
use App\Models\Page;
use App\Models\Extracurricular;
use App\Models\Achievement;
use App\Models\Award;
use App\Models\News;
use App\Models\Teacher;
use App\Models\Staff;
use App\Models\BusinessCenter;
use App\Models\Gallery;
use App\Models\Partner;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin User
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
            ['key' => 'school_logo', 'value' => 'settings/01KE6S8XE1R1E46K919Q1JF776.jpg', 'type' => 'image', 'group' => 'general'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(['key' => $setting['key']], $setting);
        }

        // Sliders & ImgModels (Sync both for compatibility)
        $slides = [
            [
                'title' => 'Foto 1',
                'subtitle' => 'Mewujudkan Generasi Unggul dan Berkarakter',
                'image' => 'sliders/01KE2H35KVYZTG0RS0XK5AK5NV.png',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Foto 2',
                'subtitle' => 'Fasilitas Modern dan Kurikulum Berbasis Industri',
                'image' => 'sliders/01KE2H3YTWJWFCWDPVVGHG8AR3.png',
                'order' => 2,
                'is_active' => true,
            ]
        ];

        foreach ($slides as $slide) {
            Slider::updateOrCreate(['title' => $slide['title']], $slide);
            ImgModel::updateOrCreate(['title' => $slide['title']], $slide);
        }

        // Principal Messages
        $principalMessages = [
            [
                'name' => 'Idham Kholid S.ag S.e',
                'title' => 'Kepala Sekolah',
                'message' => '<p>Assalamu\'alaikum warahmatullahi wabarakatuh,</p><p>Saya selaku kepala sekolah SMK YAJ mengucapkan selamat datang kepada seluruh pengunjung website kami. Selamat datang di SMK YAJ, Lembaga pendidikan yang berkomitmen mencetak generasi yang terampil, berkarakter, dan siap bersaing di dunia kerja serta melanjutkan pendidikan ke jenjang yang lebih tinggi.</p><p>Di era globalisasi dan digitalisasi ini, tantangan di dunia industri semakin kompleks. Oleh karena itu, kami di SMK YAJ senantiasa berupaya memberikan pendidikan berbasis kompetensi, mengedepankan nilai-nilai kejujuran, disiplin, dan inovasi.</p><p>Wassalamu\'alaikum warahmatullahi wabarakatuh.</p>',
                'vision' => '<p>Terwujudnya Sekolah Kejuruan yang Religius, Disiplin dan Terampil dalam Menyongsong Generasi Emas di tahun 2045.</p>',
                'mission' => '<p>Mewujudkan peserta didik yang berperilaku baik, patuh, dan memiliki jiwa kepemimpinan.</p>',
                'is_active' => true,
            ],
            [
                'name' => 'Drs. H. Ahmad Fauzi, M.Pd.',
                'title' => 'Kepala Sekolah',
                'message' => '<p>Assalamu\'alaikum warahmatullahi wabarakatuh,</p><p>Saya selaku kepala sekolah SMK YAJ mengucapkan selamat datang kepada seluruh pengunjung website kami. Selamat datang di SMK YAJ, Lembaga pendidikan yang berkomitmen mencetak generasi yang terampil, berkarakter, dan siap bersaing di dunia kerja serta melanjutkan pendidikan ke jenjang yang lebih tinggi.</p><p>Di era globalisasi dan digitalisasi ini, tantangan di dunia industri semakin kompleks. Oleh karena itu, kami di SMK YAJ senantiasa berupaya memberikan pendidikan berbasis kompetensi, mengedepankan nilai-nilai kejujuran, disiplin, dan inovasi.</p><p>Wassalamu\'alaikum warahmatullahi wabarakatuh.</p>',
                'vision' => '<p>Terwujudnya Sekolah Kejuruan yang Religius, Disiplin dan Terampil dalam Menyongsong Generasi Emas di tahun 2045.</p>',
                'mission' => '<p>Mewujudkan peserta didik yang berperilaku baik, patuh, dan memiliki jiwa kepemimpinan.</p>',
                'is_active' => true,
            ]
        ];

        foreach ($principalMessages as $pMessage) {
            PrincipalMessage::updateOrCreate(['name' => $pMessage['name']], $pMessage);
        }

        // Majors
        $majors = [
            ['name' => 'Teknik Jaringan Komputer dan Telekomunikasi', 'short_name' => 'TJKT', 'short_description' => 'Mempelajari jaringan komputer, telekomunikasi, dan infrastruktur IT modern.', 'order' => 2],
            ['name' => 'Pengembangan Perangkat Lunak dan Gim', 'short_name' => 'PPLG', 'short_description' => 'Mempelajari pemrograman, pengembangan aplikasi, and pembuatan game.', 'image' => 'majors/01KEJ6D8K5D75W2ZYJ22P8MZ1J.webp', 'order' => 1],
            ['name' => 'Desain Komunikasi Visual', 'short_name' => 'DKV', 'short_description' => 'Mempelajari desain grafis, multimedia, dan komunikasi visual.', 'order' => 3],
            ['name' => 'Perhotelan', 'short_name' => 'PH', 'short_description' => 'Mempelajari manajemen hotel, pelayanan tamu, dan hospitality.', 'order' => 4],
            ['name' => 'Manajemen Perkantoran dan Layanan Bisnis', 'short_name' => 'MPLB', 'short_description' => 'Mempelajari administrasi perkantoran, layanan bisnis, dan manajemen.', 'order' => 5],
            ['name' => 'Pemasaran', 'short_name' => 'PM', 'short_description' => 'Mempelajari strategi pemasaran, penjualan, dan bisnis digital.', 'order' => 6],
        ];

        foreach ($majors as $major) {
            Major::updateOrCreate(
                ['slug' => Str::slug($major['name'])],
                array_merge($major, ['is_active' => true])
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
            SocialLink::updateOrCreate(
                ['platform' => $link['platform']],
                array_merge($link, ['order' => $index + 1, 'is_active' => true])
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
            Statistic::updateOrCreate(
                ['label' => $stat['label']],
                array_merge($stat, ['order' => $index + 1, 'is_active' => true])
            );
        }

        // Pages
        $pages = [
            ['title' => 'Yayasan', 'slug' => 'yayasan', 'content' => '<h2>Tentang Yayasan</h2><p>Yayasan Adi Jaya (YAJ) adalah lembaga pendidikan yang berdedikasi untuk mencerdaskan kehidupan bangsa melalui pendidikan berkualitas. Didirikan pada tahun 2004, yayasan ini telah berkontribusi dalam mencetak generasi muda yang terampil dan berkarakter.</p><h3>Sejarah Yayasan</h3><p>Yayasan Adi Jaya didirikan oleh para tokoh pendidikan yang memiliki visi untuk membangun lembaga pendidikan kejuruan yang berkualitas. Bermula dari sebuah cita-cita sederhana, kini YAJ telah berkembang menjadi salah satu yayasan pendidikan terkemuka di wilayahnya.</p><h3>Struktur Organisasi</h3><ul><li>Ketua Yayasan</li><li>Sekretaris</li><li>Bendahara</li><li>Pengawas</li></ul><h3>Komitmen Kami</h3><p>Yayasan berkomitmen untuk terus meningkatkan kualitas pendidikan, fasilitas, dan layanan kepada seluruh peserta didik. Kami percaya bahwa pendidikan adalah investasi terbaik untuk masa depan bangsa.</p>', 'order' => 1],
            ['title' => 'Sekolah', 'slug' => 'sekolah', 'content' => '<h2>Profil SMK YAJ</h2><p>SMK YAJ adalah sekolah menengah kejuruan yang bernaung di bawah Yayasan Adi Jaya. Sekolah ini berdiri sejak tahun 2004 dan telah meluluskan ribuan alumni yang sukses di berbagai bidang pekerjaan.</p><h3>Fasilitas Sekolah</h3><ul><li>Ruang Kelas Ber-AC</li><li>Laboratorium Komputer</li><li>Laboratorium Bahasa</li><li>Perpustakaan Digital</li><li>Ruang Praktik Perhotelan</li><li>Studio Desain</li><li>Lapangan Olahraga</li><li>Masjid</li><li>Kantin Sehat</li><li>Business Center</li></ul><h3>Akreditasi</h3><p>SMK YAJ telah terakreditasi A oleh Badan Akreditasi Nasional Sekolah/Madrasah (BAN-S/M), yang menunjukkan bahwa sekolah ini memenuhi standar kualitas pendidikan nasional.</p><h3>Kerjasama Industri</h3><p>Kami menjalin kerjasama dengan berbagai perusahaan dan industri untuk memberikan pengalaman praktik kerja lapangan (PKL) yang bermakna bagi siswa-siswi kami.</p>', 'order' => 2],
            ['title' => 'Visi & Misi', 'slug' => 'visi-misi', 'content' => '<h2>Visi</h2><p><strong>Terwujudnya Sekolah Kejuruan yang Religius, Disiplin dan Terampil dalam Menyongsong Generasi Emas di tahun 2045.</strong></p><h2>Misi</h2><ol><li>Mewujudkan peserta didik yang berperilaku baik, patuh, dan memiliki jiwa kepemimpinan.</li><li>Meningkatkan kompetensi keahlian sesuai dengan kebutuhan dunia usaha dan dunia industri (DUDI).</li><li>Mengembangkan keterampilan peserta didik dalam bidang teknologi dan informasi.</li><li>Menumbuhkan jiwa wirausaha yang mandiri and inovatif.</li><li>Menciptakan lingkungan belajar yang kondusif, aman, and nyaman.</li><li>Menjalin kerjasama yang baik dengan dunia usaha dan dunia industri.</li><li>Mengembangkan potensi peserta didik melalui kegiatan ekstrakurikuler.</li></ol><h2>Tujuan</h2><ol><li>Menghasilkan lulusan yang kompeten dan siap kerja.</li><li>Menghasilkan lulusan yang mampu berwirausaha.</li><li>Menghasilkan lulusan yang dapat melanjutkan ke perguruan tinggi.</li><li>Meningkatkan kualitas sumber daya manusia yang profesional.</li></ol><h2>Motto</h2><p><strong>"Pilihan Yang Tepat Di Sekolah Yang Berkualitas"</strong></p>', 'order' => 3],
        ];

        foreach ($pages as $page) {
            Page::updateOrCreate(['slug' => $page['slug']], array_merge($page, ['is_active' => true]));
        }

        // Extracurriculars
        $extracurriculars = [
            ['name' => 'Pramuka', 'slug' => 'pramuka', 'icon' => 'extracurriculars/icons/01KD3D4NSPP278ZE2SSHCD88V9.jpg', 'image' => 'extracurriculars/01KD3D4NV7GS1HYGBDDR77NQQE.jpg', 'short_description' => 'Kegiatan kepramukaan untuk membentuk karakter dan kepemimpinan siswa.', 'schedule' => 'Sabtu, 13:00-15:00'],
            ['name' => 'Basket', 'slug' => 'basket', 'short_description' => 'Olahraga basket untuk mengembangkan kerjasama tim dan kebugaran.', 'schedule' => 'Selasa & Kamis, 15:00-17:00'],
            ['name' => 'Futsal', 'slug' => 'futsal', 'short_description' => 'Olahraga futsal untuk mengasah kemampuan bermain bola.', 'schedule' => 'Senin & Rabu, 15:00-17:00'],
            ['name' => 'Rohani Islam', 'slug' => 'rohis', 'short_description' => 'Kegiatan keagamaan untuk memperdalam ilmu agama Islam.', 'schedule' => 'Jumat, 11:00-12:00'],
            ['name' => 'Paduan Suara', 'slug' => 'paduan-suara', 'short_description' => 'Pengembangan bakat menyanyi dan seni musik vokal.', 'schedule' => 'Rabu, 15:00-17:00'],
            ['name' => 'English Club', 'slug' => 'english-club', 'short_description' => 'Klub bahasa Inggris untuk meningkatkan kemampuan berbahasa.', 'schedule' => 'Kamis, 15:00-17:00'],
        ];

        foreach ($extracurriculars as $index => $ekskul) {
            Extracurricular::updateOrCreate(
                ['slug' => $ekskul['slug']],
                array_merge($ekskul, ['order' => $index + 1, 'is_active' => true])
            );
        }

        // Achievements
        $achievements = [
            ['title' => 'Juara 1 Lomba Kompetensi Siswa Tingkat Provinsi', 'student_name' => 'Ahmad Rizky', 'level' => 'Provinsi', 'rank' => 'Juara 1', 'year' => '2024', 'order' => 2],
            ['title' => 'Juara 2 Olimpiade Matematika', 'student_name' => 'Siti Aisyah', 'level' => 'Kota/Kabupaten', 'rank' => 'Juara 2', 'year' => '2024', 'order' => 1, 'image' => 'achievements/01KEJ6Q3KGREA3RK76R6MZ4AA1.jpg'],
            ['title' => 'Best Innovation Award - IT Competition', 'student_name' => 'Budi Santoso', 'level' => 'Nasional', 'rank' => 'Best Innovation', 'year' => '2023', 'order' => 3],
        ];

        foreach ($achievements as $achievement) {
            Achievement::updateOrCreate(
                ['slug' => Str::slug($achievement['title'])],
                array_merge($achievement, ['is_active' => true])
            );
        }

        // Awards
        $awards = [
            ['title' => 'Sekolah Adiwiyata', 'year' => '2023', 'organizer' => 'Kementerian Lingkungan Hidup'],
            ['title' => 'Akreditasi A', 'year' => '2022', 'organizer' => 'BAN-S/M', 'image' => 'awards/01KEFCMZKJGDG44RB29C1H9RXW.webp'],
            ['title' => 'Sekolah Sehat', 'year' => '2023', 'organizer' => 'Kemenkes RI'],
            ['title' => 'Sekolah Ramah Anak', 'year' => '2024', 'organizer' => 'KPAI'],
        ];

        foreach ($awards as $index => $award) {
            Award::updateOrCreate(
                ['title' => $award['title']],
                array_merge($award, ['order' => $index + 1, 'is_active' => true])
            );
        }

        // News
        $newsItems = [
            ['title' => 'Wisuda Angkatan ke-20 SMK YAJ', 'slug' => 'wisuda-angkatan-ke-20-smk-yaj', 'excerpt' => 'SMK YAJ sukses menggelar wisuda angkatan ke-20 dengan meluluskan 350 siswa yang siap terjun ke dunia kerja.', 'content' => '<p>Pada hari Sabtu, 15 Desember 2024, SMK YAJ menggelar acara wisuda untuk angkatan ke-20.</p>', 'category' => 'Kegiatan', 'is_featured' => true, 'published_at' => '2025-12-20T14:12:57'],
            ['title' => 'Kunjungan Industri ke PT Telkom Indonesia', 'slug' => 'kunjungan-industri-ke-pt-telkom', 'excerpt' => 'Siswa jurusan TJKT melakukan kunjungan industri ke PT Telkom Indonesia.', 'content' => '<p>Dalam rangka meningkatkan wawasan siswa tentang dunia industri, SMK YAJ mengadakan kunjungan industri ke PT Telkom Indonesia.</p>', 'category' => 'Kunjungan', 'is_featured' => false, 'published_at' => '2025-12-17T14:12:57'],
            ['title' => 'Workshop Design Thinking untuk Siswa', 'slug' => 'workshop-design-thinking', 'excerpt' => 'Workshop design thinking diadakan untuk meningkatkan kreativitas siswa.', 'content' => '<p>SMK YAJ bekerja sama dengan startup lokal mengadakan workshop design thinking.</p>', 'category' => 'Workshop', 'is_featured' => false, 'published_at' => '2025-12-13T14:12:57'],
            ['title' => 'Pembukaan Pendaftaran PPDB 2025/2026', 'slug' => 'pembukaan-ppdb-2025-2026', 'excerpt' => 'PPDB SMK YAJ tahun ajaran 2025/2026 resmi dibuka!', 'content' => '<p>Pendaftaran Peserta Didik Baru (PPDB) SMK YAJ untuk tahun ajaran 2025/2026 telah resmi dibuka.</p>', 'category' => 'Pengumuman', 'is_featured' => true, 'published_at' => '2025-12-19T14:12:57'],
            ['title' => 'Siswa PPLG Meraih Juara 1 LKS Nasional', 'slug' => 'pplg-juara-1-lks-nasional', 'excerpt' => 'Prestasi membanggakan kembali diraih oleh siswa SMK YAJ dibidang pengembangan perangkat lunak.', 'content' => '<p>Selamat kepada tim PPLG yang berhasil membawa pulang medali emas di ajang LKS Tingkat Nasional tahun ini.</p>', 'category' => 'Prestasi', 'is_featured' => true, 'published_at' => '2026-01-04T20:00:22', 'image' => 'news/01KEJ6M212V4WQ664FEECN65PY.jpg'],
            ['title' => 'Seminar Membangun Startup Digital', 'slug' => 'seminar-startup-digital', 'excerpt' => 'Menghadirkan pembicara dari Silicon Valley untuk memberikan motivasi kepada para siswa.', 'content' => '<p>Dunia digital terus berkembang, siswa SMK YAJ diajak untuk mulai membangun ide-ide kreatif menjadi bisnis nyata.</p>', 'category' => 'Workshop', 'is_featured' => false, 'published_at' => '2025-12-30T20:00:22'],
            ['title' => 'Bakti Sosial OSIS SMK YAJ 2025', 'slug' => 'bakti-sosial-osis-2025', 'excerpt' => 'Kegiatan rutin tahunan OSIS untuk membantu masyarakat di sekitar lingkungan sekolah.', 'content' => '<p>OSIS SMK YAJ menyalurkan bantuan berupa sembako dan paket pendidikan kepada keluarga yang membutuhkan.</p>', 'category' => 'Kegiatan', 'is_featured' => false, 'published_at' => '2025-12-25T20:00:22'],
        ];

        foreach ($newsItems as $item) {
            News::updateOrCreate(
                ['slug' => $item['slug']],
                array_merge($item, ['author' => 'Admin', 'views' => rand(50, 500), 'is_active' => true])
            );
        }

        // Teachers
        $teachers = [
            ['name' => 'Jarot Sitomang', 'nip' => '098765432', 'email' => 'jarot@gmail.com', 'position' => 'Guru', 'subject' => 'Bahasa Inggris', 'bio' => 'Pengajar Bahasa Inggris dengan pengalaman lebih dari 10 tahun.', 'phone' => '08123456789'],
            ['name' => 'Siti Aminah, M.Pd.', 'nip' => '198506122010012001', 'email' => 'siti.aminah@sekolah.id', 'position' => 'Guru', 'subject' => 'Matematika', 'bio' => 'Berkomitmen menciptakan suasana belajar matematika yang menyenangkan.', 'phone' => '081222233344'],
            ['name' => 'Budi Santoso, S.Kom.', 'nip' => '199008242015031002', 'email' => 'budi.santoso@sekolah.id', 'position' => 'Ketua Program Keahlian TJKT', 'subject' => 'Teknologi Jaringan', 'bio' => 'Ahli dalam infrastruktur jaringan dan keamanan siber.', 'phone' => '081333444555'],
            ['name' => 'Rina Wijaya, S.T.', 'nip' => '199211052018012003', 'email' => 'rina.wijaya@sekolah.id', 'position' => 'Guru', 'subject' => 'Pemrograman Web', 'bio' => 'Instruktur Full-stack Developer bersertifikasi.', 'phone' => '081444555666'],
            ['name' => 'Agus Setiawan, S.Pd.', 'nip' => '198004122005011004', 'email' => 'agus.setiawan@sekolah.id', 'position' => 'Wakasek Kesiswaan', 'subject' => 'Pendidikan Jasmani', 'bio' => 'Membangun disiplin dan karakter melalui olahraga.', 'phone' => '081555666777'],
            ['name' => 'Maya Indah, S.Par.', 'nip' => '199503182020012005', 'email' => 'maya.indah@sekolah.id', 'position' => 'Guru', 'subject' => 'Food & Beverage Service', 'bio' => 'Berpengalaman di hotel berbintang mancanegara.', 'phone' => '081666777888'],
        ];

        foreach ($teachers as $index => $teacher) {
            Teacher::updateOrCreate(
                ['email' => $teacher['email']],
                array_merge($teacher, ['order' => $index + 1, 'is_active' => true])
            );
        }

        // Staff
        $staffMembers = [
            ['name' => 'Andi Pratama', 'position' => 'Kepala Tata Usaha'],
            ['name' => 'Eka Sari, A.Md.', 'position' => 'Bendahara Sekolah'],
            ['name' => 'Dedi Kurnia', 'position' => 'Staff IT & Laboran'],
            ['name' => 'Siska Amelia', 'position' => 'Staff Perpustakaan'],
        ];

        foreach ($staffMembers as $index => $staff) {
            Staff::updateOrCreate(
                ['name' => $staff['name']],
                array_merge($staff, ['order' => $index + 1, 'is_active' => true])
            );
        }

        // Business Centers
        $bcData = [
            ['name' => 'Unit Produksi', 'slug' => 'unit-produksiP', 'image' => 'business-centers/01KEJ67V97277PD9TPPZN1YG80.jpg', 'short_description' => 'Pusat layanan jasa dan produksi karya siswa berkualitas tinggi.', 'description' => '<p>Pusat layanan profesional dari berbagai jurusan yang ada di SMK YAJ.</p>', 'location' => 'Gedung A, Lantai 1', 'phone' => '080870066'],
            ['name' => 'YAJ Mart', 'slug' => 'yaj-mart', 'short_description' => 'Mini market sekolah yang menyediakan kebutuhan harian siswa dan warga sekitar.', 'description' => '<p>Tempat belanja nyaman dengan harga kompetitif untuk mendukung ekonomi kreatif sekolah.</p>', 'location' => 'Pintu Gerbang Utama', 'phone' => '081122334455'],
            ['name' => 'YAJ Cafe & Bakery', 'slug' => 'yaj-cafe-bakery', 'short_description' => 'Menyediakan aneka roti dan minuman racikan siswa jurusan Perhotelan.', 'description' => '<p>Nikmati hidangan lezat dengan standar hotel yang dikelola langsung oleh siswa kami.</p>', 'location' => 'Area Kantin Sehat', 'phone' => '081122334466'],
        ];

        foreach ($bcData as $index => $bc) {
            BusinessCenter::updateOrCreate(
                ['slug' => $bc['slug']],
                array_merge($bc, ['order' => $index + 1, 'is_active' => true])
            );
        }

        // Galleries
        $galleries = [
            ['title' => 'Juara 1 Panjat pinang', 'slug' => 'juara-1-panjat-pinangjuara', 'type' => 'photo', 'image' => 'gallery/01KEJ6TZ3VZTHN7V3CVN50M6HC.jpg', 'description' => 'Bang mesii juara panjat pinang se kota Depok', 'category' => 'Prestasi'],
        ];

        foreach ($galleries as $gallery) {
            Gallery::updateOrCreate(
                ['slug' => $gallery['slug']],
                array_merge($gallery, ['order' => 1, 'is_active' => true])
            );
        }
    }
}

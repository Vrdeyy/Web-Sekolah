# 🏫 SMK YAJ - Website Sekolah

Website profil sekolah modern untuk **SMK YAJ (Yayasan Ar-Ridho Jatimulya)** yang dibangun dengan Laravel dan Filament Admin Panel.

![Laravel](https://img.shields.io/badge/Laravel-v12.x-FF2D20?style=flat-square&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-v8.2+-777BB4?style=flat-square&logo=php)
![Filament](https://img.shields.io/badge/Filament-v3.3-F59E0B?style=flat-square)
![TailwindCSS](https://img.shields.io/badge/TailwindCSS-v4.0-4f2744?style=flat-square&logo=tailwindcss)
![Theme](https://img.shields.io/badge/Theme-Premium_Dark_Purple-4f2744?style=flat-square)

---

## 📋 Daftar Isi

- [Fitur](#-fitur)
- [Teknologi yang Digunakan](#-teknologi-yang-digunakan)
- [Persyaratan Sistem](#-persyaratan-sistem)
- [Instalasi](#-instalasi)
- [Konfigurasi](#-konfigurasi)
- [Menjalankan Aplikasi](#-menjalankan-aplikasi)
- [Struktur Database](#-struktur-database)
- [Admin Panel](#-admin-panel)
- [Halaman Frontend](#-halaman-frontend)
- [Screenshot](#-screenshot)
- [Kontribusi](#-kontribusi)
- [Lisensi](#-lisensi)

---

## ✨ Fitur

### 🎯 Frontend (Website Publik)
- **Hero Section Premium** - Landing page dengan "Breakthrough Dynamic Collage", animasi floating, glassmorphism, dan integrasi pengaturan admin
- **Branding Dark Purple** - Identitas visual baru yang mewah menggunakan palet `#4f2744` (Primary) dan `#3a1c32` (Secondary)
- **Awards Section Elite** - Desain kartu penghargaan dengan efek glow, golden accents, dan micro-animations
- **Pusat Bisnis (Rebranded)** - Unit usaha dengan desain grid modern dan keunggulan layanan beraksen gradasi brand
- **Halaman Kontak UI/UX** - Sidebar kontak terintegrasi dengan style kartu yang sinkron dan hover effects premium
- **Profil Sekolah** - Informasi Yayasan, Sekolah, Visi & Misi yang dioptimasi untuk readability
- **Program Keahlian (Jurusan)** - Detail jurusan dengan layout modern
- **Berita & Artikel** - Sistem berita dinamis dengan hover effects khusus
- **Prestasi Siswa** - Showcase prestasi dengan tipografi yang kuat
- **Ekstrakurikuler** - Informasi kegiatan dengan visual yang bersih
- **Galeri** - Foto dan video kegiatan dengan lightbox terintegrasi
- **Daftar Guru & Staff** - Profil tenaga pengajar dengan card lift effects
- **Integrasi PPDB** - Link pendaftaran otomatis via admin settings

### 🔐 Admin Panel (Filament)
- Dashboard modern dan responsif
- Manajemen Konten (CRUD):
  - Berita & Artikel
  - Program Keahlian
  - Prestasi & Penghargaan
  - Ekstrakurikuler
  - Galeri Foto & Video
  - Guru & Staff
  - Pusat Bisnis
  - Halaman Statis
  - Slider Homepage
  - Pengaturan Website
  - Social Media Links
  - Pesan Kepala Sekolah

---

## 🛠 Teknologi yang Digunakan

### Backend
| Teknologi | Versi | Keterangan |
|-----------|-------|------------|
| **PHP** | ^8.3 | Bahasa pemrograman server-side |
| **Laravel** | ^12.0 | Framework PHP modern |
| **Filament** | 3.3 | Admin panel berbasis Livewire |
| **Laravel Tinker** | ^2.10 | REPL untuk Laravel |

### Frontend
| Teknologi | Versi | Keterangan |
|-----------|-------|------------|
| **Tailwind CSS** | ^4.0 | Utility-first CSS framework |
| **Vite** | ^7.0 | Build tool modern untuk frontend |
| **Axios** | ^1.11 | HTTP client untuk JavaScript |
| **Font Awesome** | 6.x | Icon library (via CDN) |
| **Google Fonts** | - | Outfit, Poppins fonts |

### Development Tools
| Tool | Versi | Keterangan |
|------|-------|------------|
| **Laravel Pint** | ^1.24 | Code style fixer untuk PHP |
| **Pest PHP** | ^4.2 | Testing framework |
| **Faker PHP** | ^1.23 | Generate data dummy |
| **Laravel Sail** | ^1.41 | Docker development environment |
| **Laravel Pail** | ^1.2 | Real-time log viewer |

### Database
- **MySQL** / **MariaDB** (Recommended)
- **SQLite** (Development)
- **PostgreSQL** (Optional)

---

## 💻 Persyaratan Sistem

### Minimum Requirements
- PHP >= 8.2
- Composer >= 2.0
- Node.js >= 18.x
- NPM >= 9.x atau Yarn
- MySQL >= 5.7 / MariaDB >= 10.3

### PHP Extensions yang Diperlukan
```
- BCMath PHP Extension
- Ctype PHP Extension
- Fileinfo PHP Extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- GD PHP Extension (untuk image processing)
```

### Rekomendasi Local Server
- **Laragon** (Windows) ✅ Recommended
- **XAMPP** (Cross-platform)
- **Laravel Herd** (macOS/Windows)
- **Docker** dengan Laravel Sail

---

## 🚀 Instalasi

### Langkah 1: Clone Repository

```bash
git clone https://github.com/your-username/web-yaj.git
cd web-yaj
```

### Langkah 2: Install Dependencies

```bash
# Install PHP dependencies
composer install

# Install Node.js dependencies
npm install
```

### Langkah 3: Setup Environment

```bash
# Copy file environment
cp .env.example .env

# Generate application key
php artisan key:generate
```

### Langkah 4: Konfigurasi Database

Edit file `.env` dan sesuaikan dengan konfigurasi database Anda:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=web_yaj
DB_USERNAME=root
DB_PASSWORD=
```

### Langkah 5: Menjalankan Migrasi & Seeder

```bash
# Jalankan migrasi database
php artisan migrate

# Jalankan seeder untuk data awal
php artisan db:seed

# Atau jalankan keduanya sekaligus
php artisan migrate --seed
```

### Langkah 6: Storage Link

```bash
# Buat symbolic link untuk storage
php artisan storage:link
```

### Langkah 7: Build Assets

```bash
# Development
npm run dev

# Production
npm run build
```

### Langkah 8: Publish Filament Assets

```bash
php artisan filament:assets
```

---

## ⚙️ Konfigurasi

### File `.env` Penting

```env
# Application
APP_NAME="SMK YAJ"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost

# Database
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=web_yaj
DB_USERNAME=root
DB_PASSWORD=

# Mail (Optional - untuk contact form)
MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null

# Filesystem
FILESYSTEM_DISK=public
```

### Konfigurasi Filament

Lokasi: `app/Providers/Filament/AdminPanelProvider.php`

```php
->path('admin')                    // URL admin panel
->login()                          // Aktifkan login
->brandName('SMK Admin Panel')     // Nama brand
->colors([                         // Warna tema (Brand Rebrand)
    'primary' => '#4f2744',
])
->spa()                            // Single Page Application mode
```

---

## ▶️ Menjalankan Aplikasi

### Development Mode

**Opsi 1: Menggunakan script composer (Recommended)**
```bash
composer run dev
```
> Ini akan menjalankan Laravel server, queue listener, dan Vite secara bersamaan.

**Opsi 2: Manual (Terminal terpisah)**
```bash
# Terminal 1: Laravel Server
php artisan serve

# Terminal 2: Vite (Hot Reload)
npm run dev
```

### Production Mode

```bash
# Build assets untuk production
npm run build

# Cache configuration
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize
```

### Akses Aplikasi

| Halaman | URL |
|---------|-----|
| **Homepage** | `http://localhost:8000/` |
| **Admin Panel** | `http://localhost:8000/admin` |
| **Berita** | `http://localhost:8000/berita` |
| **Jurusan** | `http://localhost:8000/jurusan` |
| **Prestasi** | `http://localhost:8000/prestasi` |
| **Kontak** | `http://localhost:8000/kontak` |

---

## 📊 Struktur Database

### Models & Tabel

| Model | Tabel | Deskripsi |
|-------|-------|-----------|
| `Achievement` | `achievements` | Prestasi siswa |
| `Award` | `awards` | Penghargaan sekolah |
| `BusinessCenter` | `business_centers` | Unit usaha/Teaching Factory |
| `Extracurricular` | `extracurriculars` | Kegiatan ekstrakurikuler |
| `Gallery` | `galleries` | Galeri foto & video |
| `Major` | `majors` | Program keahlian/jurusan |
| `News` | `news` | Berita & artikel |
| `Page` | `pages` | Halaman statis (Yayasan, Visi Misi, dll) |
| `Partner` | `partners` | Mitra industri |
| `PrincipalMessage` | `principal_messages` | Sambutan kepala sekolah |
| `Setting` | `settings` | Pengaturan website |
| `Slider` | `sliders` | Banner/slider homepage |
| `SocialLink` | `social_links` | Link media sosial |
| `Staff` | `staff` | Tenaga kependidikan |
| `Statistic` | `statistics` | Statistik homepage |
| `Teacher` | `teachers` | Data guru |
| `User` | `users` | Pengguna admin |

### Reset Database

```bash
# Fresh migration dengan seeder
php artisan migrate:fresh --seed
```

---

## 👩‍💼 Admin Panel

### Login Admin

- **URL**: `/admin`
- **Email**: `admin@sekolah.id`
- **Password**: `admin123`

> ⚠️ **Penting**: Ubah password default setelah instalasi!

### Membuat User Admin Baru

```bash
php artisan make:filament-user
```

### Fitur Admin Panel

1. **Dashboard** - Overview statistik website
2. **Manajemen Konten** - CRUD untuk semua data
3. **Media Library** - Upload dan kelola gambar/video
4. **Pengaturan** - Konfigurasi website

---

## 📄 Halaman Frontend

### Routes Tersedia

```php
// Homepage
GET /                           → home

// Halaman Statis
GET /halaman/{slug}             → page

// Akademik
GET /jurusan                    → majors
GET /jurusan/{slug}             → major.show
GET /ekstrakurikuler            → extracurriculars
GET /prestasi                   → achievements

// Direktori
GET /daftar-guru                → teachers
GET /daftar-staff               → staff
GET /business-center            → business-centers

// Galeri
GET /foto-sekolah               → gallery.photos
GET /video-sekolah              → gallery.videos

// Berita
GET /berita                     → news
GET /berita/{slug}              → news.show

// Kontak
GET /kontak                     → contact
```

---

## 📸 Screenshot

### Homepage
![Homepage](/docs/screenshots/homepage.png)

### Admin Dashboard
![Admin](/docs/screenshots/admin.png)

### Halaman Berita
![News](/docs/screenshots/news.png)

---

## 🔧 Troubleshooting

### Error: "Route not defined"
```bash
php artisan route:clear
php artisan cache:clear
```

### Error: "Storage link not found"
```bash
php artisan storage:link
```

### Error: Filament assets not loading
```bash
php artisan filament:assets
php artisan optimize:clear
```

### Error: "Permission denied" pada storage
```bash
# Linux/Mac
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache

# Windows (Laragon)
# Pastikan folder storage dan bootstrap/cache memiliki permission write
```

### Clear All Cache
```bash
php artisan optimize:clear
```

---

## 📁 Struktur Folder

```
web-yaj/
├── app/
│   ├── Filament/          # Admin panel resources
│   │   └── Resources/     # CRUD resources
│   ├── Http/
│   │   └── Controllers/   # Controllers
│   │       └── WebController.php
│   ├── Models/            # Eloquent Models
│   └── Providers/         # Service Providers
├── config/                # Configuration files
├── database/
│   ├── migrations/        # Database migrations
│   └── seeders/           # Database seeders
├── public/                # Public assets
│   └── storage/           # Uploaded files (symlink)
├── resources/
│   ├── css/               # CSS files
│   ├── js/                # JavaScript files
│   └── views/             # Blade templates
│       ├── layouts/       # Layout templates
│       ├── pages/         # Page templates
│       └── partials/      # Partial components
├── routes/
│   └── web.php            # Web routes
├── storage/               # File storage
├── .env                   # Environment variables
├── composer.json          # PHP dependencies
├── package.json           # Node.js dependencies
└── vite.config.js         # Vite configuration
```

---

## 🤝 Kontribusi

Kontribusi sangat diterima! Silakan ikuti langkah berikut:

1. Fork repository ini
2. Buat branch fitur (`git checkout -b feature/AmazingFeature`)
3. Commit perubahan (`git commit -m 'Add some AmazingFeature'`)
4. Push ke branch (`git push origin feature/AmazingFeature`)
5. Buat Pull Request

---

## 📝 Changelog

### v1.2.0 (2026-01-05) - The Responsive Refinement
- 🚀 **Dynamic Logo Management**: Integrasi logo sekolah yang dapat diatur sepenuhnya via Admin Panel (Header, Footer, & Mobile Menu).
- 🚀 **Mobile Hero Optimization**: Tuning khusus untuk layout hero di HP dan Tablet (Centered text, background glow, & responsive spacing).
- 🚀 **Awards Data Enhancement**: Penambahan field "Tahun" dan "Penyelenggara" pada kartu penghargaan yang tersinkronisasi dengan database.
- 🚀 **Admin Filter UX**: Perbaikan pada dropbox filter grup pengaturan agar lebih dinamis dan mampu memuat seluruh data kunci secara real-time.
- 🚀 **Pagination Upgrade**: Penambahan fitur "View All" pada daftar kunci admin untuk navigasi pengaturan yang lebih mudah.

### v1.1.0 (2026-01-04) - The Premium Redesign
- 🚀 **Full Rebranding**: Migrasi total ke tema "Premium Dark Purple" (#4f2744 & #3a1c32).
- 🚀 **Hero Section 2.0**: Implementasi "Dynamic Educational Collage" dengan floating symbols.
- 🚀 **UI Modernization**: Perombakan total pada halaman Business Centers, Contact, dan Related Links.
- 🚀 **Enhanced Effects**: Penambahan glassmorphism shines, shadow-3xl, dan high-premium animations.
- 🚀 **Admin UX**: Integrasi "Pengaturan Website" yang lebih dalam untuk kustomisasi hero & stats secara real-time.

### v1.0.0 (2024-12-19)
- ✅ Initial release dengan desain modern
- ✅ Admin panel dengan Filament 3.3
- ✅ Manajemen konten lengkap
- ✅ Responsive design

---

## 📜 Lisensi

Proyek ini dilisensikan di bawah [MIT License](LICENSE).

---

## 👨‍💻 Developer

Dikembangkan oleh IT Team SMK YAJ © 2026

---


# 🏫 SMK YAJ - Website Sekolah Premium

Website profil sekolah modern dan futuristik untuk **SMK YAJ**, dibangun dengan teknologi terbaru Laravel 12, Filament v3, dan desain **Premium Dark Purple Glassmorphism**.

![Laravel](https://img.shields.io/badge/Laravel-v12.x-FF2D20?style=flat-square&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-v8.3+-777BB4?style=flat-square&logo=php)
![Filament](https://img.shields.io/badge/Filament-v3.3-F59E0B?style=flat-square)
![TailwindCSS](https://img.shields.io/badge/TailwindCSS-v4.0-4f2744?style=flat-square&logo=tailwindcss)
![License](https://img.shields.io/badge/License-Education_Use_Only-critical?style=flat-square)

---

## ✨ Fitur Utama
- **Custom SEO Manager**: Meta tags, OpenGraph, dan Twitter cards dinamis per halaman.
- **Filament Admin Panel**: Manajemen konten (CMS) yang user-friendly dan responsif.
- **Premium UI/UX**: Animasi modern, Glassmorphism, dan tema warna eksklusif.
- **Smart Seeder**: Deploy project langsung dengan data nyata & dummy yang rapi.
- **Responsive Management**: Pengaturan Logo, PPDB, dan Kontak langsung dari Admin.

---

## 🛠 Persyaratan Sistem
Sebelum memulai, pastikan sistem Anda memenuhi kriteria berikut:
- **PHP**: Berversi 8.3 atau lebih tinggi.
- **Database**: MySQL 5.7+ atau MariaDB 10.3+.
- **Dependency Manager**: Composer 2.x & Node.js 18+ (dengan NPM/Yarn).
- **Web Server**: Laragon (Sangat Disarankan), XAMPP, atau Apache/Nginx.
- **Extensions PHP**: `bcmath`, `ctype`, `fileinfo`, `gd`, `json`, `mbstring`, `openssl`, `pdo`, `tokenizer`, `xml`.

---

## 🚀 Panduan Instalasi Lengkap

Ikuti langkah-langkah di bawah ini secara urut untuk hasil yang sempurna:

### 1. Persiapan Folder & Repo
```bash
# Download source code
git clone https://github.com/Vrdeyy/web-sekolah.git
cd web-sekolah
```

### 2. Instalasi Library (Backend & Frontend)
```bash
# Menginstall library PHP via Composer
composer install

# Menginstall library JavaScript via NPM
npm install
```

### 3. Konfigurasi Environment (`.env`)
1. Salin file `.env.example` menjadi `.env`:
   ```bash
   cp .env.example .env
   ```
2. Buka file `.env` dan sesuaikan pengaturan database Anda:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=web_sekolah
   DB_USERNAME=root
   DB_PASSWORD=
   ```
3. Generate kunci aplikasi:
   ```bash
   php artisan key:generate
   ```

### 4. Setup Database & Data Awal
Gunakan perintah ini untuk membuat tabel dan memasukkan data (termasuk setting logo, berita, dan guru):
```bash
# Menghapus tabel lama & membuat baru dengan data seeder
php artisan migrate:fresh --seed
```

### 5. Konfigurasi Media (Langkah Wajib!) 📸
Jalankan perintah ini di terminal (Terminal/Git Bash) untuk menyiapkan folder gambar:

```bash
# Salin & Tempel perintah ini sekaligus:
mkdir -p storage/app/public/settings storage/app/public/sliders storage/app/public/news storage/app/public/majors storage/app/public/awards storage/app/public/extracurriculars storage/app/public/business-centers storage/app/public/gallery/photos storage/app/public/gallery/videos && php artisan storage:link
```
*(Setelah folder terbuat, silakan masukkan file gambar asli yang diberikan pengembang ke dalam folder `storage/app/public` tersebut)*

### 6. Menjalankan Aplikasi
Terakhir, jalankan perintah ini untuk memulai:
```bash
# Install assets dan jalankan server
npm run build && php artisan serve
```
Atau jika ingin sambil mengedit (Hot Reload):
```bash
npm run dev
```
Website Anda sekarang dapat diakses di: `http://localhost:8000`

---

## 🔐 Akses Admin Panel
Kelola seluruh konten website melalui dashboard admin:
- **URL**: `http://localhost:8000/admin`
- **Email**: `admin@sekolah.id`
- **Password**: `admin123`

---

## � Perintah Maintenance Berguna
Jika Anda melakukan perubahan besar, gunakan perintah ini untuk membersihkan cache:
```bash
# Membersihkan semua cache (Route, Config, View)
php artisan optimize:clear

# Mengupdate asset Filament
php artisan filament:assets
```

---

## 📂 Struktur Penting
- `app/Http/Controllers/WebController.php` - Logika tampilan website.
- `app/Services/SEOManager.php` - Pengaturan SEO otomatis.
- `database/seeders/DatabaseSeeder.php` - Sumber data katalog/seeding.
- `resources/views/` - Folder file tampilan (Blade).

---

## 📝 Changelog
- **v1.3.0**: Integrasi SEO Manager, Update Seeder (Data Real + Dummy Premium), dan Ekspansi Unit Bisnis.
- **v1.2.0**: Optimasi Logo Manajemen & Responsive Hero Segments.

---

## � Lisensi & Hak Cipta

Project ini dibuat khusus sebagai media informasi resmi **SMK YAJ**.

- **Penggunaan Untuk Belajar**: Diperbolehkan sepenuhnya (Open Source for learning). Silakan dipelajari, dan digunakan untuk referensi koding.
- **Penggunaan Komersial/Publik**: **DILARANG KERAS** menggunakan, menyebarluaskan, atau mengatasnamakan project ini untuk kepentingan komersial atau dipublikasikan sebagai website sekolah lain tanpa izin tertulis dari **IT Team SMK YAJ**.

---

## �👨‍💻 Developer
Dikembangkan oleh **IT Team SMK YAJ** - *longor & berkualitas*.

© 2026 IT Team SMK YAJ. Seluruh Hak Cipta Dilindungi.

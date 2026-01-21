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

| Komponen | Versi Minimum | Rekomendasi |
|----------|---------------|-------------|
| **PHP** | 8.2+ | 8.3+ |
| **Composer** | 2.x | 2.7+ |
| **Node.js** | 18+ | 20+ LTS |
| **NPM** | 9+ | 10+ |
| **MySQL** | 5.7+ | 8.0+ |
| **MariaDB** | 10.3+ | 10.11+ |

### Extensions PHP yang Diperlukan:
```
bcmath, ctype, curl, dom, fileinfo, gd, json, mbstring, openssl, pdo, pdo_mysql, tokenizer, xml, zip
```

### Web Server yang Didukung:
- ✅ **Laragon** (Sangat Disarankan untuk Windows)
- ✅ XAMPP
- ✅ MAMP
- ✅ Apache/Nginx (Linux/Mac)

---

## 🚀 Panduan Instalasi Lengkap (Step-by-Step)

> ⚠️ **PENTING**: Ikuti setiap langkah secara berurutan. Jangan lewati satupun!

---

### 📥 LANGKAH 1: Clone Repository

Buka terminal/command prompt dan jalankan:

**Windows (Command Prompt):**
```cmd
cd C:\laragon\www
git clone https://github.com/Vrdeyy/web-sekolah.git
cd web-sekolah
```

**Windows (PowerShell):**
```powershell
cd C:\laragon\www
git clone https://github.com/Vrdeyy/web-sekolah.git
cd web-sekolah
```

**Linux/Mac:**
```bash
cd /var/www/html
git clone https://github.com/Vrdeyy/web-sekolah.git
cd web-sekolah
```

---

### 📦 LANGKAH 2: Install Dependencies

#### 2a. Install PHP Dependencies (Composer)
```bash
composer install
```

> ⏳ Tunggu hingga selesai. Jika ada error, pastikan PHP dan Composer sudah terinstall dengan benar.

#### 2b. Install JavaScript Dependencies (NPM)
```bash
npm install
```

> ⏳ Proses ini membutuhkan waktu beberapa menit tergantung koneksi internet.

---

### ⚙️ LANGKAH 3: Konfigurasi Environment

#### 3a. Salin File Environment

**Windows (Command Prompt):**
```cmd
copy .env.example .env
```

**Linux/Mac/PowerShell:**
```bash
cp .env.example .env
```

#### 3b. Edit File `.env`

Buka file `.env` dengan text editor (VS Code, Notepad++, dll) dan sesuaikan konfigurasi berikut:

```env
# ═══════════════════════════════════════════════════════════
# KONFIGURASI APLIKASI
# ═══════════════════════════════════════════════════════════
APP_NAME="SMK YAJ"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000

# ═══════════════════════════════════════════════════════════
# KONFIGURASI DATABASE (SESUAIKAN DENGAN SETUP ANDA!)
# ═══════════════════════════════════════════════════════════
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=web_sekolah
DB_USERNAME=root
DB_PASSWORD=
```

> 💡 **Tips**: 
> - Untuk Laragon, biasanya `DB_PASSWORD` dikosongkan
> - Untuk XAMPP, biasanya `DB_PASSWORD` dikosongkan
> - Pastikan nama database `web_sekolah` sudah dibuat di phpMyAdmin

#### 3c. Generate Application Key

```bash
php artisan key:generate
```

> ✅ Anda akan melihat pesan: `Application key set successfully.`

---

### 🗄️ LANGKAH 4: Setup Database

#### 4a. Buat Database Baru

1. Buka **phpMyAdmin** di browser: `http://localhost/phpmyadmin`
2. Klik **"New"** atau **"Baru"** di sidebar kiri
3. Masukkan nama database: `web_sekolah`
4. Pilih Collation: `utf8mb4_unicode_ci`
5. Klik **"Create"** atau **"Buat"**

#### 4b. Jalankan Migration & Seeder

```bash
php artisan migrate:fresh --seed
```

> ⏳ Tunggu hingga semua tabel dan data seeder berhasil dibuat.
> 
> ✅ Anda akan melihat output seperti:
> ```
> Dropping all tables ...................... DONE
> Running migrations ....................... DONE
> Seeding database ......................... DONE
> ```

---

### 🔗 LANGKAH 5: Buat Storage Link (WAJIB!)

Perintah ini menghubungkan folder `storage/app/public` ke `public/storage` agar gambar bisa diakses:

```bash
php artisan storage:link
```

> ✅ Anda akan melihat: `The [public/storage] link has been connected to [storage/app/public].`

---

### 📁 LANGKAH 6: Buat Folder Penyimpanan Media

Jalankan perintah berikut untuk membuat struktur folder media:

**Windows (Command Prompt):**
```cmd
mkdir storage\app\public\settings
mkdir storage\app\public\sliders
mkdir storage\app\public\news
mkdir storage\app\public\majors
mkdir storage\app\public\awards
mkdir storage\app\public\achievements
mkdir storage\app\public\extracurriculars
mkdir storage\app\public\extracurriculars\icons
mkdir storage\app\public\business-centers
mkdir storage\app\public\gallery
mkdir storage\app\public\teachers
mkdir storage\app\public\staff
mkdir storage\app\public\partners
```

**Linux/Mac/Git Bash:**
```bash
mkdir -p storage/app/public/{settings,sliders,news,majors,awards,achievements,extracurriculars/icons,business-centers,gallery,teachers,staff,partners}
```

---

### 🏗️ LANGKAH 7: Build Assets Frontend

```bash
npm run build
```

> ⏳ Tunggu hingga proses build selesai.
> 
> ✅ Anda akan melihat output build manifest.

---

### 🚀 LANGKAH 8: Jalankan Aplikasi

#### Opsi A: Menggunakan PHP Built-in Server
```bash
php artisan serve
```
Akses di: `http://localhost:8000`

#### Opsi B: Menggunakan Laragon (Disarankan)
1. Pastikan folder project ada di `C:\laragon\www\web-sekolah`
2. Buka Laragon dan klik **"Start All"**
3. Akses di: `http://web-sekolah.test`

#### Opsi C: Development Mode (Hot Reload)
Buka 2 terminal secara bersamaan:

**Terminal 1:**
```bash
php artisan serve
```

**Terminal 2:**
```bash
npm run dev
```

---

## 🔐 Akses Admin Panel

Setelah instalasi selesai, Anda bisa mengakses admin panel:

| | |
|---|---|
| **URL** | `http://localhost:8000/admin` atau `http://web-sekolah.test/admin` |
| **Email** | `admin@sekolah.id` |
| **Password** | `admin123` |

> ⚠️ **PENTING**: Segera ganti password default setelah login pertama!

---

## 🖼️ Catatan Tentang Gambar

### Mengapa Gambar Tidak Muncul Setelah Clone?

Gambar **tidak termasuk** dalam repository Git karena:
1. File gambar berukuran besar dan tidak efisien untuk di-track Git
2. Folder `storage/app/public` tidak di-commit ke repository

### Solusi:

1. **Upload gambar baru** melalui Admin Panel, **ATAU**
2. **Minta file gambar** dari pengembang utama dan salin ke folder `storage/app/public/` sesuai struktur berikut:

```
storage/app/public/
├── settings/          # Logo sekolah
├── sliders/           # Gambar slider homepage
├── news/              # Gambar berita
├── majors/            # Gambar jurusan
├── awards/            # Gambar penghargaan
├── achievements/      # Gambar prestasi
├── extracurriculars/  # Gambar ekskul
│   └── icons/         # Icon ekskul
├── business-centers/  # Gambar unit bisnis
├── gallery/           # Galeri foto/video
├── teachers/          # Foto guru
├── staff/             # Foto staff
└── partners/          # Logo mitra
```

---

## 🧹 Perintah Maintenance

### Membersihkan Cache
```bash
php artisan optimize:clear
```

### Update Asset Filament
```bash
php artisan filament:assets
```

### Reset Database (Hati-hati! Data akan hilang)
```bash
php artisan migrate:fresh --seed
```

### Melihat Daftar Route
```bash
php artisan route:list
```

---

## 🐛 Troubleshooting (Masalah Umum)

### 1. Error: "SQLSTATE[HY000] [1049] Unknown database"
**Solusi**: Buat database `web_sekolah` di phpMyAdmin terlebih dahulu.

### 2. Error: "The stream or file could not be opened"
**Solusi**: Berikan permission pada folder storage:
```bash
# Linux/Mac
chmod -R 775 storage bootstrap/cache

# Windows (jalankan sebagai Administrator)
icacls storage /grant Everyone:F /T
icacls bootstrap\cache /grant Everyone:F /T
```

### 3. Gambar tidak muncul
**Solusi**: Jalankan `php artisan storage:link` dan pastikan folder ada.

### 4. Error saat npm install
**Solusi**: Hapus folder `node_modules` dan file `package-lock.json`, lalu install ulang:
```bash
# Windows
rmdir /s /q node_modules
del package-lock.json
npm install

# Linux/Mac
rm -rf node_modules package-lock.json
npm install
```

### 5. Halaman blank/error 500
**Solusi**: Cek log error di `storage/logs/laravel.log`

---

## 📂 Struktur Project

```
web-sekolah/
├── app/
│   ├── Filament/           # Admin Panel Resources
│   ├── Http/Controllers/   # Controller Website
│   ├── Models/             # Model Database
│   └── Services/           # Service Classes (SEO, dll)
├── database/
│   ├── migrations/         # File Migrasi Database
│   └── seeders/            # Data Seeder
├── public/
│   ├── build/              # Asset yang sudah di-compile
│   └── storage/            # Symlink ke storage/app/public
├── resources/
│   ├── css/                # File CSS
│   ├── js/                 # File JavaScript
│   └── views/              # Template Blade
├── storage/
│   └── app/public/         # File Upload (gambar, dll)
└── routes/
    └── web.php             # Definisi Route
```

---

## 📝 Changelog

| Versi | Tanggal | Perubahan |
|-------|---------|-----------|
| v1.3.0 | 2026-01-20 | Integrasi SEO Manager, Update Seeder Premium |
| v1.2.0 | 2026-01-15 | Optimasi Logo Management & Responsive Hero |
| v1.1.0 | 2026-01-10 | Penambahan fitur Extracurricular & Gallery |
| v1.0.0 | 2026-01-01 | Initial Release |

---

## 📜 Lisensi & Hak Cipta

Project ini dibuat khusus sebagai media informasi resmi **SMK YAJ**.

| Jenis Penggunaan | Status |
|------------------|--------|
| ✅ Belajar & Referensi | **Diperbolehkan** |
| ✅ Modifikasi untuk pembelajaran | **Diperbolehkan** |
| ❌ Penggunaan Komersial | **DILARANG** |
| ❌ Publikasi sebagai website sekolah lain | **DILARANG** |
| ❌ Redistribusi tanpa izin | **DILARANG** |

> ⚠️ Pelanggaran terhadap ketentuan di atas dapat dikenakan sanksi hukum sesuai dengan Undang-Undang Hak Cipta yang berlaku.

---

## 👨‍💻 Developer

Dikembangkan dengan ❤️ oleh **IT Team SMK YAJ**

© 2026 IT Team SMK YAJ. Seluruh Hak Cipta Dilindungi.

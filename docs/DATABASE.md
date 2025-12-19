# Database Schema Documentation

Dokumentasi lengkap struktur database website SMK YAJ.

---

## 📊 Entity Relationship Diagram

```
┌──────────────┐     ┌──────────────┐     ┌──────────────┐
│    users     │     │    majors    │     │    news      │
├──────────────┤     ├──────────────┤     ├──────────────┤
│ id           │     │ id           │     │ id           │
│ name         │     │ name         │     │ title        │
│ email        │     │ slug         │     │ slug         │
│ password     │     │ short_name   │     │ category     │
│ is_admin     │     │ image        │     │ image        │
│ timestamps   │     │ icon         │     │ excerpt      │
└──────────────┘     │ description  │     │ content      │
                     │ short_desc   │     │ author       │
                     │ competencies │     │ views        │
                     │ career_pros  │     │ is_active    │
                     │ is_active    │     │ is_published │
                     │ order        │     │ published_at │
                     │ timestamps   │     │ timestamps   │
                     └──────────────┘     └──────────────┘

┌──────────────┐     ┌──────────────┐     ┌──────────────┐
│ achievements │     │extracurricular│    │  galleries   │
├──────────────┤     ├──────────────┤     ├──────────────┤
│ id           │     │ id           │     │ id           │
│ title        │     │ name         │     │ title        │
│ level        │     │ slug         │     │ type         │
│ rank         │     │ image        │     │ image        │
│ student_name │     │ short_desc   │     │ video_url    │
│ year         │     │ description  │     │ thumbnail    │
│ image        │     │ schedule     │     │ description  │
│ description  │     │ is_active    │     │ is_active    │
│ is_active    │     │ order        │     │ order        │
│ timestamps   │     │ timestamps   │     │ timestamps   │
└──────────────┘     └──────────────┘     └──────────────┘

┌──────────────┐     ┌──────────────┐     ┌──────────────┐
│   teachers   │     │    staff     │     │business_centr│
├──────────────┤     ├──────────────┤     ├──────────────┤
│ id           │     │ id           │     │ id           │
│ name         │     │ name         │     │ name         │
│ photo        │     │ photo        │     │ slug         │
│ position     │     │ position     │     │ image        │
│ subjects     │     │ department   │     │ description  │
│ email        │     │ email        │     │ link         │
│ is_active    │     │ is_active    │     │ is_active    │
│ order        │     │ order        │     │ order        │
│ timestamps   │     │ timestamps   │     │ timestamps   │
└──────────────┘     └──────────────┘     └──────────────┘

┌──────────────┐     ┌──────────────┐     ┌──────────────┐
│    pages     │     │   sliders    │     │   settings   │
├──────────────┤     ├──────────────┤     ├──────────────┤
│ id           │     │ id           │     │ id           │
│ title        │     │ title        │     │ key          │
│ slug         │     │ subtitle     │     │ value        │
│ content      │     │ image        │     │ group        │
│ image        │     │ button_text  │     │ timestamps   │
│ is_active    │     │ button_url   │     └──────────────┘
│ order        │     │ is_active    │
│ timestamps   │     │ order        │
└──────────────┘     │ timestamps   │
                     └──────────────┘

┌──────────────┐     ┌──────────────┐     ┌──────────────┐
│ social_links │     │   partners   │     │  statistics  │
├──────────────┤     ├──────────────┤     ├──────────────┤
│ id           │     │ id           │     │ id           │
│ platform     │     │ name         │     │ label        │
│ url          │     │ logo         │     │ value        │
│ is_active    │     │ url          │     │ icon         │
│ order        │     │ is_active    │     │ order        │
│ timestamps   │     │ order        │     │ timestamps   │
└──────────────┘     │ timestamps   │     └──────────────┘
                     └──────────────┘

┌──────────────────┐     ┌──────────────┐
│principal_messages│     │    awards    │
├──────────────────┤     ├──────────────┤
│ id               │     │ id           │
│ name             │     │ title        │
│ photo            │     │ year         │
│ message          │     │ image        │
│ is_active        │     │ is_active    │
│ timestamps       │     │ timestamps   │
└──────────────────┘     └──────────────┘
```

---

## 📋 Detail Tabel

### 1. users
Tabel untuk menyimpan data pengguna admin panel.

| Kolom | Tipe | Nullable | Default | Deskripsi |
|-------|------|----------|---------|-----------|
| id | bigint | No | AUTO | Primary key |
| name | varchar(255) | No | - | Nama pengguna |
| email | varchar(255) | No | - | Email (unique) |
| password | varchar(255) | No | - | Password (hashed) |
| is_admin | boolean | No | true | Status admin |
| email_verified_at | timestamp | Yes | null | Waktu verifikasi email |
| remember_token | varchar(100) | Yes | null | Token remember me |
| created_at | timestamp | Yes | null | Waktu dibuat |
| updated_at | timestamp | Yes | null | Waktu diperbarui |

---

### 2. majors
Tabel untuk program keahlian/jurusan.

| Kolom | Tipe | Nullable | Default | Deskripsi |
|-------|------|----------|---------|-----------|
| id | bigint | No | AUTO | Primary key |
| name | varchar(255) | No | - | Nama jurusan |
| slug | varchar(255) | No | - | URL slug (unique) |
| short_name | varchar(50) | Yes | null | Singkatan (e.g., TKJ, RPL) |
| image | varchar(255) | Yes | null | Path gambar |
| icon | varchar(255) | Yes | null | Path icon |
| short_description | text | Yes | null | Deskripsi singkat |
| description | longtext | Yes | null | Deskripsi lengkap (HTML) |
| competencies | longtext | Yes | null | Kompetensi keahlian (HTML) |
| career_prospects | longtext | Yes | null | Prospek karir (HTML) |
| is_active | boolean | No | true | Status aktif |
| order | integer | No | 0 | Urutan tampilan |
| created_at | timestamp | Yes | null | Waktu dibuat |
| updated_at | timestamp | Yes | null | Waktu diperbarui |

---

### 3. news
Tabel untuk berita dan artikel.

| Kolom | Tipe | Nullable | Default | Deskripsi |
|-------|------|----------|---------|-----------|
| id | bigint | No | AUTO | Primary key |
| title | varchar(255) | No | - | Judul berita |
| slug | varchar(255) | No | - | URL slug (unique) |
| category | varchar(100) | Yes | 'Umum' | Kategori berita |
| image | varchar(255) | Yes | null | Path gambar |
| excerpt | text | Yes | null | Ringkasan |
| content | longtext | No | - | Konten artikel (HTML) |
| author | varchar(255) | Yes | null | Nama penulis |
| views | integer | No | 0 | Jumlah view |
| is_active | boolean | No | true | Status aktif |
| is_published | boolean | No | true | Status published |
| published_at | timestamp | Yes | null | Waktu publish |
| created_at | timestamp | Yes | null | Waktu dibuat |
| updated_at | timestamp | Yes | null | Waktu diperbarui |

---

### 4. achievements
Tabel untuk prestasi siswa.

| Kolom | Tipe | Nullable | Default | Deskripsi |
|-------|------|----------|---------|-----------|
| id | bigint | No | AUTO | Primary key |
| title | varchar(255) | No | - | Judul prestasi |
| level | varchar(100) | Yes | null | Level (Nasional, Provinsi, dll) |
| rank | varchar(100) | Yes | null | Peringkat/Juara |
| student_name | varchar(255) | Yes | null | Nama siswa |
| year | integer | Yes | null | Tahun prestasi |
| image | varchar(255) | Yes | null | Path gambar |
| description | text | Yes | null | Deskripsi |
| is_active | boolean | No | true | Status aktif |
| created_at | timestamp | Yes | null | Waktu dibuat |
| updated_at | timestamp | Yes | null | Waktu diperbarui |

---

### 5. extracurriculars
Tabel untuk ekstrakurikuler.

| Kolom | Tipe | Nullable | Default | Deskripsi |
|-------|------|----------|---------|-----------|
| id | bigint | No | AUTO | Primary key |
| name | varchar(255) | No | - | Nama ekstrakurikuler |
| slug | varchar(255) | No | - | URL slug (unique) |
| image | varchar(255) | Yes | null | Path gambar |
| short_description | text | Yes | null | Deskripsi singkat |
| description | longtext | Yes | null | Deskripsi lengkap (HTML) |
| schedule | varchar(255) | Yes | null | Jadwal kegiatan |
| is_active | boolean | No | true | Status aktif |
| order | integer | No | 0 | Urutan tampilan |
| created_at | timestamp | Yes | null | Waktu dibuat |
| updated_at | timestamp | Yes | null | Waktu diperbarui |

---

### 6. galleries
Tabel untuk galeri foto dan video.

| Kolom | Tipe | Nullable | Default | Deskripsi |
|-------|------|----------|---------|-----------|
| id | bigint | No | AUTO | Primary key |
| title | varchar(255) | Yes | null | Judul |
| type | enum('photo','video') | No | 'photo' | Tipe media |
| image | varchar(255) | Yes | null | Path gambar |
| video_url | varchar(255) | Yes | null | URL video (YouTube) |
| thumbnail | varchar(255) | Yes | null | Path thumbnail video |
| description | text | Yes | null | Deskripsi |
| is_active | boolean | No | true | Status aktif |
| order | integer | No | 0 | Urutan tampilan |
| created_at | timestamp | Yes | null | Waktu dibuat |
| updated_at | timestamp | Yes | null | Waktu diperbarui |

---

### 7. teachers
Tabel untuk data guru.

| Kolom | Tipe | Nullable | Default | Deskripsi |
|-------|------|----------|---------|-----------|
| id | bigint | No | AUTO | Primary key |
| name | varchar(255) | No | - | Nama guru |
| photo | varchar(255) | Yes | null | Path foto |
| position | varchar(255) | Yes | null | Jabatan |
| subjects | varchar(255) | Yes | null | Mata pelajaran |
| email | varchar(255) | Yes | null | Email |
| is_active | boolean | No | true | Status aktif |
| order | integer | No | 0 | Urutan tampilan |
| created_at | timestamp | Yes | null | Waktu dibuat |
| updated_at | timestamp | Yes | null | Waktu diperbarui |

---

### 8. staff
Tabel untuk tenaga kependidikan.

| Kolom | Tipe | Nullable | Default | Deskripsi |
|-------|------|----------|---------|-----------|
| id | bigint | No | AUTO | Primary key |
| name | varchar(255) | No | - | Nama staff |
| photo | varchar(255) | Yes | null | Path foto |
| position | varchar(255) | Yes | null | Jabatan |
| department | varchar(255) | Yes | null | Departemen |
| email | varchar(255) | Yes | null | Email |
| is_active | boolean | No | true | Status aktif |
| order | integer | No | 0 | Urutan tampilan |
| created_at | timestamp | Yes | null | Waktu dibuat |
| updated_at | timestamp | Yes | null | Waktu diperbarui |

---

### 9. pages
Tabel untuk halaman statis.

| Kolom | Tipe | Nullable | Default | Deskripsi |
|-------|------|----------|---------|-----------|
| id | bigint | No | AUTO | Primary key |
| title | varchar(255) | No | - | Judul halaman |
| slug | varchar(255) | No | - | URL slug (unique) |
| content | longtext | Yes | null | Konten halaman (HTML) |
| image | varchar(255) | Yes | null | Path gambar |
| is_active | boolean | No | true | Status aktif |
| order | integer | No | 0 | Urutan tampilan |
| created_at | timestamp | Yes | null | Waktu dibuat |
| updated_at | timestamp | Yes | null | Waktu diperbarui |

---

### 10. settings
Tabel untuk pengaturan website.

| Kolom | Tipe | Nullable | Default | Deskripsi |
|-------|------|----------|---------|-----------|
| id | bigint | No | AUTO | Primary key |
| key | varchar(255) | No | - | Key setting (unique) |
| value | text | Yes | null | Value setting |
| group | varchar(100) | Yes | 'general' | Grup setting |
| created_at | timestamp | Yes | null | Waktu dibuat |
| updated_at | timestamp | Yes | null | Waktu diperbarui |

**Setting Keys:**
- `school_name` - Nama sekolah
- `school_tagline` - Tagline
- `school_email` - Email
- `school_phone` - Telepon
- `school_address` - Alamat
- `school_hours` - Jam operasional
- `google_maps_embed` - Embed code Google Maps
- `ppdb_active` - Status PPDB
- `ppdb_url` - URL PPDB
- `whatsapp` - Nomor WhatsApp

---

### 11. sliders
Tabel untuk slider homepage.

| Kolom | Tipe | Nullable | Default | Deskripsi |
|-------|------|----------|---------|-----------|
| id | bigint | No | AUTO | Primary key |
| title | varchar(255) | Yes | null | Judul slider |
| subtitle | text | Yes | null | Subjudul |
| image | varchar(255) | No | - | Path gambar |
| button_text | varchar(100) | Yes | null | Text tombol |
| button_url | varchar(255) | Yes | null | URL tombol |
| is_active | boolean | No | true | Status aktif |
| order | integer | No | 0 | Urutan tampilan |
| created_at | timestamp | Yes | null | Waktu dibuat |
| updated_at | timestamp | Yes | null | Waktu diperbarui |

---

### 12. social_links
Tabel untuk link media sosial.

| Kolom | Tipe | Nullable | Default | Deskripsi |
|-------|------|----------|---------|-----------|
| id | bigint | No | AUTO | Primary key |
| platform | varchar(50) | No | - | Platform (facebook, instagram, dll) |
| url | varchar(255) | No | - | URL link |
| is_active | boolean | No | true | Status aktif |
| order | integer | No | 0 | Urutan tampilan |
| created_at | timestamp | Yes | null | Waktu dibuat |
| updated_at | timestamp | Yes | null | Waktu diperbarui |

---

## 🔧 Model Scopes

Setiap model memiliki scope `active()` untuk filter data aktif:

```php
// Usage
Major::active()->get();
News::active()->published()->get();
Achievement::active()->orderBy('year', 'desc')->get();
```

### Scope yang tersedia:

| Model | Scope | Query |
|-------|-------|-------|
| All | `active()` | `where('is_active', true)` |
| News | `published()` | `where('is_published', true)` |
| Major | `ordered()` | `orderBy('order')` |
| Gallery | `photos()` | `where('type', 'photo')` |
| Gallery | `videos()` | `where('type', 'video')` |

---

## 📝 Migrations

Jalankan migrasi dengan:

```bash
# Jalankan migrasi
php artisan migrate

# Rollback semua
php artisan migrate:rollback

# Fresh migration dengan seeder
php artisan migrate:fresh --seed
```

---

## 🌱 Seeders

Seeders tersedia untuk data demo:

```bash
# Jalankan semua seeder
php artisan db:seed

# Jalankan seeder tertentu
php artisan db:seed --class=SettingSeeder
php artisan db:seed --class=UserSeeder
```

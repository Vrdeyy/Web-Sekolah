# Admin Panel User Guide

Panduan lengkap penggunaan admin panel SMK YAJ Website.

---

## 📋 Daftar Isi

- [Login](#login)
- [Dashboard](#dashboard)
- [Manajemen Konten](#manajemen-konten)
- [Pengaturan](#pengaturan)
- [FAQ](#faq)

---

## 🔐 Login

### Akses Admin Panel

1. Buka browser dan kunjungi: `http://domain-anda.com/admin`
2. Masukkan email dan password admin
3. Klik tombol **"Sign in"**

### Kredensial Default

| Email | Password |
|-------|----------|
| admin@sekolah.id | admin123 |

> ⚠️ **Penting**: Segera ubah password default setelah login pertama!

### Lupa Password?

Hubungi administrator sistem untuk reset password.

---

## 📊 Dashboard

Dashboard menampilkan ringkasan statistik website:

- **Total Berita** - Jumlah artikel yang dipublikasikan
- **Total Jurusan** - Jumlah program keahlian
- **Total Prestasi** - Jumlah prestasi siswa
- **Total Guru & Staff** - Jumlah tenaga pendidik

---

## 📝 Manajemen Konten

### 1. Berita & Artikel

#### Menambah Berita Baru

1. Klik menu **"Berita"** di sidebar
2. Klik tombol **"Buat Berita"** di pojok kanan atas
3. Isi form:
   - **Judul** - Judul berita (akan otomatis generate slug)
   - **Kategori** - Pilih kategori (Kegiatan, Pengumuman, dll)
   - **Gambar** - Upload gambar utama (rasio 16:9 recommended)
   - **Ringkasan** - Deskripsi singkat (ditampilkan di list)
   - **Konten** - Isi artikel lengkap (support HTML/WYSIWYG)
   - **Penulis** - Nama penulis
   - **Status** - Aktif/Tidak aktif
   - **Published** - Ya/Tidak
   - **Tanggal Publish** - Tanggal dan waktu publish
4. Klik **"Simpan"**

#### Mengedit Berita

1. Klik menu **"Berita"**
2. Cari berita yang ingin diedit
3. Klik icon **pensil** atau nama berita
4. Edit data yang diperlukan
5. Klik **"Simpan"**

#### Menghapus Berita

1. Klik menu **"Berita"**
2. Cari berita yang ingin dihapus
3. Klik icon **tempat sampah**
4. Konfirmasi penghapusan

---

### 2. Program Keahlian (Jurusan)

#### Menambah Jurusan Baru

1. Klik menu **"Jurusan"**
2. Klik **"Buat Jurusan"**
3. Isi form:
   - **Nama Lengkap** - Nama program keahlian
   - **Singkatan** - Singkatan (misal: TKJ, RPL)
   - **Gambar** - Foto jurusan
   - **Icon** - Icon kecil (opsional)
   - **Deskripsi Singkat** - Untuk card preview
   - **Deskripsi Lengkap** - Penjelasan detail
   - **Kompetensi** - Daftar kompetensi keahlian
   - **Prospek Karir** - Peluang kerja lulusan
   - **Urutan** - Urutan tampilan di website
4. Klik **"Simpan"**

---

### 3. Prestasi

#### Menambah Prestasi

1. Klik menu **"Prestasi"**
2. Klik **"Buat Prestasi"**
3. Isi form:
   - **Judul Prestasi** - Nama lomba/kompetisi
   - **Level** - Tingkat (Internasional, Nasional, Provinsi, Kota, Sekolah)
   - **Peringkat** - Juara berapa
   - **Nama Siswa** - Nama peserta
   - **Tahun** - Tahun prestasi diraih
   - **Gambar** - Foto/sertifikat
   - **Deskripsi** - Keterangan tambahan
4. Klik **"Simpan"**

---

### 4. Ekstrakurikuler

#### Menambah Ekstrakurikuler

1. Klik menu **"Ekstrakurikuler"**
2. Klik **"Buat Ekstrakurikuler"**
3. Isi form:
   - **Nama** - Nama kegiatan
   - **Gambar** - Foto kegiatan
   - **Deskripsi Singkat** - Preview
   - **Deskripsi Lengkap** - Detail kegiatan
   - **Jadwal** - Waktu pelaksanaan (misal: Selasa & Kamis, 15:00-17:00)
   - **Urutan** - Urutan tampilan
4. Klik **"Simpan"**

---

### 5. Galeri

#### Menambah Foto

1. Klik menu **"Galeri"**
2. Klik **"Buat Galeri"**
3. Pilih tipe **"Foto"**
4. Isi form:
   - **Judul** - Judul foto
   - **Gambar** - Upload foto
   - **Deskripsi** - Keterangan
   - **Urutan** - Urutan tampilan
5. Klik **"Simpan"**

#### Menambah Video

1. Klik menu **"Galeri"**
2. Klik **"Buat Galeri"**
3. Pilih tipe **"Video"**
4. Isi form:
   - **Judul** - Judul video
   - **URL Video** - Link YouTube (misal: https://www.youtube.com/watch?v=xxxxx)
   - **Thumbnail** - Gambar cover (opsional, akan diambil dari YouTube jika kosong)
   - **Deskripsi** - Keterangan
5. Klik **"Simpan"**

---

### 6. Guru & Staff

#### Menambah Data Guru

1. Klik menu **"Guru"**
2. Klik **"Buat Guru"**
3. Isi form:
   - **Nama** - Nama lengkap dengan gelar
   - **Foto** - Pas foto (rasio 1:1)
   - **Jabatan** - Jabatan (misal: Waka Kurikulum)
   - **Mata Pelajaran** - Mapel yang diampu
   - **Email** - Email (opsional)
   - **Urutan** - Urutan tampilan
4. Klik **"Simpan"**

#### Menambah Data Staff

Langkah sama seperti Guru, dengan field:
- **Departemen** - Bagian kerja (TU, Bendahara, dll)

---

### 7. Halaman Statis

Untuk halaman seperti Yayasan, Sekolah, Visi Misi:

1. Klik menu **"Halaman"**
2. Cari halaman yang ingin diedit
3. Edit konten menggunakan editor WYSIWYG
4. Klik **"Simpan"**

> 💡 **Tips**: Slug halaman menentukan URL. Misalnya slug "yayasan" akan diakses di `/halaman/yayasan`

---

### 8. Slider Homepage

Untuk banner di homepage:

1. Klik menu **"Slider"**
2. Klik **"Buat Slider"**
3. Isi form:
   - **Judul** - Teks utama
   - **Subjudul** - Teks pendukung
   - **Gambar** - Background (rasio 16:9, minimal 1920x1080)
   - **Teks Tombol** - Label button (misal: "Daftar Sekarang")
   - **URL Tombol** - Link tujuan
   - **Urutan** - Urutan tampilan
4. Klik **"Simpan"**

---

## ⚙️ Pengaturan

### Pengaturan Website

Klik menu **"Pengaturan"** untuk mengatur:

| Setting | Deskripsi |
|---------|-----------|
| Nama Sekolah | Ditampilkan di header dan footer |
| Tagline | Slogan sekolah |
| Email | Email kontak |
| Telepon | Nomor telepon |
| Alamat | Alamat lengkap sekolah |
| Jam Operasional | Jam kerja sekolah |
| Google Maps | Embed code dari Google Maps |
| PPDB Aktif | Toggle untuk aktifkan tombol PPDB |
| URL PPDB | Link ke form pendaftaran |
| WhatsApp | Nomor WhatsApp untuk chat |

### Media Sosial

Klik menu **"Social Links"** untuk mengatur:

1. Klik **"Buat Social Link"**
2. Pilih platform (Facebook, Instagram, YouTube, TikTok, Twitter)
3. Masukkan URL profil
4. Klik **"Simpan"**

---

## ❓ FAQ

### Q: Bagaimana cara mengubah password admin?
**A:** Saat ini perlu melalui database. Hubungi developer untuk bantuan.

### Q: Ukuran gambar yang disarankan?
**A:**
- Banner/Slider: 1920 x 1080 px (16:9)
- Foto Berita: 1280 x 720 px (16:9)
- Foto Guru/Staff: 400 x 400 px (1:1)
- Logo: 200 x 200 px

### Q: Format gambar yang didukung?
**A:** JPG, PNG, WebP (maksimal 2MB per file)

### Q: Bagaimana cara backup data?
**A:** Gunakan fitur export database atau hubungi developer.

### Q: Berita tidak muncul di website?
**A:** Pastikan:
1. Status "Aktif" dicentang
2. Status "Published" dicentang
3. Tanggal publish sudah lewat

### Q: Gambar tidak muncul?
**A:** Pastikan storage link sudah dibuat dengan menjalankan `php artisan storage:link`

---

## 📞 Bantuan Teknis

Jika mengalami kendala, hubungi:

- **Email**: support@smkyaj.sch.id
- **WhatsApp**: +62 xxx-xxxx-xxxx

---

*Dokumentasi ini dibuat untuk SMK YAJ Website v1.0.0*

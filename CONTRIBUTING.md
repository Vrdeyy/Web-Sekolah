# Contributing Guidelines

Terima kasih telah tertarik untuk berkontribusi pada proyek SMK YAJ Website! 🎉

## 📋 Daftar Isi

- [Code of Conduct](#code-of-conduct)
- [Cara Berkontribusi](#cara-berkontribusi)
- [Setup Development](#setup-development)
- [Coding Standards](#coding-standards)
- [Commit Messages](#commit-messages)
- [Pull Request](#pull-request)
- [Reporting Bugs](#reporting-bugs)
- [Feature Requests](#feature-requests)

---

## Code of Conduct

Dengan berkontribusi pada proyek ini, Anda setuju untuk:
- Bersikap ramah dan inklusif
- Menghargai pendapat orang lain
- Menerima kritik konstruktif
- Fokus pada kepentingan komunitas

---

## Cara Berkontribusi

### 1. Fork Repository
Klik tombol "Fork" di halaman repository untuk membuat salinan di akun GitHub Anda.

### 2. Clone Repository
```bash
git clone https://github.com/YOUR_USERNAME/web-yaj.git
cd web-yaj
```

### 3. Buat Branch Baru
```bash
git checkout -b feature/nama-fitur
# atau
git checkout -b fix/nama-bugfix
```

### 4. Lakukan Perubahan
Buat perubahan yang diperlukan di branch Anda.

### 5. Commit Perubahan
```bash
git add .
git commit -m "feat: deskripsi singkat perubahan"
```

### 6. Push ke Fork Anda
```bash
git push origin feature/nama-fitur
```

### 7. Buat Pull Request
Buka repository asli dan klik "New Pull Request".

---

## Setup Development

### Prerequisites
- PHP >= 8.2
- Composer >= 2.0
- Node.js >= 18.x
- MySQL/MariaDB

### Instalasi

```bash
# Install PHP dependencies
composer install

# Install Node dependencies
npm install

# Setup environment
cp .env.example .env
php artisan key:generate

# Konfigurasi database di .env

# Jalankan migrasi
php artisan migrate --seed

# Storage link
php artisan storage:link

# Build assets
npm run dev
```

### Menjalankan Development Server

```bash
# Cara 1: Script composer (recommended)
composer run dev

# Cara 2: Manual
php artisan serve
npm run dev  # di terminal terpisah
```

---

## Coding Standards

### PHP / Laravel

1. **PSR-12 Coding Standard**
   - Gunakan Laravel Pint untuk auto-fix:
   ```bash
   ./vendor/bin/pint
   ```

2. **Naming Conventions**
   - Model: `PascalCase` singular (e.g., `News`, `Achievement`)
   - Controller: `PascalCase` dengan suffix `Controller` (e.g., `WebController`)
   - Migration: `snake_case` dengan timestamp (e.g., `2024_01_01_000000_create_news_table`)
   - Views: `kebab-case` (e.g., `news-show.blade.php`)

3. **File Structure**
   ```
   app/
   ├── Filament/Resources/     # Admin resources
   ├── Http/Controllers/       # Controllers
   ├── Models/                 # Eloquent models
   └── Providers/              # Service providers
   ```

### Blade Templates

1. **Gunakan Components**
   ```blade
   {{-- Good --}}
   <x-button>Click me</x-button>
   
   {{-- Avoid --}}
   <button class="...">Click me</button>
   ```

2. **Indentation**
   - Gunakan 4 spaces untuk PHP/Blade
   - Gunakan 2 spaces untuk HTML dalam Blade

3. **Comment**
   ```blade
   {{-- This is a Blade comment --}}
   ```

### CSS / Tailwind

1. **Gunakan utility classes Tailwind**
   ```html
   <div class="flex items-center gap-4 p-6 bg-white rounded-xl">
   ```

2. **Responsive classes**
   ```html
   <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
   ```

3. **Custom CSS**
   - Letakkan di `resources/css/app.css`
   - Gunakan `@apply` untuk reusable styles

### JavaScript

1. **Modern ES6+ Syntax**
   ```javascript
   // Good
   const myFunction = () => { ... }
   
   // Avoid
   function myFunction() { ... }
   ```

2. **Lokasi file**
   - Letakkan di `resources/js/`
   - Import di `app.js`

---

## Commit Messages

Gunakan format [Conventional Commits](https://www.conventionalcommits.org/):

```
<type>(<scope>): <description>

[optional body]

[optional footer]
```

### Types
- `feat`: Fitur baru
- `fix`: Bug fix
- `docs`: Dokumentasi
- `style`: Formatting (tidak mempengaruhi kode)
- `refactor`: Refactoring kode
- `test`: Menambah/memperbaiki tests
- `chore`: Maintenance tasks

### Contoh
```bash
git commit -m "feat(news): add category filter to news list"
git commit -m "fix(footer): resolve null error in social links"
git commit -m "docs: update installation instructions"
git commit -m "style: format blade templates with pint"
```

---

## Pull Request

### Checklist sebelum submit PR:

- [ ] Kode mengikuti coding standards
- [ ] Sudah ditest secara lokal
- [ ] Tidak ada error atau warning di console
- [ ] Migration baru (jika ada) sudah tested
- [ ] Update dokumentasi jika diperlukan
- [ ] Commit messages mengikuti conventional commits

### Template PR
```markdown
## Description
[Jelaskan perubahan yang Anda buat]

## Type of Change
- [ ] Bug fix
- [ ] New feature
- [ ] Breaking change
- [ ] Documentation update

## How Has This Been Tested?
[Jelaskan cara Anda menguji perubahan]

## Screenshots (if applicable)
[Tambahkan screenshot jika ada UI changes]

## Checklist
- [ ] My code follows the style guidelines
- [ ] I have performed a self-review
- [ ] I have commented my code where necessary
- [ ] My changes generate no new warnings
```

---

## Reporting Bugs

### Sebelum melaporkan bug:
1. Cek apakah bug sudah dilaporkan di Issues
2. Update ke versi terbaru
3. Clear cache (`php artisan optimize:clear`)

### Format Bug Report:
```markdown
## Bug Description
[Jelaskan bug secara singkat]

## Steps to Reproduce
1. Buka halaman '...'
2. Klik pada '...'
3. Error muncul

## Expected Behavior
[Apa yang seharusnya terjadi]

## Actual Behavior
[Apa yang terjadi]

## Screenshots
[Jika ada]

## Environment
- OS: [e.g., Windows 11]
- Browser: [e.g., Chrome 120]
- PHP Version: [e.g., 8.2.0]
- Laravel Version: [e.g., 12.0]
```

---

## Feature Requests

### Format Request:
```markdown
## Feature Description
[Jelaskan fitur yang diinginkan]

## Use Case
[Mengapa fitur ini diperlukan]

## Proposed Solution
[Bagaimana implementasinya (opsional)]

## Alternatives Considered
[Alternatif yang pernah dipertimbangkan]
```

---

## Questions?

Jika ada pertanyaan, silakan:
1. Buka Discussion di GitHub
2. Kirim email ke: developer@smkyaj.sch.id

---

Terima kasih atas kontribusi Anda! 🙏

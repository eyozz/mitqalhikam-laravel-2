# Product Requirements Document (PRD)
# Website Company Profile STTD Al Hikam

## Project Context

Bangun website company profile modern untuk Sekolah Tahfizh Tingkat Dasar (STTD) Al Hikam Surakarta.

Website berfungsi sebagai:

- Media branding sekolah
- Publikasi program pendidikan
- Informasi kegiatan sekolah
- Publikasi berita
- Media komunikasi
- Landing page pendaftaran santri baru

Website bersifat frontend company profile tanpa dashboard admin.

---

## Referensi

Gunakan referensi:

- Handbook dan dokumentasi sekolah
- Desain visual dari `desain_2.pdf`

Karakter visual:

- Modern islamic
- Clean educational website
- Elegant company profile
- Whitespace dominan
- Typography modern
- Responsive mobile-first

Palet warna:

- Hijau emerald
- Putih
- Krem
- Abu terang
- Gold lembut

---

## Tech Stack

### Backend

- Laravel 12
- PHP 8.2+

### Frontend

- Blade Template
- Tailwind CSS
- Alpine.js
- Vite

---

## Website Type

- Company Profile
- Tanpa dashboard admin
- Tanpa authentication
- Tanpa portal siswa
- Tanpa multi-role system

---

## Sitemap

1. Beranda
2. Tentang Kami
3. Program
4. News
5. Hubungi Kami
6. Button Pendaftaran ke Google Form

---

## Page Requirements

### 1. Beranda

Section:

- Hero
- Tentang Sekolah
- Program Unggulan
- Statistik
- Gallery Kegiatan
- Preview News
- CTA Pendaftaran
- Footer

Hero requirements:

- Headline islami modern
- CTA daftar sekarang
- CTA lihat program
- Background islami modern

---

### 2. Tentang Kami

Isi:

- Sejarah sekolah
- Visi misi
- Filosofi pendidikan
- Konsep mulazamah
- Target pendidikan
- Keunggulan sekolah
- Timeline sekolah

Layout:

- Storytelling modern
- Elegant section flow

---

### 3. Program

Kategori:

- Tahfizh
- Tahsin
- Hafalan Hadits
- Program Harian
- Program Semester
- Ekstrakurikuler
- Minat dan Bakat

Fitur:

- Card modern
- FAQ accordion
- CTA daftar
- Dokumentasi visual

---

### 4. News

Fitur:

- Daftar artikel
- Detail artikel
- Featured article
- Search article
- Pagination
- Related posts

---

### 5. Hubungi Kami

Fitur:

- Contact form
- WhatsApp CTA
- Google Maps embed
- Alamat sekolah
- Email
- Jam operasional

---

### 6. Pendaftaran

Button CTA global:

- Sticky CTA
- Redirect ke Google Form
- Open new tab

---

## UI/UX Guidelines

### Navbar

- Sticky navbar
- Transparent on hero
- Solid on scroll
- Mobile hamburger menu

### Typography

Gunakan salah satu atau kombinasi font berikut:

- Inter
- Poppins
- Plus Jakarta Sans

### Card Design

- `rounded-2xl`
- Soft shadow
- Smooth hover
- Modern spacing

### Animation

- Smooth scroll
- Fade animation
- Subtle interaction

### Responsive

- Mobile-first
- Tablet optimized
- Desktop optimized

---

## SEO Requirements

Setiap halaman wajib memiliki:

- Unique title
- Meta description
- OG tags
- Semantic HTML

Tambahkan:

- `sitemap.xml`
- `robots.txt`
- Structured data

---

## Performance Requirements

- Lazy loading
- Optimized image
- Minified assets
- Fast loading
- Accessibility friendly

---

## Laravel Architecture

Gunakan:

- `Route::view()` untuk halaman statis
- Named routes
- Reusable Blade components

Pisahkan component:

- Navbar
- Footer
- Hero
- CTA
- Card
- FAQ

Gunakan:

- Vite
- Tailwind optimization

---

## Folder Structure

```bash
resources/
├── views/
│   ├── layouts/
│   ├── pages/
│   ├── partials/
│   └── components/
│
├── js/
├── css/
└── images/
```

---

## Content Source

Gunakan isi dari handbook sekolah:

- Visi misi
- Program sekolah
- Kegiatan
- Konsep pendidikan
- Tahfizh
- Ekstrakurikuler
- Tata tertib
- Kegiatan santri

---

## Output Target

Hasil akhir harus:

- Modern
- Premium
- Islami
- Clean
- Professional
- Responsive
- SEO friendly
- Elegant educational company profile

---

## Git Workflow Rules Wajib

Setiap perubahan kode wajib disertai Git commit.

### Rules

- Selalu commit setelah 1 task selesai.
- Gunakan Conventional Commit.
- Jangan gabungkan banyak perubahan berbeda dalam 1 commit.
- Selalu cek `git status` sebelum bekerja.
- Selalu review diff sebelum commit.
- Jalankan testing/linting bila tersedia.
- Jangan force push.
- Jangan hapus branch tanpa instruksi.
- Jangan meninggalkan perubahan tanpa commit jika repository Git tersedia.

### Workflow Per Task

1. Analisis task.
2. Cek status repository.
3. Implementasi perubahan.
4. Review diff.
5. Testing atau linting bila tersedia.
6. Stage file yang relevan.
7. Commit perubahan.
8. Tampilkan summary perubahan.
9. Lanjut task berikutnya.

### Command Wajib

Cek status sebelum bekerja:

```bash
git status --short
```

Review diff sebelum commit:

```bash
git diff
```

Stage file relevan:

```bash
git add path/to/file
```

Commit dengan Conventional Commit:

```bash
git commit -m "feat: add homepage hero section"
```

Cek status setelah commit:

```bash
git status --short
```

Jika project belum memiliki Git repository, inisialisasi hanya setelah disetujui pemilik project:

```bash
git init
git add .
git commit -m "chore: initialize project repository"
```

---

## Conventional Commit Format

Gunakan prefix berikut:

- `feat:` untuk fitur baru
- `fix:` untuk perbaikan bug
- `refactor:` untuk perubahan struktur tanpa mengubah behavior
- `style:` untuk perubahan tampilan atau formatting
- `docs:` untuk dokumentasi
- `chore:` untuk konfigurasi, dependency, atau maintenance
- `perf:` untuk optimasi performa

Contoh commit:

```bash
git commit -m "feat: add homepage hero section"
git commit -m "style: improve program card layout"
git commit -m "fix: resolve mobile navbar overflow"
git commit -m "docs: add project PRD and git workflow"
```

---

## Codex Rules

- Jangan meninggalkan perubahan tanpa commit jika Git repository tersedia.
- Jangan force push.
- Jangan hapus branch tanpa instruksi.
- Commit harus kecil dan atomik.
- Setelah task selesai tampilkan:
  - File changed
  - Summary perubahan
  - Commit message

---

## Development Approach

Gunakan pendekatan:

- Component reusable
- Scalable frontend architecture
- Maintainable Blade structure
- Clean Tailwind utility usage
- Semantic HTML
- Accessibility first
- Conversion oriented UI/UX
- Modern islamic design system

---

## Definition of Done

Sebuah task dianggap selesai jika:

- Implementasi sesuai PRD.
- Tampilan responsive di mobile, tablet, dan desktop.
- Komponen reusable digunakan bila relevan.
- SEO dasar sudah diterapkan pada halaman terkait.
- Tidak ada error build atau linting yang diketahui.
- Diff sudah direview.
- Perubahan sudah dicommit jika repository Git tersedia.

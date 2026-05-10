# PRD, List Pengerjaan, dan Panduan Setup
# Website Company Profile MITQ Al-Hikam

## 1. Product Requirements Document

### 1.1 Ringkasan Produk

Website MITQ Al-Hikam adalah website company profile berbasis Laravel 12 untuk menampilkan profil lembaga, program pendidikan, berita, galeri kegiatan, informasi kontak, dan CTA pendaftaran santri baru.

Website sudah dilengkapi Admin Dashboard CMS agar pengelola dapat mengubah konten utama tanpa menyentuh kode Blade secara langsung.

### 1.2 Tujuan Website

- Menampilkan profil MITQ Al-Hikam secara profesional.
- Menyampaikan informasi program pendidikan tahfizh dan akademik.
- Menampilkan berita dan dokumentasi kegiatan sekolah.
- Menyediakan media komunikasi melalui form kontak.
- Mengarahkan calon wali santri ke link pendaftaran PPDB.
- Memberikan admin panel untuk mengelola konten website.

### 1.3 Target Pengguna

- Calon wali santri.
- Wali santri aktif.
- Pengelola sekolah.
- Masyarakat umum yang mencari informasi pendidikan tahfizh dasar.
- Admin website MITQ Al-Hikam.

### 1.4 Ruang Lingkup Website

Halaman publik:

- Beranda
- Tentang Kami
- Program
- News
- Detail News
- Hubungi Kami
- Sitemap XML

Fitur admin:

- Login admin
- Dashboard CMS
- Kelola berita
- Kelola galeri
- Kelola konten halaman
- Kelola identitas website
- Kelola link PPDB
- Kelola footer links
- Kelola pesan kontak

### 1.5 Tech Stack

Backend:

- Laravel 12
- PHP 8.2+
- MySQL

Frontend:

- Blade Template
- Tailwind CSS via CDN pada halaman existing
- Vite untuk asset build Laravel
- JavaScript ringan untuk mobile menu

Development tools:

- Composer
- Node.js dan npm
- PHPUnit
- Laravel Pint

### 1.6 Database Utama

Tabel bawaan Laravel:

- `users`
- `cache`
- `jobs`

Tabel website:

- `news_posts`
- `contact_messages`
- `galleries`
- `site_settings`
- `page_contents`
- `footer_links`

### 1.7 Admin Dashboard

URL login admin:

```bash
/admin/login
```

Akun default hasil seeder:

```bash
Email: admin@mitqalhikam.test
Password: password
```

Catatan keamanan:

- Segera ubah password admin setelah deploy.
- Jangan gunakan password default di production.
- Pastikan `.env` production tidak ikut masuk Git.

### 1.8 Fitur Berita

Admin dapat mengelola:

- Judul
- Slug
- Kategori
- Ringkasan
- Konten
- Thumbnail atau path gambar
- Status draft/published
- Featured post
- Tanggal publish

Frontend menampilkan:

- Featured article
- Daftar artikel
- Search artikel
- Pagination
- Detail artikel
- Related posts

### 1.9 Fitur Galeri

Admin dapat mengelola:

- Judul foto
- Deskripsi
- Path/upload gambar
- Section tampil
- Urutan tampil
- Status aktif/nonaktif

Galeri tampil pada area dokumentasi kegiatan.

### 1.10 Fitur Konten Dinamis

Konten halaman dikelola melalui tabel `page_contents` dengan struktur:

- `page`
- `section`
- `field`
- `value`
- `type`

Contoh key konten:

- `home.hero.title`
- `home.hero.subtitle`
- `home.about.body`
- `about.hero.title`
- `program.hero.title`
- `contact.hero.subtitle`

### 1.11 Identitas Website dan Footer

Data identitas dikelola melalui `site_settings`, termasuk:

- Nama website
- Logo website
- Link pendaftaran PPDB
- Alamat footer
- Nomor telepon
- Email
- Deskripsi footer

Footer links dikelola melalui `footer_links`, termasuk:

- Quick links
- Instagram
- Facebook
- YouTube

### 1.12 Responsiveness dan UI/UX

Website harus:

- Mobile responsive
- Tablet responsive
- Desktop responsive
- Memiliki hamburger menu pada mobile
- Memiliki typography mobile yang aman
- Tidak memiliki floating button yang overlap
- Memakai footer konsisten di semua halaman
- Memiliki CTA PPDB yang jelas

### 1.13 Kebutuhan SEO dan Aksesibilitas

- Setiap halaman publik memiliki struktur heading yang jelas.
- News memiliki title dan meta description.
- Sitemap tersedia di `/sitemap.xml`.
- Gambar penting memiliki atribut `alt`.
- Navigasi dapat diakses melalui link semantik.

---

## 2. List Pengerjaan

### 2.1 Setup Project

- Membuat project Laravel 12.
- Mengatur koneksi database MySQL.
- Menyalin HTML desain awal ke Blade.
- Membuat route publik sesuai sitemap.
- Menambahkan Vite dan dependency frontend bawaan Laravel.

### 2.2 Konversi Frontend

- Konversi halaman `beranda.html` ke `resources/views/pages/home.blade.php`.
- Konversi halaman `tentang_kami.html` ke `resources/views/pages/about.blade.php`.
- Konversi halaman `program.html` ke `resources/views/pages/program.blade.php`.
- Konversi halaman `hubungi_kami.html` ke `resources/views/pages/contact.blade.php`.
- Konversi halaman `berita.html` ke `resources/views/news/index.blade.php`.
- Membuat halaman detail news `resources/views/news/show.blade.php`.

### 2.3 Database dan Model

- Membuat model `NewsPost`.
- Membuat model `ContactMessage`.
- Membuat model `Gallery`.
- Membuat model `SiteSetting`.
- Membuat model `PageContent`.
- Membuat model `FooterLink`.
- Menambahkan field admin pada `users`.
- Menambahkan field CMS pada `news_posts`.

### 2.4 Admin Dashboard CMS

- Membuat login admin custom.
- Membuat middleware `EnsureUserIsAdmin`.
- Membuat dashboard admin.
- Membuat CRUD berita.
- Membuat CRUD galeri.
- Membuat CRUD konten halaman.
- Membuat pengaturan website.
- Membuat CRUD footer links.
- Membuat daftar dan detail pesan kontak.

### 2.5 Integrasi CMS ke Frontend

- Menghubungkan logo dan nama website dari `site_settings`.
- Menghubungkan link PPDB dari `site_settings`.
- Menghubungkan footer description, kontak, dan footer links dari database.
- Menghubungkan konten hero dan section halaman dari `page_contents`.
- Menghubungkan berita dari `news_posts`.
- Menghubungkan galeri dari `galleries`.

### 2.6 Revisi Responsif dan Interaksi

- Mengganti CTA header mobile menjadi hamburger menu.
- Menambahkan smooth transition pada mobile menu.
- Merapikan floating button agar tidak overlap di mobile.
- Menambahkan spacing bawah pada hero mobile.
- Mengarahkan tombol `Pelajari Program Kami` ke `/program`.
- Membuat logo header klik ke `/`.
- Membuat tombol `Lihat Kurikulum` scroll ke section kurikulum.
- Membuat accordion kurikulum dapat dibuka/tutup.
- Menambahkan footer pada halaman News dan detail News.
- Mengganti placeholder map dengan iframe Google Maps.
- Menghapus section `Ikuti Perjalanan Kami`.
- Mengganti kolom footer `Legalitas` menjadi `Kontak`.

### 2.7 Testing dan Build

Perintah validasi yang sudah digunakan:

```bash
php artisan test
npm run build
git diff --check
php artisan route:list --except-vendor
```

---

## 3. Struktur Folder Penting

```bash
app/
├── Http/
│   ├── Controllers/
│   │   ├── Admin/
│   │   ├── ContactMessageController.php
│   │   └── NewsController.php
│   └── Middleware/
├── Models/

resources/
├── views/
│   ├── admin/
│   ├── news/
│   ├── pages/
│   └── partials/

public/
├── images/
│   ├── berita/
│   ├── galeri/
│   ├── logo.jpg
│   └── logo-al-hikam.svg

storage/
└── app/public/
```

---

## 4. Panduan Konfigurasi Project dari Clone GitHub

### 4.1 Prasyarat Server atau Local Machine

Pastikan tersedia:

```bash
php -v
composer --version
node -v
npm -v
mysql --version
```

Versi yang direkomendasikan:

- PHP 8.2 atau lebih baru
- Composer 2+
- Node.js 20+ atau lebih baru
- npm 10+ atau lebih baru
- MySQL 8 atau MariaDB kompatibel

### 4.2 Clone Repository

```bash
git clone https://github.com/USERNAME/NAMA-REPOSITORY.git
cd NAMA-REPOSITORY
```

Ganti `USERNAME/NAMA-REPOSITORY` dengan repository GitHub asli.

### 4.3 Install Dependency PHP

```bash
composer install
```

Jika untuk production:

```bash
composer install --no-dev --optimize-autoloader
```

### 4.4 Install Dependency JavaScript

```bash
npm install
```

### 4.5 Buat File Environment

```bash
cp .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

### 4.6 Konfigurasi Database

Buat database MySQL:

```sql
CREATE DATABASE mitqalhikam_laravel CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

Atur `.env`:

```env
APP_NAME="MITQ Al-Hikam"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mitqalhikam_laravel
DB_USERNAME=root
DB_PASSWORD=

PPDB_GOOGLE_FORM_URL=https://forms.gle/example-ppdb-mitq-al-hikam
```

Jika menggunakan XAMPP di macOS dan port MySQL default aktif, biasanya:

```env
DB_HOST=127.0.0.1
DB_PORT=3306
DB_USERNAME=root
DB_PASSWORD=
```

### 4.7 Jalankan Migrasi dan Seeder

```bash
php artisan migrate --seed
```

Jika ingin reset total database lokal:

```bash
php artisan migrate:fresh --seed
```

Seeder akan membuat:

- Admin default
- Data settings awal
- Konten halaman awal
- Footer links awal
- Galeri awal
- Berita awal

### 4.8 Buat Storage Symlink

Wajib untuk fitur upload dari admin dashboard:

```bash
php artisan storage:link
```

Kenapa diperlukan:

- Upload admin disimpan di `storage/app/public`.
- Browser mengakses file melalui `public/storage`.
- Tanpa `storage:link`, gambar upload logo/berita/galeri tidak tampil.

### 4.9 Build Asset Frontend

Untuk development:

```bash
npm run dev
```

Untuk production build:

```bash
npm run build
```

### 4.10 Jalankan Development Server

```bash
php artisan serve
```

Akses website:

```bash
http://127.0.0.1:8000
```

Akses admin:

```bash
http://127.0.0.1:8000/admin/login
```

Login default:

```bash
Email: admin@mitqalhikam.test
Password: password
```

### 4.11 Verifikasi Route

```bash
php artisan route:list --except-vendor
```

Route penting:

```bash
/
/tentang-kami
/program
/news
/news/{post}
/hubungi-kami
/admin/login
/admin
/sitemap.xml
```

### 4.12 Jalankan Test

```bash
php artisan test
```

Expected result:

```bash
Tests: 9 passed
```

Jumlah assertion dapat berubah jika test ditambahkan.

### 4.13 Bersihkan Cache Jika Ada Perubahan Config

```bash
php artisan optimize:clear
```

Untuk production setelah konfigurasi stabil:

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### 4.14 Permission Folder Production

Pastikan folder berikut writable oleh web server:

```bash
storage/
bootstrap/cache/
```

Contoh Linux server:

```bash
chmod -R 775 storage bootstrap/cache
```

Sesuaikan ownership dengan user web server, misalnya `www-data` di Ubuntu.

---

## 5. Panduan Deploy Singkat ke Hosting/VPS

1. Clone repository ke server.
2. Jalankan `composer install --no-dev --optimize-autoloader`.
3. Jalankan `npm install` dan `npm run build`.
4. Buat `.env` production.
5. Set `APP_ENV=production`.
6. Set `APP_DEBUG=false`.
7. Set database production.
8. Jalankan `php artisan key:generate` jika `APP_KEY` belum ada.
9. Jalankan `php artisan migrate --seed --force`.
10. Jalankan `php artisan storage:link`.
11. Arahkan document root web server ke folder `public/`.
12. Jalankan cache production.

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

## 6. Git Workflow yang Disarankan

Sebelum mengerjakan perubahan:

```bash
git status --short
```

Setelah mengubah file:

```bash
git diff
```

Jalankan validasi:

```bash
php artisan test
npm run build
git diff --check
```

Commit perubahan:

```bash
git add path/to/file
git commit -m "feat: add new cms feature"
```

Gunakan Conventional Commit:

- `feat:` fitur baru
- `fix:` perbaikan bug
- `style:` perubahan tampilan
- `refactor:` perapihan struktur
- `docs:` dokumentasi
- `chore:` maintenance
- `perf:` optimasi performa

---

## 7. Catatan Maintenance

- Ganti password admin default setelah setup.
- Update link PPDB dari admin dashboard.
- Update footer kontak dari admin dashboard.
- Upload logo melalui admin dashboard jika ingin mengganti brand asset.
- Gunakan gambar terkompresi untuk berita dan galeri agar website tetap cepat.
- Jalankan backup database berkala di production.
- Jangan commit file `.env`, `vendor/`, `node_modules/`, dan `public/storage`.

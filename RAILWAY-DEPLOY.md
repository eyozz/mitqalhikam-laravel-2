# Railway Deployment Notes

Project ini disiapkan untuk deploy Laravel 12 ke Railway dengan `railway.toml`.

## Railway Services

Gunakan tiga resource utama:

- App service: Laravel app, contoh nama service `web`
- MySQL service: database Railway, contoh nama service `MySQL`
- Volume: persistent storage untuk upload admin di `storage/app/public`

## Required Variables

Set pada App service:

```env
APP_NAME="MITQ Al-Hikam"
APP_ENV=production
APP_DEBUG=false
APP_URL=http://localhost
LOG_CHANNEL=stderr
DB_CONNECTION=mysql
DB_HOST=${{MySQL.MYSQLHOST}}
DB_PORT=${{MySQL.MYSQLPORT}}
DB_DATABASE=${{MySQL.MYSQLDATABASE}}
DB_USERNAME=${{MySQL.MYSQLUSER}}
DB_PASSWORD=${{MySQL.MYSQLPASSWORD}}
SESSION_DRIVER=database
CACHE_STORE=database
QUEUE_CONNECTION=database
FILESYSTEM_DISK=public
PPDB_GOOGLE_FORM_URL=https://forms.gle/example-ppdb-mitq-al-hikam
```

`APP_KEY` harus diisi dari:

```bash
php artisan key:generate --show
```

## Deploy Command

```bash
railway up --service web
```

## First Deploy Checklist

Setelah deploy pertama berhasil, jalankan seed sekali saja jika data default admin/settings dibutuhkan:

```bash
railway run --service web php artisan db:seed --force
```

Seeder tidak dijalankan otomatis pada setiap deploy agar data admin dan konten production tidak ter-reset.

## Persistent Uploads

Admin upload membutuhkan volume Railway karena filesystem app dapat berubah saat redeploy. Mount volume ke:

```text
/app/storage/app/public
```

Aplikasi menjalankan `php artisan storage:link || true` saat start agar file upload dapat diakses dari `public/storage`.

## Public Domain

Generate public domain dari Railway dashboard atau Railway CLI pada service Laravel, lalu update `APP_URL` ke domain final, misalnya `https://nama-domain.up.railway.app`.

# Panduan Lengkap Setup Hosting Laravel di cPanel

Panduan ini ditujukan khusus untuk meng-deploy aplikasi **BandungCoding** (Laravel 12) ke **Shared Hosting via cPanel** secara aman dan benar.

---

## Daftar Isi

1. [Persyaratan Hosting](#1-persyaratan-hosting)
2. [Persiapan di Lokal Sebelum Upload](#2-persiapan-di-lokal-sebelum-upload)
3. [Struktur Folder di Server](#3-struktur-folder-di-server)
4. [Upload & Ekstrak File](#4-upload--ekstrak-file)
5. [Pindahkan File Public ke `public_html`](#5-pindahkan-file-public-ke-public_html)
6. [Edit File `index.php`](#6-edit-file-indexphp)
7. [Buat Database MySQL di cPanel](#7-buat-database-mysql-di-cpanel)
8. [Konfigurasi File `.env`](#8-konfigurasi-file-env)
9. [Jalankan Migrasi & Seeder Database](#9-jalankan-migrasi--seeder-database)
10. [Setup Storage Symlink](#10-setup-storage-symlink)
11. [Konfigurasi `.htaccess`](#11-konfigurasi-htaccess)
12. [Atur Versi PHP di cPanel](#12-atur-versi-php-di-cpanel)
13. [Optimasi Cache Laravel](#13-optimasi-cache-laravel)
14. [Konfigurasi SSL (HTTPS)](#14-konfigurasi-ssl-https)
15. [Konfigurasi Email (SMTP)](#15-konfigurasi-email-smtp)
16. [Checklist Akhir Sebelum Go Live](#16-checklist-akhir-sebelum-go-live)
17. [Troubleshooting Umum](#17-troubleshooting-umum)

---

## 1. Persyaratan Hosting

Sebelum melanjutkan, pastikan paket hosting Anda memenuhi persyaratan berikut:

| Persyaratan          | Minimum          | Rekomendasi      |
|----------------------|------------------|------------------|
| PHP Version          | 8.2              | 8.3+             |
| MySQL Version        | 5.7              | 8.0+             |
| PHP Extensions       | `pdo_mysql`, `mbstring`, `openssl`, `tokenizer`, `xml`, `ctype`, `json`, `bcmath`, `fileinfo`, `curl`, `zip` | Semua aktif |
| File Manager         | Wajib ada        | -                |
| Terminal / SSH       | Opsional (sangat direkomendasikan) | SSH aktif |
| phpMyAdmin           | Wajib ada        | -                |
| Disk Space           | Min. 200 MB      | 500 MB+          |

---

## 2. Persiapan di Lokal Sebelum Upload

Lakukan langkah-langkah ini di komputer lokal Anda sebelum upload ke server:

### a. Build Aset Frontend
```bash
npm install
npm run build
```
Ini akan menghasilkan folder `public/build` yang berisi CSS/JS yang sudah dikompilasi.

### b. Instal Dependensi PHP (tanpa dev)
```bash
composer install --optimize-autoloader --no-dev
```

### c. Hapus File & Folder yang Tidak Perlu
Hapus folder/file berikut agar tidak ikut ter-upload (hemat kuota & menjaga keamanan):
- `node_modules/`
- `.git/`
- `storage/logs/*.log`
- `.env` (jangan ikut di-zip, buat manual di server)

### d. Buat File ZIP
Kompres seluruh folder project (kecuali yang dihapus di atas) menjadi satu file `.zip`.

Contoh nama file: `BandungCoding.zip`

---

## 3. Struktur Folder di Server

Setelah deploy, struktur di server hosting Anda akan seperti ini:

```
/home/username_cpanel/
│
├── public_html/              ← Document Root (domain utama)
│   ├── index.php             ← File ini dipindah & diedit dari /public
│   ├── .htaccess             ← File ini dipindah dari /public
│   ├── build/                ← Folder build Vite
│   ├── images/               ← Folder aset gambar publik
│   ├── hero-3d/              ← Folder aset 3D
│   ├── robots.txt
│   └── storage -> ...        ← Symlink ke storage Laravel
│
└── bandungcoding_app/        ← Core aplikasi Laravel (PRIVATE, di luar public_html)
    ├── app/
    ├── bootstrap/
    ├── config/
    ├── database/
    ├── resources/
    ├── routes/
    ├── storage/
    ├── vendor/
    ├── .env                  ← File konfigurasi (RAHASIA)
    └── artisan
```

> **PENTING:** Folder `bandungcoding_app` berada **satu level di atas** `public_html`. Ini adalah praktik terbaik keamanan Laravel agar file `.env` dan kode sumber tidak bisa diakses dari browser.

---

## 4. Upload & Ekstrak File

1. Login ke **cPanel** → buka **File Manager**.
2. Navigasi ke direktori **home root** (level yang sama dengan `public_html`, bukan di dalamnya).
3. Klik **Upload** dan unggah file `BandungCoding.zip`.
4. Setelah upload selesai, klik kanan file ZIP → klik **Extract**.
5. Setelah diekstrak, **rename** folder hasil ekstrak menjadi `bandungcoding_app`.

---

## 5. Pindahkan File Public ke `public_html`

1. Masuk ke folder `bandungcoding_app/public/`.
2. Pilih **semua file dan folder** di dalamnya (Ctrl+A / Select All).
3. Klik **Move** (Pindahkan).
4. Isi path tujuan dengan:
   ```
   /home/username_cpanel/public_html
   ```
   *(Ganti `username_cpanel` dengan username cPanel Anda yang sebenarnya)*
5. Klik **Move Files**.

---

## 6. Edit File `index.php`

File `index.php` sekarang ada di `public_html`. Karena core aplikasi sudah dipindah ke `bandungcoding_app`, path di dalam `index.php` harus diperbarui.

1. Di **File Manager**, buka `public_html/index.php`.
2. Klik **Edit**.
3. Cari dan ubah ketiga baris berikut:

**Baris ~32 — maintenance check:**
```php
// Ubah dari:
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {

// Menjadi:
if (file_exists($maintenance = __DIR__.'/../bandungcoding_app/storage/framework/maintenance.php')) {
```

**Baris ~34 — autoloader:**
```php
// Ubah dari:
require __DIR__.'/../vendor/autoload.php';

// Menjadi:
require __DIR__.'/../bandungcoding_app/vendor/autoload.php';
```

**Baris ~36 — bootstrap:**
```php
// Ubah dari:
$app = require_once __DIR__.'/../bootstrap/app.php';

// Menjadi:
$app = require_once __DIR__.'/../bandungcoding_app/bootstrap/app.php';
```

4. Klik **Save Changes**.

---

## 7. Buat Database MySQL di cPanel

1. Di cPanel, buka **MySQL Databases**.
2. **Buat Database Baru:**
   - Isi kolom *New Database*: `bandungcoding`
   - Klik **Create Database**
   - Database lengkapnya akan menjadi: `cpanelusername_bandungcoding`
3. **Buat User Database Baru:**
   - Isi *Username*: `bcuser`
   - Isi *Password*: (gunakan password yang kuat)
   - Klik **Create User**
4. **Hubungkan User ke Database:**
   - Di bagian *Add User to Database*, pilih user dan database yang baru saja dibuat.
   - Klik **Add**
   - Pada halaman privileges, centang **ALL PRIVILEGES**
   - Klik **Make Changes**

> **Catat:** Nama database dan username lengkap biasanya memiliki prefix username cPanel, contoh: `cpanelusername_bandungcoding` dan `cpanelusername_bcuser`.

---

## 8. Konfigurasi File `.env`

1. Di **File Manager**, navigasi ke folder `bandungcoding_app/`.
2. Buat file baru bernama `.env` (atau upload dari lokal).
3. Isi dengan konfigurasi berikut (sesuaikan nilainya):

```env
APP_NAME="BandungCoding"
APP_ENV=production
APP_KEY=                          # Akan diisi setelah menjalankan artisan key:generate
APP_DEBUG=false
APP_URL=https://nama-domain-anda.com
APP_LOCALE=id
APP_FALLBACK_LOCALE=en
APP_FAKER_LOCALE=id_ID

LOG_CHANNEL=stack
LOG_STACK=single
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=error

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=cpanelusername_bandungcoding
DB_USERNAME=cpanelusername_bcuser
DB_PASSWORD=password_db_anda

SESSION_DRIVER=file
SESSION_LIFETIME=120
SESSION_ENCRYPT=false

BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
QUEUE_CONNECTION=database
CACHE_STORE=file

MAIL_MAILER=smtp
MAIL_HOST=mail.nama-domain-anda.com
MAIL_PORT=465
MAIL_USERNAME=email@nama-domain-anda.com
MAIL_PASSWORD=password_email_anda
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS=email@nama-domain-anda.com
MAIL_FROM_NAME="BandungCoding"
```

> Nilai `APP_KEY` akan diisi setelah menjalankan perintah `php artisan key:generate` di langkah berikutnya.

---

## 9. Jalankan Migrasi & Seeder Database

### Opsi A: Menggunakan Terminal cPanel (Rekomendasi)

Jika hosting Anda memiliki fitur **Terminal** (cPanel → Terminal):

```bash
# Masuk ke folder aplikasi
cd ~/bandungcoding_app

# Generate APP_KEY
php artisan key:generate

# Jalankan migrasi dan seeder
php artisan migrate --force
php artisan db:seed --force

# Bersihkan cache
php artisan optimize:clear
```

### Opsi B: Import via phpMyAdmin

Jika tidak ada akses Terminal:

1. Di lokal, jalankan: `php artisan migrate --seed` untuk mengisi database lokal.
2. Buka **phpMyAdmin** lokal → pilih database → klik **Export** → format SQL → **Go**.
3. Di cPanel, buka **phpMyAdmin** → pilih database production yang sudah dibuat.
4. Klik tab **Import** → pilih file `.sql` yang tadi diekspor → klik **Go**.
5. Untuk `APP_KEY`: Buat file `keygen.php` sementara di `public_html`:
   ```php
   <?php
   require __DIR__.'/../bandungcoding_app/vendor/autoload.php';
   $app = require_once __DIR__.'/../bandungcoding_app/bootstrap/app.php';
   $key = 'base64:'.base64_encode(\Illuminate\Support\Str::random(32));
   echo $key;
   ```
   Akses via browser, salin key yang muncul, lalu isi ke `APP_KEY` di `.env`. **Segera hapus file ini setelah selesai.**

---

## 10. Setup Storage Symlink

Agar file upload (gambar portfolio, blog, dll.) bisa diakses publik, buat symlink dari `storage` ke `public_html`.

### Opsi A: Via Terminal cPanel

```bash
ln -s /home/username_cpanel/bandungcoding_app/storage/app/public /home/username_cpanel/public_html/storage
```

### Opsi B: Via File PHP Sementara

1. Buat file `public_html/symlink.php`:
   ```php
   <?php
   $targetFolder = $_SERVER['DOCUMENT_ROOT'] . '/../bandungcoding_app/storage/app/public';
   $linkFolder   = $_SERVER['DOCUMENT_ROOT'] . '/storage';

   if (is_link($linkFolder)) {
       echo 'Symlink sudah ada.';
   } elseif (symlink($targetFolder, $linkFolder)) {
       echo 'Symlink berhasil dibuat!';
   } else {
       echo 'Gagal membuat symlink. Hubungi provider hosting Anda.';
   }
   ```
2. Akses `https://nama-domain-anda.com/symlink.php` di browser.
3. **Segera hapus file `symlink.php`** setelah berhasil.

### Opsi C: Via Terminal — Artisan (jika PHP artisan bisa dijalankan)

```bash
cd ~/bandungcoding_app
php artisan storage:link --relative
```

---

## 11. Konfigurasi `.htaccess`

Pastikan file `.htaccess` berikut ada di `public_html`. File ini sudah seharusnya ada setelah dipindah dari `public/`, namun verifikasi isinya sudah benar:

```apache
<IfModule mod_rewrite.c>
    <IfModule mod_negotiation.c>
        Options -MultiViews -Indexes
    </IfModule>

    RewriteEngine On

    # Handle Authorization Header
    RewriteCond %{HTTP:Authorization} .
    RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]

    # Redirect Trailing Slashes If Not A Folder...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_URI} (.+)/$
    RewriteRule ^ %1 [L,R=301]

    # Send Requests To Front Controller...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]
</IfModule>
```

Jika situs tidak bisa diakses atau muncul error 404, tambahkan baris berikut di bagian paling atas `.htaccess`:

```apache
Options -Indexes
Options +FollowSymLinks
```

---

## 12. Atur Versi PHP di cPanel

1. Di cPanel, cari menu **Select PHP Version** atau **MultiPHP Manager**.
2. Pilih domain Anda.
3. Atur versi PHP ke **8.2** atau **8.3**.
4. Pastikan ekstensi berikut **aktif** (centang):
   - `pdo_mysql`
   - `mbstring`
   - `openssl`
   - `tokenizer`
   - `xml`
   - `ctype`
   - `json`
   - `bcmath`
   - `fileinfo`
   - `curl`
   - `zip`
   - `intl`
5. Klik **Save**.

---

## 13. Optimasi Cache Laravel

Jalankan perintah ini via **Terminal cPanel** setelah semua konfigurasi selesai:

```bash
cd ~/bandungcoding_app

# Cache konfigurasi (percepat loading)
php artisan config:cache

# Cache route
php artisan route:cache

# Cache view
php artisan view:cache

# Atau jalankan semua sekaligus:
php artisan optimize
```

> **Catatan:** Setiap kali Anda mengubah file `.env` atau konfigurasi apapun, jalankan `php artisan optimize:clear` lalu `php artisan optimize` kembali.

---

## 14. Konfigurasi SSL (HTTPS)

1. Di cPanel, buka menu **SSL/TLS** → **Let's Encrypt™ SSL** (atau **AutoSSL**).
2. Pilih domain Anda dan klik **Issue/Renew Certificate**.
3. Tunggu hingga sertifikat SSL aktif.
4. Pastikan `APP_URL` di `.env` sudah menggunakan `https://`.
5. Untuk memaksa redirect HTTP ke HTTPS, tambahkan di bagian atas `.htaccess`:
   ```apache
   RewriteEngine On
   RewriteCond %{HTTPS} off
   RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
   ```

---

## 15. Konfigurasi Email (SMTP)

Untuk fitur pengiriman email (Contact Form, Notifikasi, dll.), konfigurasikan SMTP di `.env`:

### Menggunakan Email Hosting (cPanel Email)
```env
MAIL_MAILER=smtp
MAIL_HOST=mail.nama-domain-anda.com
MAIL_PORT=465
MAIL_USERNAME=no-reply@nama-domain-anda.com
MAIL_PASSWORD=password_email_anda
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS=no-reply@nama-domain-anda.com
MAIL_FROM_NAME="BandungCoding"
```

### Menggunakan Gmail
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=emailanda@gmail.com
MAIL_PASSWORD=xxxx_xxxx_xxxx_xxxx   # App Password Gmail (bukan password biasa)
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=emailanda@gmail.com
MAIL_FROM_NAME="BandungCoding"
```

> Untuk Gmail, aktifkan **2-Factor Authentication** lalu buat **App Password** di pengaturan akun Google.

---

## 16. Checklist Akhir Sebelum Go Live

Gunakan checklist ini untuk memastikan semua sudah beres:

- [ ] `npm run build` sudah dijalankan di lokal
- [ ] `composer install --no-dev` sudah dijalankan di lokal
- [ ] File ZIP sudah diupload dan diekstrak menjadi `bandungcoding_app/`
- [ ] File dari `public/` sudah dipindah ke `public_html/`
- [ ] `index.php` sudah diedit dengan path yang benar
- [ ] Database MySQL sudah dibuat di cPanel
- [ ] User database sudah dibuat dan dihubungkan dengan `ALL PRIVILEGES`
- [ ] File `.env` sudah dibuat dan dikonfigurasi di `bandungcoding_app/`
- [ ] `APP_DEBUG=false` sudah diset di `.env`
- [ ] `APP_ENV=production` sudah diset di `.env`
- [ ] `APP_KEY` sudah terisi (tidak kosong)
- [ ] `APP_URL` sudah menggunakan domain yang benar dengan `https://`
- [ ] Migrasi dan seeder sudah dijalankan
- [ ] Storage symlink sudah dibuat
- [ ] Versi PHP di cPanel sudah diset ke 8.2+
- [ ] Ekstensi PHP yang diperlukan sudah aktif
- [ ] SSL/HTTPS sudah aktif
- [ ] `php artisan optimize` sudah dijalankan
- [ ] Halaman utama bisa diakses tanpa error
- [ ] Login admin bisa dilakukan
- [ ] Form kontak bisa mengirim email
- [ ] File/gambar bisa diupload dan ditampilkan

---

## 17. Troubleshooting Umum

### ❌ Error 500 (Internal Server Error)
- Cek file `bandungcoding_app/storage/logs/laravel.log` untuk detail error.
- Set sementara `APP_DEBUG=true` di `.env` untuk melihat pesan error di browser.
- **Setelah masalah teratasi, kembalikan ke `APP_DEBUG=false`.**
- Pastikan folder `storage/` dan `bootstrap/cache/` memiliki permission **755** atau **775**.
  ```bash
  chmod -R 755 ~/bandungcoding_app/storage
  chmod -R 755 ~/bandungcoding_app/bootstrap/cache
  ```

### ❌ Error 404 pada Semua Halaman (kecuali homepage)
- Pastikan file `.htaccess` sudah ada di `public_html/`.
- Pastikan `mod_rewrite` aktif di server.
- Coba tambahkan `Options +FollowSymLinks` di `.htaccess`.

### ❌ Error: `No such file or directory` saat artisan dijalankan
- Pastikan Anda berada di direktori yang benar: `cd ~/bandungcoding_app`
- Pastikan path di `index.php` sudah benar.

### ❌ Gambar / File Upload Tidak Muncul
- Pastikan symlink storage sudah dibuat dengan benar.
- Verifikasi dengan: `ls -la ~/public_html/storage`
- Jika symlink rusak, hapus dan buat ulang.

### ❌ Error Database: `SQLSTATE[HY000] [2002] Connection refused`
- Pastikan `DB_HOST=localhost` (bukan `127.0.0.1`) di cPanel.
- Verifikasi nama database dan username sudah menggunakan prefix cPanel (contoh: `cpanelusername_namadb`).
- Pastikan user sudah dihubungkan ke database dengan `ALL PRIVILEGES`.

### ❌ Halaman Kosong / Blank White Screen
- Cek `storage/logs/laravel.log`.
- Pastikan `APP_KEY` tidak kosong di `.env`.
- Jalankan `php artisan config:clear` untuk menghapus cache konfigurasi lama.

### ❌ CSS/JS Tidak Muncul (Tampilan Rusak)
- Pastikan folder `public/build/` sudah dipindah ke `public_html/build/`.
- Pastikan `APP_URL` di `.env` sudah benar (termasuk `https://`).
- Jalankan `php artisan optimize:clear` untuk menghapus cache view.

---

## Kontak & Support

Jika menemui kendala yang tidak tercakup dalam panduan ini, pastikan untuk:
1. Membaca log error di `bandungcoding_app/storage/logs/laravel.log`.
2. Memeriksa dokumentasi resmi Laravel: [https://laravel.com/docs](https://laravel.com/docs).
3. Menghubungi tim support provider hosting Anda.

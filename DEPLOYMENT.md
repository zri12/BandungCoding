# Panduan Setup & Deployment BandungCoding

Dokumen ini berisi panduan untuk melakukan setup database di environment lokal, cara meng-compile aset (CSS/JS), serta panduan aman untuk men-deploy aplikasi Laravel 12 ini ke Shared Hosting menggunakan cPanel.

---

## 1. Panduan Setup Database (Lokal)

1. **Buat Database**
   Buat database MySQL kosong melalui alat bantu seperti phpMyAdmin, DBeaver, atau TablePlus. Beri nama database tersebut, misalnya `bandungcoding`.

2. **Konfigurasi File `.env`**
   - Jika file `.env` belum ada, duplikat file `.env.example` lalu ubah namanya menjadi `.env`.
   - Buka file `.env` dan sesuaikan blok koneksi database berikut:
     ```env
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=bandungcoding
     DB_USERNAME=root
     DB_PASSWORD=
     ```
   *(Sesuaikan `DB_USERNAME` dan `DB_PASSWORD` dengan konfigurasi MySQL lokal Anda, biarkan password kosong jika menggunakan XAMPP standar).*

3. **Jalankan Migrasi dan Seeder**
   Buka terminal/command prompt di dalam folder project Anda, lalu jalankan perintah berikut untuk membuat struktur tabel dan mengisi data awal (dummy):
   ```bash
   php artisan migrate:fresh --seed
   ```

---

## 2. Panduan Compile Assets (Frontend)

Project ini menggunakan **Vite** dan **TailwindCSS v4**.

1. **Instal Dependensi NPM**
   Pastikan Node.js sudah terinstal, kemudian jalankan:
   ```bash
   npm install
   ```

2. **Mode Development**
   Saat sedang melakukan proses coding (mengubah file Blade, CSS, atau JS), jalankan server Vite:
   ```bash
   npm run dev
   ```
   *Terminal ini harus dibiarkan menyala agar live-reload berjalan.*

3. **Mode Production (Wajib Sebelum Deploy)**
   **PENTING:** Anda harus mem-build aset sebelum file diupload ke production server. Proses ini akan mengoptimasi dan meng-compile file secara statis dan otomatis membuat folder `public/build`.
   ```bash
   npm run build
   ```

---

## 3. Panduan Setup Hosting di cPanel

Deploy aplikasi Laravel ke Shared Hosting memerlukan praktik keamanan yang baik agar file `.env` dan core Laravel tidak berisiko terekspos ke publik. **Jangan pernah mengupload semua file Laravel langsung ke dalam folder `public_html` secara membabi buta.**

### A. Persiapan File di Lokal
1. Pastikan Anda telah menjalankan `npm run build`.
2. Hapus direktori sampah seperti `node_modules` (tidak perlu di-upload).
3. Jadikan seluruh folder project Anda menjadi satu file `.zip` (misalnya: `BandungCoding.zip`).

### B. Upload & Ekstrak di cPanel
1. Login ke cPanel akun hosting Anda, lalu buka menu **File Manager**.
2. **Untuk Core Application:**
   - Di tampilan awal File Manager (sejajar dengan folder `public_html`), buat folder baru. Misalnya beri nama `bandungcoding_app`.
   - Masuk ke folder `bandungcoding_app`, upload file `BandungCoding.zip`, lalu ekstrak di sana.
3. **Untuk File Public:**
   - Masuk ke dalam folder `bandungcoding_app/public`.
   - Pilih semua file dan folder (Select All), lalu klik *Move*. Pindahkan semuanya ke dalam folder `public_html` (atau direktori document root untuk domain Anda).

### C. Menyesuaikan Path di `index.php`
Karena file `index.php` sekarang berada di `public_html` sedangkan core aplikasi ada di `bandungcoding_app`, kita harus memperbaiki jalurnya (path).
1. Buka folder `public_html`.
2. Edit file `index.php`.
3. Cari dan ubah 2 baris *require* berikut (sesuaikan nama foldernya):

**Ubah Baris (sekitar baris 32):**
```php
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
```
**Menjadi:**
```php
if (file_exists($maintenance = __DIR__.'/../bandungcoding_app/storage/framework/maintenance.php')) {
```

**Ubah Baris (sekitar baris 34):**
```php
require __DIR__.'/../vendor/autoload.php';
```
**Menjadi:**
```php
require __DIR__.'/../bandungcoding_app/vendor/autoload.php';
```

**Ubah Baris (sekitar baris 36):**
```php
$app = require_once __DIR__.'/../bootstrap/app.php';
```
**Menjadi:**
```php
$app = require_once __DIR__.'/../bandungcoding_app/bootstrap/app.php';
```
Simpan file tersebut.

### D. Konfigurasi `.env` untuk Production
Buka folder `bandungcoding_app` dan edit file `.env`:
1. Ubah settingan persekitaran (Environment):
   ```env
   APP_ENV=production
   APP_DEBUG=false
   APP_URL=https://nama-domain-anda.com
   ```
2. Sesuaikan konfigurasi Database. Di cPanel, Anda perlu membuat *MySQL Database* dan *MySQL User*, lalu hubungkan user ke database dengan hak akses penuh (*All Privileges*).
   ```env
   DB_DATABASE=prefix_namadb
   DB_USERNAME=prefix_namauser
   DB_PASSWORD=password_db_anda
   ```

### E. Eksekusi Database (Migrasi/Import)
- **Opsi 1 (Terminal cPanel):** Jika paket hosting Anda menyediakan menu "Terminal", masuk ke folder aplikasi dan jalankan sintaks berikut:
  ```bash
  cd bandungcoding_app
  php artisan migrate --force
  php artisan db:seed --force
  php artisan optimize:clear
  ```
- **Opsi 2 (Export-Import via phpMyAdmin):** Buka phpMyAdmin di localhost, ekspor database `bandungcoding`. Selanjutnya, buka phpMyAdmin di cPanel dan impor file `.sql` tersebut ke database production yang telah dibuat.

### F. Setup Storage Symlink (Opsional untuk Fitur Upload)
Agar file yang diunggah dapat diakses, kita perlu membuat symlink dari foldar `storage` ke `public_html`.
- Jika Anda memiliki akses Terminal di cPanel, cukup jalankan perintah berikut dari root pengguna atau public_html:
  ```bash
  ln -s /home/username_cpanel/bandungcoding_app/storage/app/public /home/username_cpanel/public_html/storage
  ```
- Jika tidak punya akses Terminal, buat sebuah file PHP di dalam `public_html` dengan nama `symlink.php`, lalu sisipkan kode ini:
  ```php
  <?php
  $targetFolder = $_SERVER['DOCUMENT_ROOT'].'/../bandungcoding_app/storage/app/public';
  $linkFolder = $_SERVER['DOCUMENT_ROOT'].'/storage';
  symlink($targetFolder, $linkFolder);
  echo 'Symlink process successfully completed';
  ?>
  ```
  Akses file dari web browser Anda (misalnya: `https://nama-domain-anda.com/symlink.php`). Jika muncul pesan sukses, **segera hapus file symlink.php** untuk keamanan.

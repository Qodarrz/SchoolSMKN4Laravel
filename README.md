# Tugas Sekolah - Aplikasi Akademik & Penjualan (Laravel)

Sistem Informasi Manajemen Sekolah dan Penjualan sederhana yang dibangun menggunakan framework **Laravel 8**. Proyek ini mencakup pengelolaan data master akademik (seperti Guru, Siswa, Kelas, Mata Pelajaran) serta modul transaksi penjualan yang disertai rekapitulasi cetak laporan berbasis PDF.

## 🚀 Fitur Utama

Aplikasi ini menggunakan sistem *Role-Based Access Control* (Middleware Access) dengan beberapa tingkat *role*:

1. **Admin (`middleware: admin`)**
   - Mengelola data **Guru** (Tambah, Update, Hapus, Detail)
   - Mengelola data **Siswa**

2. **User (`middleware: user`)**
   - Melihat histori **Penjualan**
   - Mencetak laporan penjualan dan struk ke dalam format layar atau PDF (menggunakan *library* `dompdf`).

3. **Penjualan (`middleware: penjualan`)**
   - Mengelola data pelanggan / kostumer (**Pelanggan**).

## 📂 Struktur Repositori

- `project1/` : Kode utama (source code) aplikasi backend web berbasis Laravel 8.
- `SQLSekolah.sql` : Berkas _dump_ database SQL beserta _dummy data_ terintegrasi yang harus diimpor agar aplikasi dapat berjalan dengan normal.

## 🛠️ Persyaratan Sistem

- **PHP** `^7.3` atau `^8.0`
- **Composer** (untuk dependensi backend)
- **MySQL** / MariaDB (Disarankan menggunakan XAMPP/Laragon)

## ⚙️ Cara Instalasi & Penggunaan

1. **Buka folder proyek Laravel** di terminal/command line:
   ```bash
   cd /path/to/LaravelSekolah/project1
   ```

2. **Install dependensi PHP** menggunakan Composer:
   ```bash
   composer install
   ```

3. **Salin file konfigurasi environment (.env):**
   ```bash
   cp .env.example .env
   ```
   Atau Anda bisa menyalinnya secara manual dari _File Explorer_.

4. **Siapkan Database MySQL:**
   - Jalankan MySQL server Anda via XAMPP / Laragon.
   - Buat database baru (contoh nama: `laravel8`).
   - Lakukan **Import** file `SQLSekolah.sql` (yang ada di dalam root repository) ke dalam database tersebut. File ini sudah berisi skema keseluruhan tabel dan data awal akun akses.
   - Buka kembali file `.env` di dalam direktori `project1/` lalu ubah konfigurasi agar menunjuk ke database Anda:
     ```env
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=laravel8   # (sesuaikan dengan nama DB yang dibuat)
     DB_USERNAME=root       # (sesuaikan user)
     DB_PASSWORD=           # (kosongkan jika tidak ada password)
     ```

5. **Generate Application Key:**
   ```bash
   php artisan key:generate
   ```

6. **Jalankan Development Server:**
   ```bash
   php artisan serve
   ```
   Aplikasi dapat diakses di browser kesayangan Anda di URL `http://localhost:8000/`.

## 📦 Dependensi Pihak Ketiga
Aplikasi ini sudah dilengkasi dengan beberapa dependensi _third-party_ yang sudah tersetting dan digunakan:
- `dompdf/dompdf` untuk meng-*generate* halaman web HTML menjadi dokumen `.pdf`.
- `laravel/ui` untuk *scaffolding* standar tampilan login dan register bawaan.

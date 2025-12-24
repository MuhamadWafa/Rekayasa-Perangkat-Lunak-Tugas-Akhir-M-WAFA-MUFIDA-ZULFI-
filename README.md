# Gitar Tuning
# Muhamad Wafa Mufida Zulfi
# 312410334
# TI. 24. A4
# Karina Imelda, S. Kom., M.Kom.
# Rekayasa Perangkat Lunak
## Laporan Pengerjaan Proyek: UPIT TUNING
Dalam mengembangkan aplikasi web UPIT TUNING (Aplikasi Tuning Instrumen Musik), saya menggunakan kombinasi teknologi web development standar industri untuk memastikan aplikasi berjalan dengan fungsional dan memiliki tampilan yang responsif.

### 1. Teknologi yang Digunakan (Tech Stack)
PHP: Digunakan sebagai bahasa pemrograman di sisi server (back-end). Berdasarkan kode di index.php, PHP menangani logika autentikasi login, sesi pengguna (session_start), dan komunikasi dengan database menggunakan ekstensi mysqli.

MySQL: Digunakan sebagai sistem manajemen database (RDBMS). Terlihat dari struktur tabel di phpMyAdmin, database gitartuning memiliki 5 tabel utama: instrumen, lagu, materi, riwayat_tuning, dan users.

CSS (Bootstrap): Untuk tampilan (front-end), saya menggunakan CSS yang dibantu dengan framework Bootstrap 5 (terlihat dari link CDN di bagian <head>). Hal ini memberikan tampilan yang modern, bersih, dan kartu-kartu menu yang rapi pada halaman dashboard.

### 2. Tools & Lingkungan Pengembangan
Visual Studio Code (VS Code): Saya menggunakan VS Code sebagai code editor utama. Editor ini memudahkan saya dalam mengelola struktur folder proyek (seperti folder assets, config, includes) serta melakukan pengkodean dengan fitur syntax highlighting yang jelas.

XAMPP: Saya menggunakan XAMPP sebagai perangkat lunak local server. XAMPP menjalankan Apache untuk mengeksekusi skrip PHP dan MySQL untuk mengelola database lokal melalui antarmuka phpMyAdmin yang diakses via browser.

### 3. Fitur Utama yang Dikembangkan
Berdasarkan struktur file dan database, aplikasi ini memiliki beberapa fitur kunci:

Sistem Login: Keamanan akses menggunakan verifikasi username dan password.

Dashboard Interaktif: Menu pilihan alat musik (Gitar, Bass, Ukulele).

Manajemen Konten: Tabel untuk menyimpan data lagu dan materi pembelajaran tuning.

Riwayat Tuning: Fitur untuk mencatat aktivitas tuning yang telah dilakukan oleh pengguna.

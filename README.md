# Gitar Tuning
# Muhamad Wafa Mufida Zulfi
# 312410334
# TI. 24. A4
# Karina Imelda, S. Kom., M.Kom.
# Rekayasa Perangkat Lunak
# 🚀 Laporan Pengembangan Proyek: UPIT TUNING
### Saya telah menyelesaikan pengembangan aplikasi web UPIT TUNING dengan mengintegrasikan berbagai teknologi pengembangan modern untuk menciptakan pengalaman pengguna yang optimal.
# 🛠️ Teknologi yang Digunakan
### 🐘 PHP: Digunakan sebagai mesin utama di sisi server (back-end). Berdasarkan file index.php, PHP mengelola logika bisnis seperti sistem login, manajemen session pengguna, serta pengolahan data dinamis dari database.

### 🗄️ MySQL: Berperan sebagai pusat penyimpanan data. Melalui database gitartuning, saya mengelola 5 tabel utama (instrumen, lagu, materi, riwayat_tuning, dan users) untuk memastikan data tersimpan secara terstruktur.

### 🎨 CSS (Bootstrap 5): Untuk sisi visual, saya menggunakan CSS dengan bantuan framework Bootstrap. Ini memberikan tampilan antarmuka yang bersih, kartu menu yang modern pada dashboard, dan desain yang responsif di berbagai perangkat.

# 💻 Tools & Lingkungan Pengembangan
### 📝 Visual Studio Code: Saya menggunakan VS Code sebagai editor kode andalan. Dengan fitur IntelliSense dan struktur folder yang rapi, proses penulisan kode PHP dan CSS menjadi lebih efisien dan terorganisir.

### 🧡 XAMPP: Sebagai local server pilihan, XAMPP memungkinkan saya menjalankan Apache dan MySQL secara bersamaan. Saya juga memanfaatkan phpMyAdmin untuk memantau dan mengelola struktur database secara langsung.

# ✨ Fitur Utama Aplikasi
### 🔐 Autentikasi User: Sistem login yang aman untuk memvalidasi akses pengguna.

### 🎸 Multi-Instrument: Pilihan tuning untuk berbagai alat musik seperti Gitar, Bass, dan Ukulele.

### 📚 Modul Pembelajaran: Menyediakan materi dan daftar lagu untuk membantu pengguna belajar tuning dengan lebih mudah.

### 📜 Log Riwayat: Menyimpan data aktivitas tuning yang telah dilakukan oleh pengguna.

# 📂 Struktur Proyek: GITARTUNING
### Berikut adalah visualisasi struktur folder dan file dari proyek GITARTUNING yang telah disusun secara sistematis:
```
GITARTUNING/
│
├── 📂 assets/
│   └── 📂 css/
│       └── 📄 style.css               # Mengatur tampilan dan estetika aplikasi
│
├── 📂 config/
│   └── 🐘 koneksi.php                # Jembatan penghubung antara PHP dan database MySQL
│
├── 📂 includes/
│   ├── 🐘 footer.php                 # Berisi elemen kaki halaman yang konsisten
│   └── 🐘 header.php                 # Berisi elemen navigasi dan bagian atas halaman
│
├── 🐘 dashboard.php                  # Panel utama pengguna untuk memilih alat musik
├── 🐘 index.php                      # Gerbang utama aplikasi dan sistem login
├── 🐘 lagu.php                       # Menampilkan daftar koleksi lagu yang tersedia
├── 🐘 logout.php                     # Proses untuk keluar dari akun secara aman
├── 🐘 materi.php                     # Pusat informasi dan materi pembelajaran tuning
├── 🐘 riwayat.php                    # Rekam jejak aktivitas tuning yang pernah dilakukan
├── 🐘 tuning.php                     # Antarmuka utama untuk proses tuning instrumen
├── 🐘 view_chord.php                 # Halaman detail untuk melihat struktur chord
└── 🐘 view_materi.php                # Halaman pembaca konten materi edukasi
```

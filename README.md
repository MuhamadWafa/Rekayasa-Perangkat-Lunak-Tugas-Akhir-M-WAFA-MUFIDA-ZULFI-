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

# 🔐 Halaman Login UPIT
### Gambar tersebut adalah menu login atau pintu masuk utama ke aplikasi GITAR TUNING.
### Fungsi: Digunakan untuk memvalidasi identitas pengguna agar bisa masuk ke sistem. 
### Input: Pengguna perlu memasukkan Username dan Password yang terdaftar. 
### Keamanan: Berdasarkan kode programnya, sistem akan memeriksa kecocokan data di database sebelum mengizinkan akses ke halaman dashboard.
<img width="1918" height="1126" alt="Cuplikan layar 2025-12-25 025046" src="https://github.com/user-attachments/assets/a116a7f5-f0d3-47dc-ac37-26095b831836" />

# 🏠 Menu Utama / Dashboard UPIT TUNING
### Ini adalah halaman Dashboard atau tampilan utama setelah pengguna berhasil masuk ke dalam aplikasi.
### 👋 Sapaan Pengguna: Terdapat pesan selamat datang "Halo, admin!" yang menandakan pengguna telah berhasil login.
### 🎸 Pilihan Alat Musik: Menu utama menyajikan tiga kartu pilihan instrumen, yaitu Gitar, Bass, dan Ukulele.
### 🛠️ Fitur Interaktif: Setiap alat musik memiliki tombol "Mulai Tuning" untuk memulai proses penyeteman dan tombol "Materi Pembelajaran" untuk edukasi.
### 🧭 Navigasi Atas: Terdapat bar navigasi untuk mengakses menu lain seperti Pilih Alat, Materi, Daftar Lagu, dan tombol Logout untuk keluar dari aplikasi.
<img width="1919" height="1137" alt="Cuplikan layar 2025-12-25 023529" src="https://github.com/user-attachments/assets/487059fd-3693-47f8-9e54-495b9de85eaa" />

# 🎸 Tuning Gitar: 
### 🎸 Tuning Gitar: Halaman khusus untuk melakukan penyeteman nada pada instrumen gitar.
### 🎙️ Akses Mikrofon: Sistem memerlukan izin akses mikrofon untuk mendeteksi frekuensi nada secara real-time.
### ✅ Tombol Mulai: Pengguna cukup menekan tombol "MULAI TUNING" untuk mengaktifkan pendeteksi nada.
<img width="1878" height="930" alt="Cuplikan layar 2025-12-25 025656" src="https://github.com/user-attachments/assets/d166d00a-05d3-4b09-bf04-e96927b654ee" />





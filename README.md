Peaky Blinders Web - Responsi 2 Pemrograman Web
Website ini adalah aplikasi berbasis web yang bertema serial TV populer, Peaky Blinders. Proyek ini dikembangkan sebagai bagian dari tugas Responsi 2 Pemrograman Web. Aplikasi ini memuat informasi karakter, fitur otentikasi pengguna, dan mini-game interaktif (Roleplay) berbasis cerita.

📋 Fitur Utama
1. Sistem Otentikasi (User Management)
Registrasi & Login: Pengguna dapat mendaftar akun baru dan masuk ke dalam sistem.

Admin Dashboard: Halaman khusus untuk administrator (admin_dashboard.php).

Logout: Fitur keamanan untuk keluar dari sesi.

2. Ensiklopedia Karakter
Daftar Karakter: Menampilkan profil karakter-karakter utama dari Peaky Blinders (Thomas Shelby, Arthur, Polly, dll).

Biografi Detail: Halaman detail untuk setiap karakter (char_bio.php).

3. Roleplay Mission (Mini-Game)
Fitur interaktif "Choose Your Own Adventure" di mana pengguna dapat bermain peran:

Kustomisasi: Memilih Avatar (choose_avatar.php) dan memasukkan nama panggilan (insert_name.php).

Story Mode: Mengikuti jalan cerita dengan narasi interaktif (rp_story.php).

Pilihan (Choices): Pemain harus membuat keputusan yang akan mempengaruhi hasil cerita (rp_choices.php).

Win/Lose State: Terdapat halaman khusus jika pemain menang (rp_winner.php) atau kalah/game over (rp_gameover.php).

4. Antarmuka (UI)
Desain responsif dengan tema vintage khas 1920-an (Birmingham).

Menggunakan font kustom (Lucida Fax, Metal Mania) untuk memperkuat atmosfer.

🛠️ Teknologi yang Digunakan
Bahasa Pemrograman: PHP (Native)

Basis Data: MySQL

Frontend: HTML5, CSS3 (File CSS terpisah untuk setiap halaman agar modular)

Server Environment: XAMPP / Apache

📂 Struktur Folder
/
├── assets/
│   ├── css/            # Kumpulan file styling (.css)
│   ├── db/             # File database SQL (peakyblinders_db.sql)
│   ├── Font/           # Font kustom (TTF)
│   ├── img/            # Aset gambar (Avatar, Karakter, Background)
│   └── js/             # Script JavaScript
├── config/
│   └── koneksi.php     # Konfigurasi koneksi database
├── includes/
│   └── function.php    # Fungsi-fungsi bantuan PHP
├── admin_dashboard.php # Halaman Admin
├── index.php           # Halaman Utama (setelah login)
├── login.php           # Halaman Masuk
├── registrasi.php      # Halaman Daftar
├── start.php           # Halaman Awal (Landing)
├── roleplay_mission.php# Halaman Misi Game
└── ... (file PHP lainnya)
🚀 Cara Instalasi dan Menjalankan Project
Ikuti langkah-langkah berikut untuk menjalankan website ini di komputer lokal (Localhost):

Persiapan Lingkungan:

Pastikan Anda telah menginstal XAMPP atau aplikasi server lokal sejenis.

Clone/Download:

Unduh source code ini dan letakkan folder proyek di dalam direktori htdocs (biasanya di C:\xampp\htdocs\nama_folder_proyek).

Import Database:

Buka browser dan akses http://localhost/phpmyadmin.

Buat database baru (misalnya: peakyblinders_db atau sesuaikan dengan nama di koneksi.php).

Pilih database tersebut, lalu klik menu Import.

Pilih file assets/db/peakyblinders_db.sql dari folder proyek, lalu klik Go/Kirim.

Konfigurasi Koneksi (Jika perlu):

Buka file config/koneksi.php.

Pastikan pengaturan host, username, password, dan nama database sudah sesuai dengan pengaturan XAMPP Anda.

Jalankan Website:

Buka browser dan kunjungi: http://localhost/nama_folder_proyek/first_page.php atau start.php.

👤 Author / Pengembang
Nama/ID: Al_H1D024095

Project: Responsi 2 Pemrograman Web

By Order of the Peaky Blinders.

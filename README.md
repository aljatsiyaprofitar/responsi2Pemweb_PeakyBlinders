Al Jatsiya Profitar Taqwala - H1D024095
Muhammad Hudzayfa Ismail - H1D024082
Talitha Maharani Nashier - H1D024098

# 🥃 Peaky Blinders Web App

> *"By order of the Peaky Blinders."*

Project ini adalah aplikasi web interaktif yang dibangun sebagai tugas **Responsi 2 Pemrograman Web**. Web ini tidak hanya menampilkan informasi karakter, tapi juga memiliki fitur *Roleplay Mini-Game* di mana user bisa menentukan jalan ceritanya sendiri.

## 🌟 Fitur Unggulan

### 1. 🎭 Roleplay Mission (Mini-Game)
Fitur utama yang membuat web ini beda. User diajak masuk ke dunia 1920-an Birmingham:
* **Choose Your Avatar:** Pilih tampilan karaktermu sendiri.
* **Interactive Story:** Alur cerita bercabang (Choose Your Own Adventure).
* **Win/Lose Scenarios:** Keputusanmu menentukan apakah kamu diterima di keluarga Shelby atau berakhir *Game Over*.

### 2. 👥 Character Encyclopedia
* Galeri lengkap keluarga Shelby dan kerabatnya.
* Halaman detail biografi untuk setiap karakter utama.

### 3. 🔐 User Management
* **Sign Up & Login:** Sistem registrasi user member.
* **Admin Dashboard:** Halaman khusus admin untuk pengelolaan data.
* **Session Management:** Keamanan akses halaman menggunakan session PHP.

### 4. 🎨 UI/UX Theme
* Desain *vintage* & *gloomy* khas serial TV Peaky Blinders.
* Menggunakan font kustom (Lucida Fax, Metal Mania) untuk memperkuat atmosfer.
* Full CSS Native (tanpa framework CSS) untuk fleksibilitas desain.

---

## 🛠️ Tech Stack

Project ini dibangun menggunakan teknologi *native* untuk pemahaman mendalam tentang konsep dasar web:

* **Backend:** PHP 
* **Database:** MySQL
* **Frontend:** HTML5, CSS3, JavaScript (Vanilla)
* **Server:** Apache (XAMPP)

---

## 📂 Struktur Folder

```text
/
├── assets/
│   ├── css/            # Styling per halaman
│   ├── db/             # File SQL (peakyblinders_db.sql)
│   ├── Font/           # Font typography kustom
│   ├── img/            # Aset gambar karakter & background
│   └── js/             # Script validasi login/regis
├── config/
│   └── koneksi.php     # Konfigurasi database
├── admin_dashboard.php # Halaman Admin
├── rp_story.php        # Logic game story
└── index.php           # Homepage

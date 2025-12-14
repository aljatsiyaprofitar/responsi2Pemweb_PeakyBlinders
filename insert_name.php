<?php
session_start();
require 'config/koneksi.php';

// 1. Tangkap gambar dari URL. Jika tidak ada, kembalikan ke pilih avatar
if (!isset($_GET['avatar'])) { header("Location: rp_create_avatar.php"); exit; }
$selected_avatar = $_GET['avatar'];

// 2. Proses Insert ke Database saat tombol OK ditekan
if (isset($_POST['submit_char'])) {
    $char_name = mysqli_real_escape_string($koneksi, $_POST['char_name']);
    $username = $_SESSION['username'];
    
    // Ambil ID user
    $u_qry = mysqli_query($koneksi, "SELECT id FROM users WHERE username='$username'");
    $u_row = mysqli_fetch_assoc($u_qry);
    $user_id = $u_row['id'];
    
    // Simpan Karakter Baru
    $insert = "INSERT INTO roleplay_chars (user_id, char_name, avatar_img) VALUES ($user_id, '$char_name', '$selected_avatar')";
    
    if (mysqli_query($koneksi, $insert)) {
        // Set sebagai karakter aktif & lempar ke Dashboard Misi
        $_SESSION['active_rp_id'] = mysqli_insert_id($koneksi);
        header("Location: rp_mission_dashboard.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<link rel="stylesheet" href="Avatar1.css" />
<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@700&family=Old+Standard+TT:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="desktop">

    <!-- BACKGROUND -->
        <img class="background atas-kiri" src="Avatar img/background.png" />
        <img class="background bawah-kiri" src="Avatar img/background kepotong.png" />
        <img class="background bawah-kanan" src="Avatar img/background kepotong.png" />
        <img class="background atas-kanan" src="Avatar img/background.png" />

    <!-- HEADER -->
    <div class="header"></div>

        <a href="index.html" class="nav-link">
            <div class="nav-item-container nav-home">
                <img class="nav-icon" src="Avatar img/home.png" />
                <div class="nav-text home-text">Home</div>
            </div>
        </a>

        <a href="Karakter.html" class="nav-link">
            <div class="nav-item-container nav-character">
                <img class="nav-icon" src="Avatar img/character.png" />
                <div class="nav-text character-text">Character</div>
            </div>
        </a>

        <a href="Avatar.html" class="nav-link">
            <div class="tanda"></div>
            <div class="nav-item-container nav-roleplay">
                <img class="nav-icon" src="Avatar img/roleplay.png" />
                <div class="nav-text roleplay-text">Roleplay</div>
            </div>
        </a>

        <a href="Start.html" class="nav-link">
            <div class="nav-item-container nav-profile">
                <img class="nav-icon" src="Avatar img/profile.png" />
                <div class="nav-text profile-text">Aljatsiya</div>
            </div>
        </a>

        <a href="Halaman1.html" class="nav-link">
            <div class="nav-item-container nav-logout">
                <img class="nav-icon" src="Avatar img/logout.png" />
                <div class="nav-text logout-text">Logout</div>
            </div>
        </a>
        <a href="Halaman1.html" class="nav-link">
            <div class="nav-item-container nav-logout">
                <img class="nav-icon logout-icon" src="Avatar img/logout.png">
                <div class="nav-text logout-text">Logout</div>
            </div>
        </a>

    <!-- CONTENT -->
    <img class="avatar" src="Avatar img/character 1.png"/>

    <!-- INPUT NAME (BOX ASLI) -->
    <input type="text" class="name-input" placeholder="Insert Your Name" />

    <!-- GAMBAR TOMBOL -->
    <a href="Karakter.html">
      <div class="cancel">
        <img class="tombol-cancel" src="Avatar img/cancel.png" />
      </div>
    </a>

    <a href="Mission.html">
      <div class="ok">
        <img class="tombol-ok" src="Avatar img/ok.png" />
        </div>
      </a>
    </div>
</body>
</html>
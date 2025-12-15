<?php
session_start();
require 'config/koneksi.php'; // Pastikan path koneksi benar

// 1. Cek Login
if (!isset($_SESSION['username'])) { header("Location: login.php"); exit; }

$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest';

// 2. Tangkap gambar dari URL. Jika tidak ada, kembalikan ke pilih avatar
if (!isset($_GET['avatar'])) { 
    header("Location: choose_avatar.php"); 
    exit; 
}
$selected_avatar = $_GET['avatar'];

// 3. Proses Insert ke Database saat tombol OK (submit) ditekan
if (isset($_POST['submit_char'])) {
    $rp_char_name = mysqli_real_escape_string($koneksi, $_POST['rp_char_name']);
    $username = $_SESSION['username'];
    
    // Ambil ID user dari tabel users
    $u_qry = mysqli_query($koneksi, "SELECT id FROM users WHERE username='$username'");
    $u_row = mysqli_fetch_assoc($u_qry);
    
    if ($u_row) {
        $user_id = $u_row['id'];
        
        // Query Insert disesuaikan dengan nama tabel dan kolom di peakyblinders_db.sql
        // Tabel: roleplay_char (bukan roleplay_chars)
        // Kolom: rp_char_name, avatar_image_url
        $insert = "INSERT INTO roleplay_char (user_id, rp_char_name, avatar_image_url) VALUES ('$user_id', '$rp_char_name', '$selected_avatar')";
        
        if (mysqli_query($koneksi, $insert)) {
            // Simpan ID karakter aktif ke session untuk dipakai di misi
            $_SESSION['active_rp_id'] = mysqli_insert_id($koneksi);
            header("Location: roleplay_mission.php");
            exit;
        } else {
            echo "<script>alert('Gagal menyimpan karakter: " . mysqli_error($koneksi) . "');</script>";
        }
    } else {
         echo "<script>alert('User tidak ditemukan.');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Insert Name</title>
    <link rel="stylesheet" href="assets/css/insert_name.css" />
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@700&family=Old+Standard+TT:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="desktop">

    <img class="background atas-kiri" src="assets/img/avatar/background.png" />
        <img class="background bawah-kiri" src="assets/img/avatar/background kepotong.png" />
        <img class="background bawah-kanan" src="assets/img/avatar/background kepotong.png" />
        <img class="background atas-kanan" src="assets/img/avatar/background.png" />

    <div class="header"></div>

    <a href="index.php" class="nav-link">
        <div class="nav-item-container nav-home">
            <img class="nav-icon" src="assets/img/avatar/home.png" />
            <div class="nav-text home-text">Home</div>
        </div>
    </a>

    <a href="characters.php" class="nav-link">
        <div class="tanda"></div>
        <div class="nav-item-container nav-character">
            <img class="nav-icon" src="assets/img/avatar/character.png" />
            <div class="nav-text character-text">Character</div>
        </div>
    </a>

    <a href="roleplay_mission.php" class="nav-link">
        <div class="nav-item-container nav-roleplay">
            <img class="nav-icon" src="assets/img/avatar/roleplay.png" />
            <div class="nav-text roleplay-text">Roleplay</div>
        </div>
    </a>

    <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') : ?>
    <a href="admin_dashboard.php" class="nav-link">
        <div class="nav-item-container nav-profile">
            <img class="nav-icon" src="assets/img/avatar/profile.png" alt="Profile">
            <div class="nav-text profile-text">
                <?= htmlspecialchars($username); ?> (Admin)
            </div>
        </div>
    </a>
<?php else : ?>
    <a href="#" class="nav-link" style="cursor: default;">
        <div class="nav-item-container nav-profile">
            <img class="nav-icon" src="assets/img/avatar/profile.png" alt="Profile">
            <div class="nav-text profile-text">
                <?= htmlspecialchars($username); ?>
            </div>
        </div>
    </a>
<?php endif; ?>

    <a href="logout.php" class="nav-link">
        <div class="nav-item-container nav-logout">
            <img class="nav-icon" src="assets/img/avatar/logout.png" />
            <div class="nav-text logout-text">Logout</div>
        </div>
    </a>

    <img class="avatar" src="assets/img/avatar/<?php echo htmlspecialchars($selected_avatar); ?>"/>

    <form method="POST" action="">
        
        <input type="text" name="rp_char_name" class="name-input" placeholder="Insert Your Name" required autocomplete="off" />

        <input type="image" src="assets/img/avatar/ok.png" class="tombol-ok" name="submit_char" alt="OK" />
        
    </form>

    <a href="choose_avatar.php">
      <div class="cancel">
        <img class="tombol-cancel" src="assets/img/avatar/cancel.png" />
      </div>
    </a>

    </div>
</body>
</html>
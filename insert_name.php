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

<div class="create-char-container">
    <img src="assets/avatars/<?= htmlspecialchars($selected_avatar); ?>" class="preview-avatar">
    
    <form method="POST">
        <input type="text" name="char_name" placeholder="Insert Your Name" required>
        
        <div class="buttons">
            <a href="rp_create_avatar.php" class="btn-cancel">CANCEL</a>
            <button type="submit" name="submit_char" class="btn-ok">OK</button>
        </div>
    </form>
</div>
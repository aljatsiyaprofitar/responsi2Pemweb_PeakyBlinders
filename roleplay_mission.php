<?php
session_start();
require 'includes/functions.php'; // Panggil koneksi

$username = $_SESSION['username'];

// 1. Ambil ID User Asli
$u_res = mysqli_query($koneksi, "SELECT id FROM users WHERE username='$username'");
$u_data = mysqli_fetch_assoc($u_res);
$user_id = $u_data['id'];

// 2. Ambil Semua Karakter Roleplay milik User (Untuk Dropdown)
$my_chars = mysqli_query($koneksi, "SELECT * FROM roleplay_chars WHERE user_id = $user_id");

// 3. Tentukan Karakter Aktif (Default ambil yang terakhir dibuat/dimainkan)
if (!isset($_SESSION['active_rp_id'])) {
    // Ambil karakter pertama jika session kosong
    $first_char = mysqli_fetch_assoc($my_chars);
    if ($first_char) {
        $_SESSION['active_rp_id'] = $first_char['rp_id'];
        // Reset pointer array agar dropdown bisa looping ulang
        mysqli_data_seek($my_chars, 0); 
    }
}

// 4. Ambil Data Karakter Aktif (Nama & Score)
$active_id = $_SESSION['active_rp_id'] ?? 0;
$active_char_query = mysqli_query($koneksi, "SELECT * FROM roleplay_chars WHERE rp_id = $active_id");
$active_char = mysqli_fetch_assoc($active_char_query);

// Logic Ganti Karakter via Dropdown
if (isset($_GET['switch_char'])) {
    $_SESSION['active_rp_id'] = $_GET['switch_char'];
    header("Location: roleplay_mission.php");
}
?>

<div class="score-box">
    High Score: <?= $active_char['score'] ?? 0; ?>
</div>

<select onchange="window.location.href='roleplay_mission.php?switch_char='+this.value">
    <?php while($row = mysqli_fetch_assoc($my_chars)): ?>
        <option value="<?= $row['rp_id']; ?>" <?= ($row['rp_id'] == $active_id)?'selected':''; ?>>
            <?= htmlspecialchars($row['char_name']); ?>
        </option>
    <?php endwhile; ?>
</select>

<a href="play_game.php?story_id=1" class="btn-start">Start Mission</a>
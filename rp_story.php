<?php
session_start();
require 'config/koneksi.php';

// Ambil ID Cerita (Default 1 jika baru mulai)
$story_id = isset($_GET['story_id']) ? intval($_GET['story_id']) : 1;

// 1. Ambil Data Cerita
$query = "SELECT * FROM game_stories WHERE story_id = $story_id";
$result = mysqli_query($koneksi, $query);
$story = mysqli_fetch_assoc($result);

// 2. LOGIC CEK GAME OVER (Ini bagian penting permintaanmu)
if ($story['is_game_over'] == 1) {
    // Simpan pesan kematian ke session biar bisa ditampilkan di halaman Game Over
    $_SESSION['game_over_msg'] = $story['story_text'];
    
    // Redirect ke halaman Game Over terpisah
    header("Location: rp_game_over.php");
    exit;
}

// 3. Ambil Pilihan (Jika bukan game over)
$choices = [];
$c_query = "SELECT * FROM game_choices WHERE story_id = $story_id";
$c_result = mysqli_query($koneksi, $c_query);
while($row = mysqli_fetch_assoc($c_result)) {
    $choices[] = $row;
}
?>

<div class="game-ui">
    <h2><?= $story['mission_name']; ?></h2>
    <p class="story-text"><?= nl2br(htmlspecialchars($story['story_text'])); ?></p>
    
    <div class="choices">
        <?php foreach ($choices as $choice): ?>
            <a href="rp_play.php?story_id=<?= $choice['target_story_id']; ?>" class="btn-choice">
                <?= $choice['choice_text']; ?>
            </a>
        <?php endforeach; ?>
        
        <?php if (empty($choices)): ?>
             <a href="rp_play.php?story_id=<?= $story_id + 1; ?>" class="btn-next">NEXT</a>
        <?php endif; ?>
    </div>
</div>
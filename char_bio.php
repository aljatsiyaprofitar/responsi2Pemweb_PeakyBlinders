<?php
session_start();

require 'config/koneksi.php';

if (!isset($_SESSION['login_user'])) {
    header("Location: login.php");
    exit;
}

// Ambil username (Default 'Guest' jika error)
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest';

if (!isset($_SESSION['login_user'])) {
    header("Location: login.php");
    exit;
}

// Ambil ID dari URL, default ke 1 jika tidak ada
$id = isset($_GET['id']) ? (int)$_GET['id'] : 1;

// 1. Ambil Data Karakter
$queryChar = "SELECT * FROM characters WHERE char_id = $id";
$resultChar = mysqli_query($koneksi, $queryChar);
$character = mysqli_fetch_assoc($resultChar);

if (!$character) {
    echo "Karakter tidak ditemukan!";
    exit;
}

// 2. Ambil Data Timeline
// Pastikan kolom 'display_order' atau 'year_period' digunakan untuk urutan
$queryTime = "SELECT * FROM timeline WHERE character_id = $id ORDER BY display_order ASC LIMIT 6";
$resultTime = mysqli_query($koneksi, $queryTime);

$timeline_data = [];
while ($row = mysqli_fetch_assoc($resultTime)) {
    $timeline_data[] = $row;
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="utf-8" />
    <link rel="stylesheet" href="assets/css/char_bio.css" />
  </head>
  <body>
    <div class="desktop">
      <img class="background-merokok" src="assets/img/characters/merokok.png" />
      <img class="background-silet" src="assets/img/characters/silet.png" />
      <img class="background-asap" src="assets/img/characters/asap.png" />
      <img class="pigura" src="assets/img/characters/pigura.png" />
      
      <img class="karakter" src="<?= $character['image_url'] ?>" alt="<?= $character['name'] ?>" />

      <p class="deskripsi">
        <?= $character['long_desc'] ?>
      </p>

      <div class="nama-karakter"><?= $character['name'] ?></div>
      
      <p class="the-life-path-of">
        <span class="span">The Life Path <br /></span>
        <span class="text-wrapper-2">of <br /></span>
        <span class="span"><?= $character['name'] ?></span>
      </p>

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
                <a href="admin_dashboard.php">
                    <div class="nav-item-container nav-profile">
                        <img class="nav-icon" src="assets/img/avatar/profile.png" alt="Profile">
                        <div class="nav-text profile-text"><?= htmlspecialchars($username); ?> (Admin)</div>
                    </div>
                </a>
            <?php else : ?>
                <div class="nav-item-container nav-profile" style="cursor: default;">
                    <img class="nav-icon" src="assets/img/avatar/profile.png" alt="Profile">
                    <div class="nav-text profile-text"><?= htmlspecialchars($username); ?></div>
                </div>
            <?php endif; ?>

        <a href="logout.php" class="nav-link">
            <div class="nav-item-container nav-logout">
                <img class="nav-icon" src="assets/img/avatar/logout.png" />
                <div class="nav-text logout-text">Logout</div>
            </div>
        </a>

      <img class="background-order" src="assets/img/characters/by order.png" />

      <?php 
        // Kita loop manual 1 sampai 6 untuk mengisi slot layout
        // Jika data dari database kurang dari 6, slot akan kosong
        for ($i = 0; $i < 6; $i++): 
            $num = $i + 1; // Index CSS dimulai dari 1 (timeline1, timeline2)
            $data = isset($timeline_data[$i]) ? $timeline_data[$i] : null;
      ?>
          <?php if ($data): ?>
            <p class="tekstimeline<?= $num ?>"><?= $data['event_description'] ?></p>
            <div class="timeline<?= $num ?>"><?= $data['year_period'] ?></div>
          <?php else: ?>
             <p class="tekstimeline<?= $num ?>"></p>
             <div class="timeline<?= $num ?>"></div>
          <?php endif; ?>
          
          <img class="pita<?= $num ?>" src="assets/img/characters/timeline.png" />
      <?php endfor; ?>

      <img class="pembatas" src="assets/img/characters/pembatas.png" />
      
      <a href="characters.php">
        <div class="back">
            <img class="tombol-back" src="assets/img/characters/back.png" />
        </div>
      </a>

      <p class="quote">“<?= $character['quotes'] ?>”</p>
    </div>
  </body>
</html>
<?php
session_start();
// Pastikan path koneksi ini benar sesuai struktur folder Anda
require 'config/koneksi.php'; 

if (!isset($_SESSION['login_user'])) {
    header("Location: login.php");
    exit;
}

// Ambil username (Default 'Guest' jika error)
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest';

// Ambil semua data karakter
$query = "SELECT * FROM characters ORDER BY char_id ASC LIMIT 6";
$result = mysqli_query($koneksi, $query);

$characters = [];
while ($row = mysqli_fetch_assoc($result)) {
    $characters[] = $row;
}

// Mapping urutan database ke class CSS spesifik yang ada di Karakter.css
// Index 0 -> Thomas, 1 -> Arthur, dst.
$css_classes = ['Thomas', 'Arthur', 'Polly', 'John', 'Ada', 'Finn'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta charset="utf-8" />
    <link rel="stylesheet" href="assets/css/character.css" /> 
    </head>

<body>
<div class="desktop">

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

    <img class="background" src="assets/img/index/background.png">

    <div class="title">The Peaky Blinders</div>

    <p class="subtitle">
        Meet the member of Birmingham’s most notorious gang. Each character plays a vital role in the Shelby family’s rise to power.
    </p>

    <?php foreach ($characters as $index => $char): ?>
        <?php if (isset($css_classes[$index])): ?>
            <div class="box <?= $css_classes[$index] ?>" 
                 onclick="location.href='char_bio.php?id=<?= $char['char_id'] ?>'">
            </div>
        <?php endif; ?>
    <?php endforeach; ?>

    <?php foreach ($characters as $index => $char): ?>
        <?php if (isset($css_classes[$index])): ?>
            <p class="char c<?= $css_classes[$index] ?>">
                <?= $char['name'] ?><br>
                <span><?= $char['role'] ?></span>
            </p>
        <?php endif; ?>
    <?php endforeach; ?>

    <?php foreach ($characters as $index => $char): ?>
        <?php if (isset($css_classes[$index])): ?>
            <p class="desc d<?= $css_classes[$index] ?>">
                <?= $char['short_desc'] ?>
            </p>
        <?php endif; ?>
    <?php endforeach; ?>

</div>
</body>
</html>
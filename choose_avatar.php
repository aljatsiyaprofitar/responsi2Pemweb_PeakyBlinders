<?php
session_start();
// Pastikan user sudah login
if (!isset($_SESSION['username'])) { 
    header("Location: login.php"); 
    exit; 
}

$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest';
?>

<!DOCTYPE html>
<html>
<head>
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta charset="utf-8" />
    <title>Choose Your Avatar</title>
    <link rel="stylesheet" href="assets/css/choose_avatar.css" /> 
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

    <div class="judul">Choose Your Avatar</div>

    <div class="avatar-selection-grid">

        <a href="insert_name.php?avatar=character 1.png">
            <img class="avatar-1 avatar-click" src="assets/img/avatar/character 1.png">
        </a>

        <a href="insert_name.php?avatar=character 2.png">
            <img class="avatar-2 avatar-click" src="assets/img/avatar/character 2.png">
        </a>

        <a href="insert_name.php?avatar=character 3.png">
            <img class="avatar-3 avatar-click" src="assets/img/avatar/character 3.png">
        </a>

        <a href="insert_name.php?avatar=character 4.png">
            <img class="avatar-4 avatar-click" src="assets/img/avatar/character 4.png">
        </a>

        <a href="insert_name.php?avatar=character 5.png">
            <img class="avatar-5 avatar-click" src="assets/img/avatar/character 5.png">
        </a>

        <a href="insert_name.php?avatar=character 6.png">
            <img class="avatar-6 avatar-click" src="assets/img/avatar/character 6.png">
        </a>

    </div>

    <a href="index.php">
        <img class="back-bg" src="assets/img/avatar/Rectangle.png">
        <div class="back-text">Back</div>
    </a>

</div>
</body>
</html>
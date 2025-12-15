<?php
session_start();

// Cek sesi login
if (!isset($_SESSION['login_user'])) {
    header("Location: login.php");
    exit;
}

// Ambil username (Default 'Guest' jika error)
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Peaky Blinders</title>
    <link rel="stylesheet" href="assets/css/index.css">
</head>
<body>

    <div class="desktop">
        
        <img class="background-full" src="assets/img/index/background.png" alt="Background">
        
        <div class="header-bar"></div>


        <div class="content-wrapper">

            <a href="index.php">
                <div class="nav-item-container nav-home">
                    <div class="tanda"></div> <img class="nav-icon" src="assets/img/avatar/home.png" alt="Home">
                    <div class="nav-text home-text">Home</div>
                </div>
            </a>

            <a href="characters.php">
                <div class="nav-item-container nav-character">
                    <img class="nav-icon" src="assets/img/avatar/character.png" alt="Characters">
                    <div class="nav-text character-text">Character</div>
                </div>
            </a>

            <a href="choose_avatar.php">
                <div class="nav-item-container nav-roleplay">
                    <img class="nav-icon" src="assets/img/avatar/roleplay.png" alt="Roleplay">
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

            <a href="logout.php">
                <div class="nav-item-container nav-logout">
                    <img class="nav-icon" src="assets/img/avatar/logout.png" alt="Logout">
                    <div class="nav-text logout-text">Logout</div>
                </div>
            </a>


            <div class="Welcome">Welcome to Birmingham, <?= htmlspecialchars($username); ?>!</div>
            <p class="desc">
                “I’m not a traitor to my class. I am just an extreme example of what a working man can archive”
            </p>

            <a href="characters.php" class="box-link">
                <div class="meet-box"></div>
                <img class="grid-icon icon-char" src="assets/img/index/char.svg" alt="Icon">
                <div class="meet-the-characters">Meet the Characters</div>
                <p class="explore-characters">
                    Explore detailed profiles of the Shelby family and their associates from Birmingham's most notorious gang.
                </p>
            </a>

            <a href="choose_avatar.php" class="box-link">
                <div class="roleplay-box"></div>
                <img class="grid-icon icon-rp" src="assets/img/index/rp.svg" alt="Icon">
                <div class="rolepay-adventures">Roleplay Adventures</div>
                <p class="explore-roleplay">
                    Make critical decisions as you navigate the dangerous world of 1920 Birmingham in this interactive story.
                </p>
            </a>

            <div class="box-static">
                <div class="about-box"></div>
                <img class="grid-icon icon-about" src="assets/img/index/about.svg" alt="Icon">
                <div class="about-the-peaky">About the Peaky Blinders</div>
                <p class="explore-peaky">
                     Set in Birmingham, England, the series follow the exploits of the Shelby crime family in the direct aftermath of the First Wolrd War. The fictional family is loosely based on a real urban youth geng of the same name who were active in the city from the 1890s to the early 20th century.
                </p>
            </div>

            </div> </div> </body>
</html>
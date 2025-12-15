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
<html>
<head>
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta charset="utf-8" />
    <title>Home</title>

    <link rel="stylesheet" href="assets/css/index.css" />

<body>
<div class="desktop">

    <div class="header"></div>

    <a href="index.php" class="nav-link">
        <div class="nav-item-container nav-home">
            <div class="tanda"></div>
            <img class="nav-icon" src="assets/img/avatar/home.png" />
            <div class="nav-text home-text">Home</div>
        </div>
    </a>

    <a href="characters.php" class="nav-link">
        <div class="nav-item-container nav-character">
            <img class="nav-icon" src="assets/img/avatar/character.png" />
            <div class="nav-text character-text">Character</div>
        </div>
    </a>

    <a href="choose_avatar.php" class="nav-link">
        <div class="nav-item-container nav-roleplay">
            <img class="nav-icon" src="assets/img/avatar/roleplay.png" />
            <div class="nav-text roleplay-text">Roleplay</div>
        </div>
    </a>

    <a href="start.php" class="nav-link">
        <div class="nav-item-container nav-profile">
            <img class="nav-icon" src="assets/img/avatar/profile.png" />
            <div class="nav-text profile-text"><?= htmlspecialchars($username); ?></div>
        </div>
    </a>

    <a href="logout.php" class="nav-link">
        <div class="nav-item-container nav-logout">
            <img class="nav-icon" src="assets/img/avatar/logout.png" />
            <div class="nav-text logout-text">Logout</div>
        </div>
    </a>

    <!-- ================= BOX 1 : MEET THE CHARACTERS ================= -->
    <a href="characters.php" class="box-character">
        <div class="meet-box"></div>
        <div class="meet-the-characters">
            Meet the Characters
        </div>
        <p class="explore-characters">
            Explore detailed profiles of the Shelby family and their associates from Birmingham's most notorious gang.
        </p>
    </a>

    <!-- ================= BOX 2 : ROLEPLAY ADVENTURES ================= -->
    <a href="choose_avatar.php" class="box-link">
        <div class="roleplay-box"></div>
        <div class="rolepay-adventures">
            Roleplay Adventures
        </div>
        <p class="explore-roleplay">
            Make critical decisions as you navigate the dangerous world of 1920 Birmingham in this interactive story.
        </p>
    </a>

    <!-- ================= BOX 3 : ABOUT PEAKY BLINDERS ================= -->
        <div class="about-box"></div>
        <p class="about-the-peaky">
            About the Peaky Blinders
        </p>
        <p class="explore-peaky">
            Set in Birmingham, England, the series follow the exploits of the Shelby crime family in the direct aftermath of the First Wolrd War. The fictional family is loosely based on a real urban youth geng of the same name who were active in the city from the 1890s to the early 20th century.
        </p>
    </a>

    <!-- ================= TEXT UTAMA ================= -->
    <div class="Welcome">Welcome to Birmingham, <?= htmlspecialchars($_SESSION['username']); ?>!</div>

    <p class="desc">
        “I’m not a traitor to my class. I am just an extreme example of what a working man can archive”
    </p>

    <!-- IMAGE -->
    <img class="background" src="assets/img/index/background.png" />

</div>
</body>
</html>

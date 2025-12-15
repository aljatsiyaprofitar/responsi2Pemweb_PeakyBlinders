<?php
session_start();

// Cek apakah user sudah login. Jika belum, tendang ke login.php
if (!isset($_SESSION['login_user'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="utf-8" />
    <title>Welcome to Birmingham</title>
    <link rel="stylesheet" href="assets/css/Start.css" />
</head>
<body>
    <div class="desktop">
        <img class="background-img" src="assets/img/startpage/background start.png" alt="Background" />
        
        <img class="char-arthur" src="assets/img/startpage/Arthur.png" alt="Arthur Shelby" />
        <img class="char-ada" src="assets/img/startpage/Ada_Thorne.png" alt="Ada Thorne" />
        
        <img class="char-polly" src="assets/img/startpage/polly gray.png" alt="Polly Gray" />
        
        <img class="char-thomas" src="assets/img/startpage/ThomasShelby.png" alt="Thomas Shelby" />

        <div class="welcome-container">
            <h1 class="welcome-text">WELCOME TO BIRMINGHAM</h1>
            <h2 class="username-text">MR. <?= strtoupper(htmlspecialchars($_SESSION['username'])); ?></h2>
        </div>

        <a href="index.php" class="btn-start">
            <span>ENTER</span>
        </a>
    </div>
</body>
</html>
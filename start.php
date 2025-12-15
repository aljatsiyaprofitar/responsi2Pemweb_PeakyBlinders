<?php
session_start();

// Jika belum login, kembali ke login
if (!isset($_SESSION['login_user'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta charset="utf-8" />

    <!-- Link ke CSS eksternal -->
    <link rel="stylesheet" href="assets/css/start.css">
  </head>

  <body>
    <div class="desktop">
      <img class="background" src="assets/img/startpage/background start.png" />
      <img class="ada-thorne" src="assets/img/startpage/Ada_Thorne.png" />
      <img class="arthur-shelby" src="assets/img/startpage/Arthur.png" />
      <img class="polly-gray" src="assets/img/startpage/polly gray.png" />
      <img class="thomas-shelby" src="assets/img/startpage/ThomasShelby.png" />

      <h1 class="page-title">
            Welcome, <?= htmlspecialchars($_SESSION['username']); ?>!
        </h1>

      <a href="index.php" class="start-link">
        <div class="rectangle"></div>
        <div class="text-wrapper">START</div>
      </a>

      <img class="vector-2" src="img/vector-2.svg" />
      <img class="vector-3" src="img/vector.svg" />
      <img class="vector-4" src="img/image.svg" />
    </div>
  </body>
</html>

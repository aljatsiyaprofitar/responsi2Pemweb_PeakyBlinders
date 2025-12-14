<?php
session_start();
if (isset($_SESSION['login_user'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="utf-8" />
    <title>Peaky Blinders - Welcome</title>
    <link rel="stylesheet" href="assets/css/first_page.css" />
  </head>
  <body>
    <div class="desktop">
      <img class="rectangle" src="assets/img/first_page/Rectangle besar.png" alt="Overlay" />
      <img class="background-judul" src="assets/img/first_page/background judul.png" alt="Title Background" />
      <img class="thomas-gun" src="assets/img/first_page/thomas senjata.png" alt="Thomas Shelby" />
      <img class="cillian-murphy" src="assets/img/first_page/gambar halaman 1 (2).png" alt="Character Art" />
      <img class="smoke-effect1" src="assets/img/first_page/gambar halaman 1.png" alt="Smoke Effect" />
      <img class="smoke-effect2" src="assets/img/first_page/gambar halaman 1.png" alt="Smoke Effect2" />
      
      <div class="button-container">
          <a href="login.php" class="btn btn-signin">
            <span>Sign in</span>
          </a>
          <a href="registrasi.php" class="btn btn-signup">
            <span>Sign up</span>
          </a>
      </div>
    </div>
  </body>
</html>
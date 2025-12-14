<?php
session_start();
include 'config/koneksi.php';

// Jika sudah login, lempar ke dashboard
if(isset($_SESSION['login_user'])){
    header('Location: start.php');
    exit();
}

$error_msg = "";

if(isset($_POST['login'])){
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = $_POST['password'];

    // Cari user berdasarkan username
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($koneksi, $query);

    if(mysqli_num_rows($result) === 1){
        $row = mysqli_fetch_assoc($result);
        
        // Verifikasi Password Hash
        if(password_verify($password, $row['password'])) {
            // SET SESSION VARIABEL
            $_SESSION['login_user'] = true;
            $_SESSION['user_id'] = $row['id'];      // Kunci untuk data progress unik
            $_SESSION['username'] = $row['username']; // (Perbaikan typo userbame)
            
            header("location: start.php");
            exit;
        } else {
            $error_msg = "Password Salah!";
        }
    } else {
        $error_msg = "Username tidak ditemukan!";
    }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta charset="utf-8" />
    <link rel="stylesheet" href="assets/css/login.css" />
  </head>

  <body>
    <div class="desktop">

      <img class="image" src="assets/img/login and regis/background sign in up.png" />

      <div class="rectangle"></div>

      <div class="text-wrapper">WELCOME BACK!</div>

      <p class="don-t-have-account">
        <span class="span">Don’t have account.</span>
        <a href="registrasi.php" class="text-wrapper-3">Sign up</a>
      </p>

      <!-- INPUT USERNAME -->
      <input type="text" class="input-field input-username" />

      <!-- LABEL USERNAME -->
      <div class="label-username">Username</div>

      <!-- INPUT PASSWORD -->
      <input type="password" class="input-field input-password" />

      <!-- LABEL PASSWORD -->
      <div class="label-password">Password</div>
      <div class="error-message" id="errorMsg">
        Username atau Password salah
      </div>
      <!-- BUTTON SIGN IN -->
      <a href="start.php" id="btnSignIn">
        <div class="btn-signin"></div>
        <div class="label-btn-signin">Sign In</div>
      </a>
    </div>
    <div class="error-message" id="errorMsg">
      Harap isi username dan password terlebih dahulu!
    </div>
  </body>
</html>
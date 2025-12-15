<?php
session_start();
include 'config/koneksi.php';

// Jika sudah login, lempar ke dashboard
if(isset($_SESSION['login_user'])){
    header('Location: index.php');
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
            
            header("location: start..php");
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
    <link rel="stylesheet" href="SignUp.css" />
  </head>

  <body>
    <div class="desktop">

      <img class="image" src="Sign In and Up img/background sign in up.png" />

      <div class="rectangle"></div>

      <div class="text-wrapper">CREATE NEW ACCOUNT</div>

      <p class="already-have-account">
        <span class="span">Already have account.</span>
        <a href="SignIn.html" class="text-wrapper-3">Sign in</a>
      </p>

      <!-- INPUT EMAIL -->
      <input type="email" class="input-field input-email" />
      <div class="label-email">Email Address</div>

      <!-- INPUT USERNAME -->
      <input type="text" class="input-field input-username" />
      <div class="label-username">Username</div>

      <!-- INPUT PASSWORD -->
      <input type="password" class="input-field input-password" />
      <div class="label-password">Create Password</div>

      <!-- BUTTON SIGN UP -->
      <a href="SignIn.html" id="btnSignUp">
        <div class="btn-signup"></div>
        <div class="label-btn-signup">Sign up</div>
      </a>
      <div class="error-message" id="errorMsg">
        Harap isi email, username, dan password terlebih dahulu!
      </div>
    </div>
  </body>
</html>
<?php
require 'config/koneksi.php'; 

$error_msg = "";
$success_msg = "";

if (isset($_POST['register'])) {
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = $_POST['password'];

    // Cek ketersediaan user
    $cek_user = mysqli_query($koneksi, "SELECT * FROM users WHERE email = '$email' OR username = '$username'");
    
    if (mysqli_num_rows($cek_user) > 0) {
        $error_msg = "Email atau Username sudah terdaftar!";
    } else {
        // ENKRIPSI PASSWORD (PENTING!)
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password_hash')";
        
        if (mysqli_query($koneksi, $query)) {
            echo "<script>
                    alert('Registrasi Berhasil! Silakan Login.');
                    window.location.href='login.php';
                  </script>";
            exit;
        } else {
            $error_msg = "Terjadi kesalahan sistem.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta charset="utf-8" />
    <link rel="stylesheet" href="assets/css/regis.css" />
  </head>

  <body>
    <div class="desktop">

      <img class="image" src="assets/img/login and regis/background sign in up.png" />

      <div class="rectangle"></div>

      <div class="text-wrapper">CREATE NEW ACCOUNT</div>

      <p class="already-have-account">
        <span class="span">Already have account.</span>
        <a href="login.php" class="text-wrapper-3">Sign in</a>
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
      <a href="login.php" id="btnSignUp">
        <div class="btn-signup"></div>
        <div class="label-btn-signup">Sign up</div>
      </a>
      <div class="error-message" id="errorMsg">
        Harap isi email, username, dan password terlebih dahulu!
      </div>
    </div>
  </body>
</html>
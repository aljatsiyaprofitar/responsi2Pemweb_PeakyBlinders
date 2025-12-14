<?php
require 'config/koneksi.php'; 

if (isset($_POST['register'])) {
    // 1. Ambil data sesuai atribut 'name' di form HTML
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = $_POST['password'];

    // 2. Cek apakah email atau username sudah terdaftar
    $cek_user = mysqli_query($koneksi, "SELECT * FROM users WHERE email = '$email' OR username = '$username'");
    
    if (mysqli_num_rows($cek_user) > 0) {
        echo "<script>alert('Email atau Username sudah terdaftar!');</script>";
    } else {
        // 3. Hash Password (Keamanan) & Insert Data
        // Catatan: Di database kamu kolom username varchar(100), email varchar(100)
        $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        
        if (mysqli_query($koneksi, $query)) {
            echo "<script>
                    alert('Registrasi Berhasil! Silakan Login.');
                    window.location.href='login.php';
                  </script>";
        } else {
            echo "<script>alert('Registrasi Gagal: " . mysqli_error($koneksi) . "');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta charset="utf-8" />
    <title>Registrasi</title>
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

        <form action="" method="POST" id="formRegister">
            <div class="label-email">Email Address</div>
            <input type="email" name="email" class="input-field input-email" required/>
            
            <div class="label-username">Username</div>
            <input type="text" name="username "class="input-field input-username" required/>

            <div class="label-password">Create Password</div>
            <input type="password" name="password" class="input-field input-password" required/>

            <button type="submit" name="register" id="btnSignUp" style="background: none; border: none; padding: 0; cursor: pointer;">
                <div class="btn-signup"></div>
                <div class="label-btn-signup">Sign up</div>
            </button>
        </form> 
    </div>
</body>
</html>
<?php
session_start();
require 'config/koneksi.php';

// 1. Cek apakah user sudah login
if (isset($_SESSION['login_user'])) {
    header("Location: start.php");
    exit;
}

$error_msg = ""; // Inisialisasi variabel error agar tidak "Undefined"

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = $_POST['password'];

    // Cek user berdasarkan username ATAU email
    $query = "SELECT * FROM users WHERE username = '$username' OR email = '$username'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        
        // Verifikasi Password
        if (password_verify($password, $row['password'])) {
            // 2. SET SESSION
            $_SESSION['login_user'] = true;       
            $_SESSION['user_id'] = $row['id'];    
            $_SESSION['username'] = $row['username'];
            
            // Redirect ke start.php
            header("Location: start.php");
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="assets/css/login&regis.css">
    </head>
<body>
    
    <div class="login-wrapper">
       <?php if($error_msg != ""): ?>
            <div class="error-message"> 
                <?= $error_msg ?>
            </div>
        <?php endif; ?>

      <div class="rectangle"></div>

        <div class="text-title">WELCOME BACK!</div>
        
        <div class="text-signup">
            <span>Don’t have account.</span>
            <a href="registrasi.php">Sign up</a>
        </div>

        <form action="" method="POST">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" class="input-field" autocomplete="off" required>
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <div class="password-container">
                    <input type="password" id="password" name="password" class="input-field" required>
                    <span id="togglePassword" class="eye-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 4.5C7 4.5 2.73 7.61 1 12C2.73 16.39 7 19.5 12 19.5C17 19.5 21.27 16.39 23 12C21.27 7.61 17 4.5 12 4.5ZM12 17C9.24 17 7 14.76 7 12C7 9.24 9.24 7 12 7C14.76 7 17 9.24 17 12C17 14.76 14.76 17 12 17ZM12 9C10.34 9 9 10.34 9 12C9 13.66 10.34 15 12 15C13.66 15 15 13.66 15 12C15 10.34 13.66 9 12 9Z" fill="#e7c693"/>
                        </svg>
                    </span>
                </div>
            </div>

            <button type="submit" name="login" class="btn-submit">Sign In</button>
        </form>
    </div>

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function (e) {
            // Toggle tipe attribut type antara password dan text
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            
            // Opsional: Ubah opacity biar user tau sedang aktif/nonaktif
            this.style.opacity = type === 'text' ? '1' : '0.6';
        });
    </script>

</body>
</html>
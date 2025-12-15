<?php
require 'config/koneksi.php';

$error = '';
$success = '';

if (isset($_POST['register'])) {
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = $_POST['password'];

    // Cek apakah Username atau Email sudah terdaftar
    $check = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$username' OR email = '$email'");
    
    if (mysqli_num_rows($check) > 0) {
        $error = "Username atau Email sudah terdaftar!";
    } else {
        // Hashing Password
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        
        // Simpan ke Database
        $query = "INSERT INTO users (email, username, password) VALUES ('$email', '$username', '$password_hash')";
        
        if (mysqli_query($koneksi, $query)) {
            $success = true;
        } else {
            $error = "Gagal mendaftar: " . mysqli_error($koneksi);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="assets/css/login&regis.css">
</head>
<body>
    
    <div class="login-wrapper">
        <?php if($error): ?>
            <div class="error-message"><?= $error ?></div>
        <?php endif; ?>
        
        <?php if($success): ?>
            <script>
                alert("Pendaftaran Berhasil! Silakan Login.");
                window.location.href = 'login.php';
            </script>
        <?php endif; ?>

        <div class="text-title">CREATE NEW ACCOUNT</div>
        
        <div class="text-signup">
            <span>Already have account?</span>
            <a href="login.php">Sign in</a>
        </div>

        <form action="" method="POST">
            <div class="input-group">
                <label>Email Address</label>
                <input type="email" name="email" class="input-field" required autocomplete="off">
            </div>

            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" class="input-field" required autocomplete="off">
            </div>

            <div class="input-group">
                <label>Create Password</label>
                <input type="password" name="password" class="input-field" required>
            </div>

            <button type="submit" name="register" class="btn-submit">Sign Up</button>
        </form>
    </div>

</body>
</html>
<?php
session_start();
require 'config/koneksi.php';

if (isset($_SESSION['login'])) {
    header("Location: start.php");
    exit;
}

$error = '';

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username = '$username' OR email = '$username'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $_SESSION['login'] = true;
            $_SESSION['username'] = $row['username'];
            header("Location: start.php");
            exit;
        }
    }
    $error = "Username atau Password salah!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
    
    <div class="login-wrapper">
        <?php if($error): ?>
            <div class="error-message"><?= $error ?></div>
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
                <input type="password" id="password" name="password" class="input-field" required>
            </div>

            <button type="submit" name="login" class="btn-submit">Sign In</button>
        </form>
    </div>

</body>
</html>
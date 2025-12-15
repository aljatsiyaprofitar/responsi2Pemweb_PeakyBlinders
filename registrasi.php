<?php
// Pastikan path koneksi benar
require 'config/koneksi.php'; 

$error_msg = "";
$success_msg = "";

// Cek koneksi database (Debugging)
if (!$koneksi) {
    die("Koneksi Database Gagal: " . mysqli_connect_error());
}

if (isset($_POST['register'])) {
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = $_POST['password'];

    // Validasi sederhana
    if (empty($email) || empty($username) || empty($password)) {
        $error_msg = "Semua kolom wajib diisi!";
    } else {
        // Cek apakah username/email sudah ada
        $cek_user = mysqli_query($koneksi, "SELECT * FROM users WHERE email = '$email' OR username = '$username'");
        
        if (mysqli_num_rows($cek_user) > 0) {
            $error_msg = "Username atau Email sudah terdaftar!";
        } else {
            // Hash Password
            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            // Query Insert dengan Error Handling
            $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password_hash')";
            
            if (mysqli_query($koneksi, $query)) {
                echo "<script>
                        alert('Registrasi Berhasil! Silakan Login.');
                        document.location.href = 'login.php';
                      </script>";
                exit;
            } else {
                // Tampilkan error SQL jika gagal (Penting untuk debugging)
                $error_msg = "Gagal mendaftar: " . mysqli_error($koneksi);
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="utf-8" />
    <title>Sign Up - Peaky Blinders</title>
    <link rel="stylesheet" href="assets/css/regis.css" />
</head>

<body>
    <div class="desktop">
        <img class="image" src="assets/img/login and regis/background sign in up.png" alt="Background" />

        <div class="rectangle-overlay"></div>

        <div class="container-form">
            <div class="text-wrapper">CREATE NEW ACCOUNT</div>

            <p class="already-have-account">
                <span class="span">Already have account. </span>
                <a href="login.php" class="text-link">Sign in</a>
            </p>

            <form action="" method="POST" class="form-register">
                <div class="input-group">
                    <label>Email Address</label>
                    <input type="email" name="email" class="input-field" required autocomplete="off" />
                </div>
                
                <div class="input-group">
                    <label>Username</label>
                    <input type="text" name="username" class="input-field" required autocomplete="off" />
                </div>

                <div class="input-group">
                    <label>Create Password</label>
                    <input type="password" name="password" class="input-field" required />
                </div>

                <?php if($error_msg): ?>
                    <div class="error-message">
                        <?= $error_msg ?>
                    </div>
                <?php endif; ?>

                <button type="submit" name="register" class="btn-signup">
                    <span>Sign up</span>
                </button>
            </form>
        </div>
    </div>
</body>
</html>
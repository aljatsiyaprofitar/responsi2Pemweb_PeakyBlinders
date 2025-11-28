<?php

include 'koneksi.php';

$error_msg = "";
$success_msg = "";

if(isset($_POST['register'])){
    $fullname = mysqli_real_escape_string($koneksi, $_POST['fullname']);
    $email = mysqli_real_escape_string($koneksi,$_POST['email']);
    $password= $_POST['password'];
    $confirm_password = $_POST['confirm_password'];



    if($password !== $confirm_password){
        $error_msg = "Password dan Konfirmasi Password tidak sesuai!";
    } else {
        $cek_email = mysqli_query($koneksi, "SELECT email FROM users WHERE email = '$email'");
        if(mysqli_num_rows($cek_email)>0){
            $error_msg = "Email sudah terdaftar!";
        } else {

            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO users (username, email, password) VALUES ('$fullname', '$email', '$hashed_password')";

            if(mysqli_query($koneksi, $query)){
                echo "<script>alert('Registrasi berhasil! Silahkan Login.'); window.location='login.php';</script>";
            } else {
                $error_msg = "Registrasi Gagal: ".mysqli_error($koneksi);
            }
        }
    }
}

?>
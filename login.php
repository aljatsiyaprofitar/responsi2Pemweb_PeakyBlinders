<?php
    session_start();
    include 'koneksi.php';

    if(isset($_SESSION['login_user'])){
        header('Location: index.php');
        exit();
    }
  
    $error_msg = "";

    if(isset($_POST['login'])){
        $email = mysqli_real_escape_string($koneksi, $_POST['email']);
        $password = $_POST['password'];

        $query = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($koneksi, $query);

        if(mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_assoc($result);

            if(password_verify($password, $row['password'])) {

                $_SESSION['login_user'] = true;
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['fullname'] = $row['username'];
            
            header("location: index.php");
            exit;

            } else{
                $error_msg = "Password Salah!";
            }
            
        } else {
            $error_msg = "Email tidak ditemukan!";
        }
    }

?>

<!DOCTYPE html>
<html>
    <head>
    </head>
</html>
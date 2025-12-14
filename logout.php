<?php
session_start();
session_unset(); // Menghapus semua variabel sesi
session_destroy(); // Menghancurkan sesi
header("Location: first_page.php"); // Arahkan kembali ke Landing Page
exit;
?>
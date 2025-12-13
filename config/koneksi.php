<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'peakyblinders_db');

if (!$koneksi) {
    die('Koneksi Gagal: ' . mysqli_connect_error());
}
?>
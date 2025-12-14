<?php
session_start();
if (!isset($_SESSION['username'])) { header("Location: login.php"); exit; }
?>

<div class="avatar-grid">
    <a href="rp_create_name.php?avatar=tommy_style.png">
        <img src="assets/avatars/tommy_style.png" alt="Tommy Style">
    </a>
    
    <a href="rp_create_name.php?avatar=arthur_style.png">
        <img src="assets/avatars/arthur_style.png" alt="Arthur Style">
    </a>
    
    <a href="rp_create_name.php?avatar=polly_style.png">
        <img src="assets/avatars/polly_style.png" alt="Polly Style">
    </a>
    </div>
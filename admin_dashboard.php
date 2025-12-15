<?php
session_start();
require 'config/koneksi.php';

// 1. CEK AKSES: Hanya izinkan jika login DAN role = admin
if (!isset($_SESSION['login_user']) || empty($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    echo "<script>alert('Akses Ditolak! Halaman ini khusus Admin.'); window.location.href='index.php';</script>";
    exit;
}

$username = $_SESSION['username'];
// Default ke 'dashboard' jika tidak ada parameter page
$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Peaky Blinders</title>
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/admin_dashboard.css">
</head>
<body>

    <div class="admin-layout">
        
        <div class="sidebar">
            <div class="admin-logo">PEAKY ADMIN</div>
            
            <a href="?page=dashboard" class="menu-link <?= $page=='dashboard'?'active':'' ?>">Dashboard</a>
            <a href="?page=characters" class="menu-link <?= $page=='characters'?'active':'' ?>">Manage Characters</a>
            <a href="?page=avatars" class="menu-link <?= $page=='avatars'?'active':'' ?>">Manage Avatars</a>
            <a href="?page=roleplay" class="menu-link <?= $page=='roleplay'?'active':'' ?>">Manage Roleplay</a>
            
            <a href="index.php" class="menu-link btn-back">← Back to Site</a>
        </div>

        <div class="main-panel">
            <div class="overlay"></div>
            
            <div class="content-container">
                
                <?php if ($page == 'dashboard') : ?>
                    <h1 class="page-header">Welcome, Boss <?= htmlspecialchars($username); ?>.</h1>
                    <p class="page-sub">Select a menu on the left to manage your empire.</p>
                    
                    <div class="widget-container">
                        <div class="widget-box">
                            <h2 class="widget-number">3</h2>
                            <p class="widget-label">Total Characters</p>
                        </div>
                        <div class="widget-box">
                            <h2 class="widget-number">5</h2>
                            <p class="widget-label">Active Users</p>
                        </div>
                        <div class="widget-box">
                            <h2 class="widget-number">12</h2>
                            <p class="widget-label">Roleplay Stories</p>
                        </div>
                    </div>

                <?php elseif ($page == 'characters') : ?>
                    <h1 class="page-header">Manage Characters</h1>
                    <p class="page-sub">Add or remove family members.</p>
                    
                    <a href="#" class="btn btn-add">+ Add New Character</a>
                    
                    <table class="crud-table">
                        <thead>
                            <tr>
                                <th width="50">ID</th>
                                <th width="80">Image</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th width="150">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td><img src="assets/img/characters/Tomas Shelby.png" class="table-img"></td>
                                <td>Thomas Shelby</td>
                                <td>Leader of the Birmingham criminal gang...</td>
                                <td>
                                    <a href="#" class="btn btn-edit">Edit</a>
                                    <a href="#" class="btn btn-del">Delete</a>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td><img src="assets/img/characters/arthur.png" class="table-img"></td>
                                <td>Arthur Shelby</td>
                                <td>The eldest of the Shelby siblings...</td>
                                <td>
                                    <a href="#" class="btn btn-edit">Edit</a>
                                    <a href="#" class="btn btn-del">Delete</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                <?php elseif ($page == 'avatars') : ?>
                    <h1 class="page-header">Manage Avatars</h1>
                    <p class="page-sub">Upload assets for user profiles.</p>
                    <a href="#" class="btn btn-add">+ Upload Avatar</a>
                    
                    <table class="crud-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Preview</th>
                                <th>Avatar Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td><img src="assets/img/avatar/character 1.png" class="table-img"></td>
                                <td>Gentleman Hat</td>
                                <td>
                                    <a href="#" class="btn btn-del">Delete</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                <?php elseif ($page == 'roleplay') : ?>
                    <h1 class="page-header">Manage Roleplay</h1>
                    <p class="page-sub">Control the narrative.</p>
                    <a href="#" class="btn btn-add">+ New Story</a>
                    
                    <table class="crud-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Story Title</th>
                                <th>Created Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>The Garrison Pub</td>
                                <td>2023-10-20</td>
                                <td>
                                    <a href="#" class="btn btn-edit">Edit</a>
                                    <a href="#" class="btn btn-del">Delete</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                <?php endif; ?>

            </div>
        </div>
    </div>

</body>
</html>
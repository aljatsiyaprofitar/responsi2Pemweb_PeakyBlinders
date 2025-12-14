<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Peaky Blinders Fanpage</title>
    <link rel="stylesheet" href="assets/css/index.css"> 
</head>
<body>

    <nav class="navbar">
        <div class="nav-links">
            <a href="index.php" class="active"><i class="icon-home"></i> Home</a>
            <a href="characters.php"><i class="icon-group"></i> Character</a>
            <a href="roleplay.php"><i class="icon-gamepad"></i> Roleplay</a>
        </div>
        
        <div class="user-info">
            <span class="username">
                <i class="icon-user"></i> <?= htmlspecialchars($_SESSION['username']); ?>
            </span>
            <a href="logout.php" class="btn-logout"><i class="icon-signout"></i> Logout</a>
        </div>
    </nav>

    <header class="hero">
        <div class="hero-content">
            <h1 class="vintage-title">
                WELCOME TO BIRMINGHAM, <?= strtoupper(htmlspecialchars($_SESSION['username'])); ?>
            </h1>            
            <blockquote class="hero-quote">
                "I'm not a traitor to my class. I am just an extreme example of what a working man can achieve."
        </div>
    </header>

    <main class="container">
        <div class="cards-wrapper">
            
            <div class="feature-card">
                <div class="icon-large">👥</div> <h2>Meet the Characters</h2>
                <p>Explore detailed profiles of the Shelby family and their associates from Birmingham's most notorious gang.</p>
                <a href="characters.php" class="card-link">Explore Now</a> 
            </div>

            <div class="feature-card">
                <div class="icon-large">🎮</div> <h2>Roleplay Adventures</h2>
                <p>Make critical decisions as you navigate the dangerous world of 1920 Birmingham in this interactive story.</p>
                <a href="roleplay.php" class="card-link">Start Journey</a>
            </div>

            <div class="feature-card info-card">
                <div class="icon-large">ℹ️</div>
                <h2>About the Peaky Blinders</h2>
                <p>
                    Set in Birmingham, England, the series follows the exploits of the Shelby crime family 
                    in the direct aftermath of the First World War. The fictional family is loosely based 
                    on a real urban youth gang...
                </p>
            </div>

        </div>
    </main>

</body>
</html>
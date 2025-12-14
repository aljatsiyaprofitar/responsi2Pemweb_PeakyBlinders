<?php
session_start();
// Ambil pesan kata-kata terakhir dari session
$death_msg = $_SESSION['game_over_msg'] ?? "You died in the streets of Birmingham.";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Game Over</title>
    </head>
<body class="game-over-bg">
    
    <div class="game-over-content">
        <h1 class="text-horror">GAME OVER</h1>
        
        <p class="death-quote">
            "<?= htmlspecialchars($death_msg); ?>"
        </p>
        
        <img src="assets/images/peaky-cap.png" alt="Peaky Cap" class="fallen-cap">
        
        <a href="rp_mission_dashboard.php" class="btn-retry">Kembali ke Mission</a>
    </div>

</body>
</html>
<?php
require 'includes/functions.php';
$characters = getAllCharacters();
?>

<div class="character-grid">
    <?php foreach ($characters as $char): ?>
        <div class="card">
            <h3><?= htmlspecialchars($char['name']); ?></h3>
            <span class="role"><?= htmlspecialchars($char['role']); ?></span>
            <p><?= htmlspecialchars($char['short_description']); ?></p>
            
            <a href="character_detail.php?id=<?= $char['id']; ?>" class="btn-read-more">See Details</a>
        </div>
    <?php endforeach; ?>
</div>
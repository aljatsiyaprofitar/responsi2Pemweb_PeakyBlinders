<?php
require 'includes/functions.php';
$characters = getAllCharacters();
?>

<div class="character-grid">
    <?php foreach ($characters as $char): ?>
        <div class="card">
            <img src="assets/images/<?= htmlspecialchars($char['image_url']); ?>" alt="<?= htmlspecialchars($char['name']); ?>">

            <h3><?= htmlspecialchars($char['name']); ?></h3>
            <span class="role"><?= htmlspecialchars($char['role']); ?></span>
            <p><?= htmlspecialchars($char['short_desc']); ?></p>
            
            <a href="character_detail.php?id=<?= $char['char_id']; ?>" class="btn-read-more">See Details</a>
        </div>
    <?php endforeach; ?>
</div>
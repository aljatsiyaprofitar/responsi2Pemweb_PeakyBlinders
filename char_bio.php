<?php
require 'includes/functions.php';

$id = $_GET['id'] ?? 0; 
$character = getCharacterById($id);
if (!$character) {
    echo "Karakter tidak ditemukan!";
    exit;
}
$timeline = getCharacterTimeline($character['char_id']);
?>

<div class="detail-container">
    <div class="frame-image">
        <img src="assets/images/<?= $character['image_path']; ?>" alt="<?= $character['name']; ?>">
    </div>
    
    <div class="bio-content">
        <h1><?= $character['name']; ?></h1>
        <blockquote class="quote">
            "<?= htmlspecialchars($character['quotes']); ?>"
        </blockquote>
        <p class="long-desc">
            <?= nl2br(htmlspecialchars($character['long_desc'])); ?>
        </p>
    </div>
</div>

<div class="timeline-section">
    <h2>The Life Path of <br> <?= $character['name']; ?></h2>
    
    <div class="timeline-container">
        <?php foreach ($timeline as $event): ?>
            <div class="timeline-item">
                <div class="year"><?= htmlspecialchars($event['year_period']); ?></div>
                <div class="event-desc"><?= htmlspecialchars($event['event_description']); ?></div>
            </div>
            <?php endforeach; ?>
    </div>
</div>
<?php
require 'includes/functions.php';

$id = $_GET['id'] ?? 1; 
$character = getCharacterById($id);
$timeline = getCharacterTimeline($id);

if (!$character) { die("Character not found."); }
?>

<div class="detail-container">
    <div class="frame-image">
        <img src="assets/images/<?= $character['image_path']; ?>" alt="<?= $character['name']; ?>">
    </div>
    
    <div class="bio-content">
        <h1><?= $character['name']; ?></h1>
        <blockquote class="quote">
            "<?= $character['quote']; ?>"
        </blockquote>
        <p class="long-desc">
            <?= nl2br(htmlspecialchars($character['long_description'])); ?>
        </p>
    </div>
</div>

<div class="timeline-section">
    <h2>The Life Path of <br> <?= $character['name']; ?></h2>
    
    <div class="timeline-container">
        <?php foreach ($timeline as $event): ?>
            <div class="timeline-item">
                <div class="year"><?= $event['year_period']; ?></div>
                <div class="event-desc"><?= $event['event_description']; ?></div>
            </div>
            <?php endforeach; ?>
    </div>
</div>
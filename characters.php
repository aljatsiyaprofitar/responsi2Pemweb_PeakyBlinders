<?php
require 'includes/functions.php';
$characters = getAllCharacters();
?>

<!DOCTYPE html>
<html>
<head>
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta charset="utf-8" />

    <!-- CSS -->
    <link rel="stylesheet" href="Karakter.css" />

<body>
<div class="desktop">

    <div class="header"></div>

    <a href="index.html" class="nav-link">
        <div class="nav-item-container nav-home">
            <img class="nav-icon" src="Avatar img/home.png" />
            <div class="nav-text home-text">Home</div>
        </div>
    </a>

    <a href="Karakter.html" class="nav-link">
        <div class="tanda"></div>
        <div class="nav-item-container nav-character">
            <img class="nav-icon" src="Avatar img/character.png" />
            <div class="nav-text character-text">Character</div>
        </div>
    </a>

    <a href="Avatar.html" class="nav-link">
        <div class="nav-item-container nav-roleplay">
            <img class="nav-icon" src="Avatar img/roleplay.png" />
            <div class="nav-text roleplay-text">Roleplay</div>
        </div>
    </a>

    <a href="Start.html" class="nav-link">
        <div class="nav-item-container nav-profile">
            <img class="nav-icon" src="Avatar img/profile.png" />
            <div class="nav-text profile-text">Aljatsiya</div>
        </div>
    </a>

    <a href="Halaman1.html" class="nav-link">
        <div class="nav-item-container nav-logout">
            <img class="nav-icon" src="Avatar img/logout.png" />
            <div class="nav-text logout-text">Logout</div>
        </div>
    </a>

    <!-- BACKGROUND -->
    <img class="background" src="Index img/background.png">

    <!-- TITLE -->
    <div class="title">The Peaky Blinders</div>

    <p class="subtitle">
        Meet the member of Birmingham’s most notorious gang. Each character plays a vital role in the Shelby family’s rise to power.
    </p>

    <!-- CHARACTER BOX -->
    <div class="box Tomas" onclick="location.href='ThomasShelby.html'"></div>
    <div class="box Arthur" onclick="location.href='ArthurShelby.html'"></div>
    <div class="box Polly" onclick="location.href='PollyGray.html'"></div>
    <div class="box John" onclick="location.href='JohnShelby.html'"></div>
    <div class="box Ada" onclick="location.href='AdaShelby.html'"></div>
    <div class="box Finn" onclick="location.href='FinnShelby.html'"></div>

    <!-- NAMES -->
    <p class="char cThomas">Thomas Shelby<br><span>Leader of the Peaky</span></p>
    <p class="char cArthur">Arthur Shelby<br><span>Deputy Leader</span></p>
    <p class="char cPolly">Polly Gray<br><span>Treasure & Matriarch</span></p>
    <p class="char cJohn">John Shelby<br><span>Enforcer</span></p>
    <p class="char cAda">Ada Shelby<br><span>Shelby Sister</span></p>
    <p class="char cFinn">Finn Shelby<br><span>Youngest Brother</span></p>

    <!-- DESCRIPTIONS -->
    <p class="desc dThomas">The calculating and ambitious leader of the Shelby family and the Peaky Blinders gang.</p>
    <p class="desc dArthur">The eldest Shelby brother, known for his fierce temper and unwavering loyalty.</p>
    <p class="desc dPolly">The wise and formidable matriarch who managed the business while the men were at war.</p>
    <p class="desc dJohn">The third Shelby brother, hot-headed and fiercely loyal to his family.</p>
    <p class="desc dAda">The only Shelby sister, independent and strong-willed, often challenging her brothers.</p>
    <p class="desc dFinn">The youngest Shelby brother, eager to prove himself to his older siblings.</p>

</div>
</body>
</html>

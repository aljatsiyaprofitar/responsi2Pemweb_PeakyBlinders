<?php
require_once __DIR__ . '/../config/koneksi.php';

function getAllCharacters() {
    global $koneksi;
    
    $query = "SELECT * FROM characters";
    $result = mysqli_query($koneksi, $query);
    
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function getCharacterById($id) {
    global $koneksi;
    
    $id = intval($id); 
    
    $query = "SELECT * FROM characters WHERE id = $id";
    $result = mysqli_query($koneksi, $query);
    
    return mysqli_fetch_assoc($result);
}

function getCharacterTimeline($character_id) {
    global $koneksi;
    
    $character_id = intval($character_id);
    
    $query = "SELECT * FROM life_paths WHERE character_id = $character_id ORDER BY display_order ASC";
    $result = mysqli_query($koneksi, $query);
    
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
?>
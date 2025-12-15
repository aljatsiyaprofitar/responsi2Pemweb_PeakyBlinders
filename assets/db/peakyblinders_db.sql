CREATE DATABASE peakyblinders_db;

USE peakyblinders_db;

CREATE TABLE users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    role ENUM('admin', 'user') DEFAULT "user",
    username VARCHAR(100) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users (role, username, email, password)
VALUES ('admin', 'ADMIN', 'admin@gmail.com', 'admin123');

CREATE TABLE characters (
    char_id INT(20) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    role VARCHAR (100),
    short_desc TEXT,
    long_desc TEXT,
    quotes TEXT,
    image_url VARCHAR(255)
);

CREATE TABLE timeline (
    time_id INT(20) AUTO_INCREMENT PRIMARY KEY,
    character_id INT NOT NULL,
    year_period VARCHAR(50),
    event_description TEXT,
    display_order INT DEFAULT 0,
    FOREIGN KEY (character_id) REFERENCES characters(char_id) ON DELETE CASCADE
);

CREATE TABLE roleplay_char (
    rp_char_id INT(20) AUTO_INCREMENT PRIMARY KEY,
    avatar_image_url VARCHAR(255),
    rp_char_name VARCHAR(100) NOT NULL,
    high_score INT(20)
);

CREATE TABLE rp_mission(
    mission_id INT(20) AUTO_INCREMENT PRIMARY KEY,
    op_text TEXT,
    choices_text TEXT,
    choice_one TEXT,
    choice_two TEXT,
    next_text1 TEXT,
    next_text2 TEXT,
    next_text3 TEXT,
    gameover_quotes1 TEXT,
    gameover_quotes2 TEXT,
    gameover_quotes3 TEXT,
    win_txt TEXT
)
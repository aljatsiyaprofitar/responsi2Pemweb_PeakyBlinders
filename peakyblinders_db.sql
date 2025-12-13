CREATE DATABSE peakyblinders_db;

USE peakyblinders_db;

CREATE TABLE users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE characters (
    char_id INT(20) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    role VARCHAR (100),
    short_desc TEXT,
    long_desc TEXT,
    quotes TEXT,
    image_url VARCHAR(255)
);

CREATE TABLE timelline (
    time_id INT(20) AUTO_INCREMENT PRIMARY KEY,
    character_id INT NOT NULL,
    year_period VARCHAR(50),
    event_description TEXT,
    display_order INT DEFAULT 0,
    FOREIGN KEY (character_id) REFERENCES characters(char_id) ON DELETE CASCADE
);

CREATE TABLE rp_char (
    rp_char_id INT(20) AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    timeline VARCHAR(300) NOT NULL
);
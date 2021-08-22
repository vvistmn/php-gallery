<?php

require_once '../includes/init.php';

function up () {
    global $database;

    $sql = "
        CREATE TABLE gallery_db.users (
            id BIGINT UNSIGNED auto_increment NOT NULL,
            username VARCHAR(255) NOT NULL,
            password varchar(100) NOT NULL,
            first_name varchar(100) NOT NULL,
            last_name varchar(100) NOT NULL,
            CONSTRAINT users_id_PK PRIMARY KEY (id),
            CONSTRAINT users_username_UN UNIQUE KEY (username)
        )
        ENGINE=InnoDB
        DEFAULT CHARSET=utf8
        COLLATE=utf8_general_ci;
    ";

    $database->query($sql);

    return 'Table users created';
}

function down () {
    global $database;

    $sql = "
        DROP TABLE IF EXISTS gallery_db.users;
    ";

    $database->query($sql);

    return 'Table users deleted';
}

if (!empty($_GET['migrate'] === 'up')) {
    echo up();
} elseif (!empty($_GET['migrate'] === 'down')) {
    echo down();
}
<?php

require_once '../includes/init.php';

function up () {
    global $database;

    $sql = "
        INSERT INTO gallery_db.users
            (username, password, first_name, last_name)
            VALUES('vi', '123', 'V', 'I');
    ";

    $database->query($sql);

    return 'Add new user';
}

function down () {
    global $database;

    $sql = "
        DELETE FROM gallery_db.users
	        WHERE username = 'vi';
    ";

    $database->query($sql);

    return 'Delete user';
}

if (!empty($_GET['migrate'] === 'up')) {
    echo up();
} elseif (!empty($_GET['migrate'] === 'down')) {
    echo down();
}
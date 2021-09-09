<?php

function autoloadClass($class) {
    $class = strtolower($class);
    $path = "includes/{$class}.php";

    if (is_file($path) && !class_exists($class)) {
        require_once $path;
    } else {
        die('File '.($class).'.php not found');
    }
}

spl_autoload_register('autoloadClass');

<?php

define('ROOT', dirname(__DIR__));

spl_autoload_register(function ($class) {

    $file = ROOT . '/' . str_replace('\\', '/', $class) . '.php';
    if (is_file($file))
        include_once $file;
});

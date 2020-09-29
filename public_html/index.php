<?php


use vendor\Router;

ini_set('display_errors', 1);
error_reporting(E_ALL);




require_once ('../vendor/Autoload.php');
require_once ('../config/UrlManager.php');

session_start();

$query = rtrim($_SERVER['QUERY_STRING'], '/');


Router::dispatch($query);



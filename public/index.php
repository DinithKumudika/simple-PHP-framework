<?php

// entry point for the application
require '../app/config/app.config.php';

session_start();

$uri = $_SERVER['REQUEST_URI'];
$uri = parse_url(explode(APP_NAME, $uri)[1])['path'];

echo $uri;
echo APP_ROOT;

$routes = [
     '/' => APP_ROOT . DIRECTORY_SEPARATOR .'controllers' . DIRECTORY_SEPARATOR . 'index.php',
     '/login' => APP_ROOT . DIRECTORY_SEPARATOR .'controllers' . DIRECTORY_SEPARATOR . 'login.php',
     '/signup' => APP_ROOT . DIRECTORY_SEPARATOR .'controllers' . DIRECTORY_SEPARATOR . 'signup.php'
];

if(array_key_exists($uri, $routes)){
     include $routes[$uri];
}

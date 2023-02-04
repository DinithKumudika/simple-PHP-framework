<?php

// entry point for the application
require '../app/init.php';

use Classes\Core\Router;
use Classes\Core\Dbh;

session_start();

$config = require ('../app/config/config.php');

$db = new Dbh($config['database']);

$router = new Router();

$router->addRoute('/', 'index');
$router->addRoute('/login' , 'login');
$router->addRoute('/signup', 'signup');

$router->route();

// $uri = $_SERVER['REQUEST_URI'];
// $uri = parse_url(explode(APP_NAME, $uri)[1])['path'];

// $routes = [
//      '/' => APP_ROOT . DIRECTORY_SEPARATOR .'controllers' . DIRECTORY_SEPARATOR . 'index.php',
//      '/login' => APP_ROOT . DIRECTORY_SEPARATOR .'controllers' . DIRECTORY_SEPARATOR . 'login.php',
//      '/signup' => APP_ROOT . DIRECTORY_SEPARATOR .'controllers' . DIRECTORY_SEPARATOR . 'signup.php'
// ];

// function route($uri, $routes){
//      if(array_key_exists($uri, $routes)){
//           include $routes[$uri];
//      }
//      else{
//           http_response_code(404);
//           require APP_ROOT . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . '404.php';
//           die();
//      }
// }

// route($uri, $routes);



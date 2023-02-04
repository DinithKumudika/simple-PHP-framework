<?php
namespace Classes\Core;
use Classes\Core\Response;

class Router {
     private $uri;

     // add your routes to this array
     private $routes = [];

     public function __construct()
     {
          $this->uri = parse_url(explode(APP_NAME, $_SERVER['REQUEST_URI'])[1])['path'];
     }

     public function addRoute($route, $handler){
          $this->routes[$route] = APP_ROOT . DIRECTORY_SEPARATOR .'controllers' . DIRECTORY_SEPARATOR . $handler .'.php';
     }

     public function route(){
          if(array_key_exists($this->uri, $this->routes)){
               include $this->routes[$this->uri];
          }
          else{
               self::abort(Response::NOT_FOUND);
          }
     }

     public static function abort($status_code = null){
          switch($status_code){
               case 404:
                    http_response_code(404);
                    require APP_ROOT . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . '404.php';
                    break;
               case 403:
                    http_response_code(403);
                    require APP_ROOT . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . '403.php';
                    break;
          }

          die();
     }

     public function getUri(){
          return $this->uri;
     }
}
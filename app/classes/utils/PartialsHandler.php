<?php
namespace Utils;


class PartialHandler {

     public static string $partial;
     public static string $partialsPath = APP_ROOT . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR .  'partials' . DIRECTORY_SEPARATOR;

     public static function render($partial){
          self::$partial = $partial;

          switch (self::$partial){
               case 'header':
                    include self::$partialsPath . 'header.php';
                    break;
               case 'footer':
                    include self::$partialsPath . 'footer.php';
                    break;
               case 'navbar':
                    include self::$partialsPath . 'navbar.php';
                    break;
               case 'sidebar':
                    include self::$partialsPath . 'sidebar.php';
                    break;
               default:
                    break;
          }
     }
}
<?php

class CSRFProtector
{
     private static $token;

     public static function init()
     {
          // check if the token already exists in the session
          if (!isset($_SESSION['csrf_token'])) {
               // if not, generate a new token
               self::$token = bin2hex(random_bytes(32));
               $_SESSION['csrf_token'] = self::$token;
          } 
          else {
               // if it exists, use the existing token
               self::$token = $_SESSION['csrf_token'];
          }
     }

     public static function getToken()
     {
          return self::$token;
     }

     public static function validateRequest()
     {
          // check if the request contains a valid token
          if (isset($_POST['csrf_token']) && $_POST['csrf_token'] === self::$token) {
               return true;
          } 
          else {
               return false;
          }
     }
}

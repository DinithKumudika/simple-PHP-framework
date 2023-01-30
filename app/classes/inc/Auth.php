<?php

class Auth
{
     private $db;

     public function __construct($database)
     {
          $this->db = $database;
     }

     public function login($username, $password)
     {
          // Check if the user exists in the database
          $query = "SELECT * FROM `users` WHERE `username` = :username AND `password` = :password";
          $stmt = $this->db->prepare($query);
          $stmt->bindParam(':username', $username);
          $stmt->bindParam(':password', $password);
          $stmt->execute();

          $user = $stmt->fetch(PDO::FETCH_ASSOC);
          if ($user) {
               // store the user's ID in session
               $_SESSION['user_id'] = $user['id'];
               return true;
          } 
          else {
               return false;
          }
     }

     public function logout()
     {
          // End the current session
          session_destroy();
     }

     public function check()
     {
          // Check if a user is logged in
          return isset($_SESSION['user_id']);
     }
}

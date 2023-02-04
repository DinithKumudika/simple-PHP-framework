<?php

namespace Classes\Core;

use PDO;
use PDOException;

Class Dbh {

     public $connection;
     public $stmt;
     
     public function __construct($config)
     {
          try {

               $dsn = "{$config['conn']}:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}";

               $options = [
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
               ];
               
               $this->connection = new PDO($dsn, $config['DB_USER'], $config['DB_PASS'], $options);
          } 
          catch (PDOException $e) {
               echo $e->getMessage(); 
          }
     }

     public function prepare($sql)
     {
          $this->stmt = $this->connection->prepare($sql);
     }

     public function execute($params)
     {
          return $this->stmt->execute($params);
     }

     public function query($sql)
     {
          $this->stmt = $this->connection->query($sql);
          return $this->stmt->fetch();
     }

     public function queryAll($sql)
     {
          $this->stmt = $this->connection->query($sql);
          return $this->stmt->fetchAll();
     }

     public function rowCount()
     {
          return $this->stmt->rowCount();
     }
}
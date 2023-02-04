<?php

return [
     'application' => [
          'app_name' => 'template',
          'app_root' => dirname(__FILE__, 2),
          'url_root' => 'http://localhost/template',
     ],

     'database' => [
          'conn' => 'mysql',
          'charset' => 'utf8mb4',
          'host' => 'localhost',
          'user' => '',
          'pass' => '',
          'dbname' => ''
     ]
];


// // database connection name ex-: mysql
// define('DB_CONN', 'mysql');
// // database encoding used ex-: utf8
// define('DB_ENCODING', 'utf8mb4');
// // database host ex-: localhost
// define('DB_HOST', '');
// // database username
// define('DB_USER', '');
// // database password
// define('DB_PASS', '');
// // database name
// define('DB_NAME', '');
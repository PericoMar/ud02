<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'sistema_reservas');
define('DB_USER', 'user_dwes');
define('DB_PASS', 'userUSER2');

$pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
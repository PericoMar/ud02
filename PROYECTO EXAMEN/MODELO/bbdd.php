<?php
// bbdd.php
include_once('config.php');
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    $conn = null;
}

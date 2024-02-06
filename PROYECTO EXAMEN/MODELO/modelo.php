<?php

include_once('bbdd.php');

function createUser($email, $pass){
    global $conn;
    // Query para añadir usuarios solo si no existen:
    $query="INSERT INTO client (email, password)
    SELECT * FROM (SELECT '$email', '$pass') AS tmp
    WHERE NOT EXISTS (
        SELECT email FROM client WHERE email = '$email'
    ) LIMIT 1;
    ";
    $conn->query($query);
}

function userExists($email){
    global $conn;
    $query="SELECT email FROM CLIENT WHERE email = '$email';";
    $result = $conn->query($query);
    return $result->fetch(PDO::FETCH_ASSOC);
}

function passwdMatch($email , $pass){
    global $conn;
    $query="SELECT email FROM CLIENT WHERE email = '$email' AND password = '$pass';";
    $result = $conn->query($query);
    return $result->fetch(PDO::FETCH_ASSOC);
}

function reservasActivas($email){
    global $conn;
    $query="SELECT *
    FROM BOOKING
    WHERE date >= CURDATE() AND time >= CURTIME() AND client_email = 'cliente@ejemplo.com';
    ";
    $result = $conn->query($query);
    return $result->fetchAll(PDO::FETCH_ASSOC);
}

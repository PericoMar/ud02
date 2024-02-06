<?php

include_once('bbdd.php');

function createUser($email, $pass){
    global $conn;
    $query="INSERT INTO CLIENT (email, password) VALUE ('$email', '$pass');";
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
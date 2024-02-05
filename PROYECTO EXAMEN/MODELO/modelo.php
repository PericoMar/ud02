<?php

include_once('bbdd.php');

function userExists($email){
    global $conn;
    $query="SELECT email FROM CLIENT WHERE email = $email;";
    $result = $conn->query($query);
    return $result;
}
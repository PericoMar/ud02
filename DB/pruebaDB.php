<?php
    $dwes = new mysqli();
    try{
        $dwes->connect('localost', 'user_dwes', 'userUSER2', 'dwes');
    }catch(mysqli_sql_exception $e){}
    $errorNum = $dwes->connect_errno;
    $errorMes = $dwes->connect_error;
    if ($errorNum == 0) {
        echo "<p>Conexión establecida con éxito!</p>";
    } else {
        echo "<p>Error $errorNum conectando a la base de datos: $errorMes </p>";
    }
    
?>
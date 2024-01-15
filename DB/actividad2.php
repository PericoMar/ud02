<?php
    $dwes = new mysqli();
    try{
        $dwes->connect('localhost', 'user_dwes', 'userUSER2', 'dwes');
    }catch(mysqli_sql_exception $e){}  
    $errorNum = $dwes->connect_errno;
    $errorMes = $dwes->connect_error;
    $dwes->autocommit(false);
    if ($errorNum == 0) {
        $dwes->query("UPDATE STOCK
        SET unidades = 49
        WHERE producto = '3DSNG' AND tienda = 1;
        ");

        $dwes->query("INSERT INTO stock (producto, tienda, unidades)
         VALUES ('3DSNG', 2, 1);");

        if($dwes->commit()){
            echo "<h3>Se han pasado los productos de las tiendas correctamente</h3>";
        } else {
            echo "<h3>No se ha conseguidoooo";
        }
    } else {
        echo "<p>Error $errorNum conectando a la base de datos: $errorMes </p>";
    }


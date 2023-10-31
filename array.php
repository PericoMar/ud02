<?php
$contactos = array("Juan"=>array("Tlfnos"=>"1", "Email"=> "pepe@mail.com"), "Pepe"=>array("Tlfnos"=>"1", "Email"=> "pepe@mail.com"),
    "Pedro"=>array("Tlfnos"=>"1", "Email"=> "pepe@mail.com"));
    foreach($contactos as $clave1=>$contacto){
        echo "<strong>Nombre contacto: $clave1: </strong></br>";
        foreach($contacto as $clave2=>$valor){
            echo "<strong>$clave2: </strong>$valor</br>";
        }
        echo "</br>";
    }
?>
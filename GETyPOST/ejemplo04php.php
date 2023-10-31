<?php
    echo "Tu nombre es ".$_POST["nombre"].$_POST["apellido"];
    echo "Tus intereses son: </br>";
    foreach($_POST["interes"] as $valor){
        echo "-".$valor."</br>"; 
    }
?>
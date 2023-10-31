<?php
$cadena= "Prueba";
for($i=strlen($cadena)-1;$i>=0;$i--){
    echo substr($cadena,$i,1);
}
?>
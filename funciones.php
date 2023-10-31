<?php
function suma(){
    $tabla=func_get_args();
    foreach($tabla as $valores){
        echo "$valores</br>";
    }
}

suma(1,2,3,4,5,56,67);
?>
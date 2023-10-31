<?php
    $tabla = array(1,3,4,5,5,7,8,3,2,2);
    while(count($tabla)>0){
        $i=0;
        $buscado=$tabla[$i];
        $contador=0;
        $j=0;
        while($j<count($tabla)){
            if($buscado==$tabla[$j]){
                $contador++;
                array_splice($tabla, $j, 1);
            } else {
                $j++;
            }
        }
        if($contador > 1){
            echo "$buscado aparece $contador veces</br>";
        } else {
            echo "$buscado aparece 1 vez</br>";
        }
    }
    /*
    $tabla = array(1, 3, 4, 5, 5, 7, 8, 3, 2, 2);
    $conteo = array_count_values($tabla);

    foreach ($conteo as $elemento => $frecuencia) {
        if ($frecuencia > 1) {
            echo "$elemento aparece $frecuencia veces<br>";
        } else {
            echo "$elemento aparece 1 vez<br>";
        }
    }
*/
?>
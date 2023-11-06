<?php

/**
 *  Reanudamos la sesion.
 */

session_start();

/**
 * Si no se han seteado las filas o las columnas se cambia el valor de la variable 
 * mensaje a Debes introducir las filas y columnas y se redirige a la pagina principal.
 */

if(!isset($_POST['filas']) || !isset($_POST['columnas'])) {
    $_SESSION["mensaje"]="Debes introducir las filas y columnas";
    header("location:u03_a04_cp.php");
}

/**
 * Si alguno de los campos esta vacio se cambia el valor de la variable mensaje y se redirige
 * a la apgina principal.
 */
else{
    if(empty($_POST['filas']) ||
       empty($_POST['columnas']) ||
       empty($_POST['fila']) ||
       empty($_POST['columna'])) {
           $_SESSION['mensaje']="Debes rellenar todos los datos";
           header("location:u03_a04_cp.php");
       }

    /**Una vez comprobado todo se sanea con strip_tags. 
    * se crea una matriz la cual sus elementos son los indices + 1 y multiplicados
    */

    else {
        $filas=strip_tags($_POST['filas']);
        $columnas=strip_tags($_POST['columnas']);
        $fila=strip_tags($_POST['fila']);
        $columna=strip_tags($_POST['columna']);
        $tabla=array();
        for($i=0;$i<$filas;$i++) {
         for($j=0;$j<$columnas;$j++) {
            $tabla[$i][$j]=($i+1)*($j+1);
         }
        }
        
        /**
         * Se dibuja la tabla con un style.
         */

        echo "<table style='border:3px solid blue;border-collapse:collapse'>";
        for($i=0;$i<$filas;$i++) {
            echo "<tr>";
            for($j=0;$j<$columnas;$j++) {
                echo "<td style='border:3px solid blue;width:30px;height:30px;'>";
                echo $tabla[$i][$j];
                echo "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
        echo "<br/>";

        /**
         * Se indica que valor ahí en el indice escogido por el usuario.
         * Se resta uno en los indices porque el usuario no sabe que los indices en PHP
         * empiezan en 0.
         */
        
        echo "<h4>En la fila $fila columna $columna tenemos el valor: ";
        echo $tabla[$fila-1][$columna-1];
        echo "</h4>";
    }
}
?>

<?php

/**
 * Iniciamos sesion.
 */

session_start();

/**
 * Si no estan seteadas las variables filas o columnas
 * se cambia el valor del mensaje y se redirige a la pagina principal. 
 */

if(!isset($_POST['filas']) || !isset($_POST['columnas'])) {
    $_SESSION["mensaje"]="Debes introducir las filas y columnas";
    header("location:u03_a04_cp.php");
}

/**
 * Si algun input esta vacio se cambia el valor al mensaje y te redirige a la
 * pagina principal.
 */

else{
    if(empty($_POST['filas']) ||
       empty($_POST['columnas']) ||
       empty($_POST['fila']) ||
       empty($_POST['columna'])) {
           $_SESSION['mensaje']="Debes rellenar todos los datos";
           header("location:u03_a04_e/u03_a04_cp.php");
       }

    /**
     * Si esta todo correcto y el usuario introdujo un indice que exista, 
     * se sanean las variables y se crea la matriz
     */
    
    else {
        try {
            if($fila<=$filas && $columna<=$columnas) {
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
                 * Se pinta la matriz con style.
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
                echo "<h4>En la fila $fila columna $columna tenemos el valor: ";
                echo $tabla[$fila-1][$columna-1];
                echo "</h4>";
            }

            /**
             * Si no se ha itroducido un indice (fila y columna) valido, es decir
             * dentro de los limites se lanza una excepcion, con mensaje "Fila o columna incorrecta"
             */

            else {
                throw new Exception("Fila o columna incorrecta");
            }

            /**
             * Si hemos lanzado la excepcion a la varaible mensaje se le da el valor de getMessage
             * del objeto excepcion lanzada antes y nos redirigimos a la pagina principal.
             */
        }
        catch(Exception $excepcion) {
            $_SESSION['mensaje']=$excepcion->getMessage();
            header("location:u03_a04_cp.php");
        }   
    }
}
?>

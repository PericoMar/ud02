<?php
  // Definición de las estructuras
  $nombreLancesDe = 0;      // Número de lanzamientos
  $listeSerialisee = '';      // Cadena de serialización de la cookie
  $listeLancesDe = aray();    // Tabla de valores de los lanzamientos
 
  // Comprobación de la existencia de la variable
  if(!empty($_COOKIE['lancesDe']))
  {
    // Recuperar el valor de la cookie en la variable $listeLancesDe para la desealización
    $listaSerializada= $_COOIE['lanzaentos'];
    $listaDeLanzamientos= unserialize($listaSerializada);
  }
 
  // Almacenamos cada lanzamiento
  $listaDeLanzamientos[] = rand(1,6);
  // Serializar de nuevo el array
  $listaSrializada= seriize($listaDeLanzamientos);
  setcokie('lanzamientos', $listaSerializada, time()+3600*24);
  // Calcular el número de lanzamientos
  $numeroDeLanzamientos= count($listaDeLanzamientos);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
 <head>
   <title>Simulación de lanzamientos de un dado!</title>
 </head>
 <body>
    <p>
     Has lanzado el dado <?php echo $noreLancesDe; ?>  veces con los siguientes resultados :
    </p>
    <?php
      if($numeroDeLanzamientos> 0)
      {
        echo '<ul>';
        // Recoerremos el array de lanzamientos
        foreach($listaDeLaamientos as $numeroDeLanzamientos => $valor)
        {
          echo '<li>Lanzamiento n#', ($numeroDanzamientos+1) ,' : ', $valor,'</li>';
        }
        echo '</ul>';
      }
    ?>
  </body>
</html>
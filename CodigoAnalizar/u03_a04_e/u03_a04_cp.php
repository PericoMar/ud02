<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Caso práctico Unidad 03 Apartado 04</title>
</head>
<body>
<h3>Creación de tabla</h1>
<body>
<?php

/**
 * Iniciamos la sesion.
 */

session_start();

/**
 * Si hay mensaje seteado (porque venimos redirigidos de otro lado)
 * lo saneamos y pintamos por pantalla con formato <h4> 
 */

if(isset($_SESSION['mensaje'])) {
    $mensaje=strip_tags($_SESSION['mensaje']);
    echo "<h4>$mensaje</h4>";
}
?>

<!-- Formulario HTML que pide numero de filas y columnas de una tabla
    y una posicion de esa misma tabla -->

<p>Vamos a crear una tabla en HTML. Especifica cuántas filas 
    y columnas quieres que tenga</p>
<form action="u03_a04_cp_tabla.php" method="POST">
Filas: <input type="number" name="filas" /><br />
Columnas: <input type="number" name="columnas"/><br />
<p>Especifica asimismo qué posición quieres mostrar aparte</p>
Fila: <input type="number" name="fila"/><br/>
Columna: <input type="number" name="columna"/><br/>
<input type="submit" value="Enviar">
</form>
</body>
</html>
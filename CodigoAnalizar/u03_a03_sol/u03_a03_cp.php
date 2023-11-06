<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Caso práctico Unidad 03 Apartado 03</title>
</head>
<body>
<h3>Validación datos usuario</h1>
<body>
<?php

/**
 * session_start() crea una sesión o reanuda la actual basada en un identificador de 
 * sesión pasado mediante una petición GET o POST, o pasado mediante una cookie.
 */
session_start();

/**
 * Si está definida la variable de sesión mensaje, se sanea y se muestra con un echo
 * en formato <h4>.
 */
if (isset($_SESSION['mensaje'])) {
    $mensaje = strip_tags($_SESSION['mensaje']);
    echo "<h4>$mensaje</h4>";
}
?>
<!-- Formulario que pide nombre, apellidos, dirección, población, género y aceptación de condiciones.
    La información es validad por el archivo u03_a03_cp_valida.php -->
<form action="u03_a03_cp_valida.php" method="POST">
Nombre: <input type="text" name="nombre"/><br />
Apellidos: <input type="text" name="apellidos"/><br />
Dirección: <input type="text" name="direccion"/><br />
Población: <input type="text" name="poblacion"/><br />
Género: Masculino <input type="radio" name="genero" value="masculino"/>
Femenino <input type="radio" name="genero" value="femenino"/><br/>
He leído y acepto las condiciones de la página web
<input type="checkbox" name="acepto"/><br/>
<input type="submit" value="Enviar">
</form>
</body>
</html>
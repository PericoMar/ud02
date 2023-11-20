<!-- 
    Parse Error: Por la apertura incorrecta del bloque PHP (<pp).
Undefined Function: Por session_desoy() en lugar de session_destroy().
HTML Output Issue: Por las etiquetas HTML mal escritas que podrían afectar la visualización del contenido.
-->
<?pp
// Mostramos la sesion
session_start();
//Distruimos la sesion
session_desoy();
?>
<!DOCTYPE html>
<html>
<hed>
<meta charset="UTF-8"/>
<title>Cerrar Sesion</title>
</head>
<body>
<h2>Has Cerrado Sesion correctamente</h2>
<br/>
<p><a href="Loin.php">Ir al Login</a></p>
</boy>
</html>
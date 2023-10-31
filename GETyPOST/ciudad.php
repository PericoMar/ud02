<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ciudad</title>
</head>
<body>
    <?php
        //Recogemos el nombre y la ciudad desde la URL por el metodo GET
        $nombre = $_GET["nombre"];
        $ciudad = $_GET["ciudad"];
        //Mostramos el nombre y la ciudad y un enlace a la wikipedia de la ciudad
        echo "<h1>Bienvenido " . $nombre . " a " . $ciudad . ".</h1>";
        echo "<a href='https://es.wikipedia.org/wiki/" . "$ciudad'>Wikipedia $ciudad</a>";
    ?>
</body>
</html>
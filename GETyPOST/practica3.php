<!DOCTYPE html>
<html>
<head>
    <title>Iniciar Sesión</title>
</head>
<body>
    <h1>Iniciar Sesión</h1>
    <form method="post" action="">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre"><br><br>
        <label for="apellidos">Apellidos:</label>
        <input type="text" name="apellidos" id="apellidos"><br><br>
        <label for="direccion">Direccion:</label>
        <input type="text" name="direccion" id="direccion"><br><br>
        <label for="poblacion">Poblacion:</label>
        <input type="text" name="poblacion" id="poblacion" placeholder="p.e:28001-Madrid"><br><br>
        <label for="sexo">Sexo:</label><br><br>
        <input type="radio" name="sexo" value="Masculino" id="sexoM">Masculino<br><br>
        <input type="radio" name="sexo" value="Femenino" id="sexoF">Femenino<br><br>
        <input type="radio" name="sexo" value="Otro" id="sexoO">Otro<br><br>
        <label for="terminos">Acepta los terminos:</label>
        <input type="checkbox" name="terminos" id="terminos"><br><br>
        <input type="submit" value="Iniciar sesión">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["nombre"]) && isset($_POST["apellidos"])
            && isset($_POST["direccion"]) && isset($_POST["poblacion"])
            && isset($_POST["sexo"]) && isset($_POST["terminos"])) {
            $nombre = strip_tags($_POST["nombre"]);
            $apellidos = strip_tags($_POST["apellidos"]);
            $direccion = strip_tags($_POST["direccion"]);
            $poblacion = strip_tags($_POST["poblacion"]);
            $sexo = strip_tags($_POST["sexo"]);
            $terminos = strip_tags($_POST["terminos"]);
            $regex = "/^[0-9]{5}-[A-Z][a-z]{5,20}$/";
            if(!preg_match($regex, $poblacion)){
                echo "Poblacion incorrecta";
            } else {
                require "conexion.php";
            }
        } else {
            echo "Rellene todos los campos.";
            echo "<br><br>";
            echo "Acepte los terminos.";
            echo "<br><br>";
        }
    }
    ?>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>Resultado de Conversión</title>
</head>
<body>
    <h1>Resultado de Conversión</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user = $_POST["user"];
        $password = $_POST["password"];

        $database = [
            "user1" => "1234",
            "user2" => "5678",
            "user3" => "9012"
        ];

        if (array_key_exists($user, $database) && $database[$user] == $password) {
            echo "Inicio de sesión exitoso para el usuario: $user";
        } else if(array_key_exists($user, $database) && $database[$user] != $password) {
            echo "Contraseña incorrecta";
        } else {
            echo "Nombre de usuario o contraseña incorrectos";
        }
    }
    ?>
</body>
</html>
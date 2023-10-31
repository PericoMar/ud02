<!DOCTYPE html>
<html>
<head>
    <title>Iniciar Sesión</title>
</head>
<body>
    <h1>Iniciar Sesión</h1>
    <form method="post" action="">
        <label for="user">User:</label>
        <input type="text" name="user" id="user" required><br><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br><br>
        <input type="submit" value="Iniciar sesión">
    </form>
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


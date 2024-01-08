<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form name="input" action="" method="post" >
        <label for="name">Nombre: </label>
        <input type="text" id="name" name="user_name" />
        <label for="email">Email: </label>
        <input type="text" id="email" name="user_email" />
        <button type="submit">Enviar</button>
    </form>
    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user_name = isset($_POST['user_name']) ? htmlspecialchars($_POST['user_name']) : '';
            $user_email = isset($_POST['user_email']) ? htmlspecialchars($_POST['user_email']) : '';

            if (!empty($user_name) && !empty($user_email)) {
                echo "Bienvenido";
            } else {
                if (empty($user_name)) {
                    echo "Debe rellenar el campo del nombre </br>";
                }
                if (empty($user_email)) {
                    echo "Debe rellenar el campo del email";
                }
            }
        }
    ?>
</body>
</html>



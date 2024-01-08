<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="user-name">Usuario</label>
        <input type="text" name="usuario">
        <label for="password">Contraseña</label>
        <input type="text" name="contraseña">
        <button>Enviar</button>
    </form>
    <?php
        $db = ['user1' => '1234' , 'pedro' => '0511'];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(isset($_POST['usuario']) && isset($_POST['contraseña'])){
                $usuario = $_POST['usuario'];
                $contraseña = $_POST['contraseña'];
                if(array_key_exists($usuario , $db)){
                    if($db[$usuario] !== $contraseña){
                        echo "Contraseña incorrecta";
                    } else {
                        echo "Ha iniciado sesion correctamente";
                    }
                } else {
                    echo "No existe un usuario con ese nombre";
                }
            } else {
                echo "Debe rellenar todos los campos";
            }
        }
    ?>
</body>
</html>
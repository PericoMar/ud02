<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="name">Nombre: </label>
        <input type="text" name="nombre">
        <label for="telephone">Telefono: </label>
        <input type="tel" name="telephone">
        <button action="submit">Agregar a la agenda</button>
    </form>
    <?php
        session_start();

        if(!isset($_SESSION['agenda'])){
            $_SESSION['agenda'] = [];
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(!isset($_POST['nombre'])){
                echo "Debe rellenar el campo de nombre";
            } elseif ()
        }
    ?>
</body>
</html>
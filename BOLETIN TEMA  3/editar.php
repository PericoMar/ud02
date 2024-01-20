<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar producto</title>
</head>
<body>
    <?php
        $servername = "localhost";
        $username = "user_dwes";
        $password = "userUSER2";
        $dbname = "dwes";
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    ?>
    <form action="actualizar.php" method=post>
        <table>
            <thead>
                <tr>
                    <th>NOMBRE_CORTO</th>
                    <th>NOMBRE</th>
                    <th>DESCRIPCIÓN</th>
                    <th>PVP</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if($_SERVER['REQUEST_METHOD'] === 'POST'){
                    $nombre_corto = $_POST['nombre_corto'];
                    $pvp = $_POST['pvp'];
                    $sqlQueryProducto = "SELECT NOMBRE , DESCRIPCION ,COD FROM PRODUCTO WHERE NOMBRE_CORTO = '$nombre_corto'";
                    $result = $conn->query($sqlQueryProducto);
                    $row = $result->fetch(PDO::FETCH_ASSOC);
                    $nombre = $row['NOMBRE'];
                    $desc = $row['DESCRIPCION'];
                    $cod = $row['COD'];
                    ?>
                    <tr>
                        <td><?php echo $nombre_corto ?></td>
                        <td><?php echo $nombre ?></td>
                        <td><?php echo $desc ?></td>
                        <td><?php echo $pvp ?></td>
                    </tr>
                    <?php
                }
                ?>
                <tr>
                    <td>
                        <label for="nombre_corto">Nuevo NOMBRE_CORTO:</label>
                        <input type="text" name="nombre_corto">
                    </td>
                    <td>
                        <label for="nombre">Nuevo NOMBRE:</label>
                        <input type="text" name="nombre">
                    </td>
                    <td>
                        <label for="descripcion">Nueva DESCRIPCIÓN</label>
                        <input type="text" name="descripcion">
                    </td>
                    <td>
                        <label for="pvp">Nuevo PVP:</label>
                        <input type="number" name="pvp">
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- Le paso el cod para usarlo despues en actualizar.php para no tener que hacer otra petición -->
        <input type="hidden" name=cod value=<?php echo $cod ?>>
        <button name="actualizar">Actualizar</button>
        <button name=cancelar>Cancelar</button>
    </form>
</body>
</html>
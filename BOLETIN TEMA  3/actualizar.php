<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $servername = "localhost";
        $username = "user_dwes";
        $password = "userUSER2";
        $dbname = "dwes";
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['actualizar'])){
            $nombre_corto = isset($_POST['nombre_corto']) ? mysqli_real_escape_string($conn, $_POST['nombre_corto']) : '';
            $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($conn, $_POST['nombre']) : '';
            $desc = isset($_POST['descripcion']) ? mysqli_real_escape_string($conn, $_POST['descripcion']) : '';
            $pvp = isset($_POST['pvp']) ? mysqli_real_escape_string($conn, $_POST['pvp']) : '';
            $cod = isset($_POST['cod']) ? mysqli_real_escape_string($conn, $_POST['cod']) : '';
            if ($nombre_corto || $nombre || $desc || $pvp) {
                $query = "UPDATE PRODUCTO 
                          SET 
                            NOMBRE_CORTO = IF('$nombre_corto' <> '', '$nombre_corto', NOMBRE_CORTO),
                            NOMBRE = IF('$nombre' <> '', '$nombre', NOMBRE),
                            DESCRIPCION = IF('$desc' <> '', '$desc', DESCRIPCION),
                            PVP = IF('$pvp' <> '', '$pvp', PVP)
                          WHERE COD = '$cod'";
            
                $stmt = $conn->prepare($query);
                $stmt->bindParam(1, $nombre_corto);
                $stmt->bindParam(2, $nombre);
                $stmt->bindParam(3, $desc);
                $stmt->bindParam(4, $pvp);
                $stmt->bindParam(5, $cod);
            
                // Ejecuta la consulta
                $stmt->execute();
                ?>
                <h1>El producto ha sido actualizado</h1>
                <?php
            }
        } else {
            ?>
            <h1>No se han confirmado los cambios</h1>
            <?php
        }
    ?>
    <form action="listado.php">
                <button>Volver al Inicio</button>
    </form>
</body>
</html>
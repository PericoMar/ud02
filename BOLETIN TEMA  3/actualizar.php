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
            $nombre_corto = isset($_POST['nombre_corto']) ? $_POST['nombre_corto'] : '';
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
            $desc = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
            $pvp = isset($_POST['pvp']) ? $_POST['pvp'] : '';
            $cod = isset($_POST['cod']) ? $_POST['cod'] : '';
            if ($nombre_corto || $nombre || $desc || $pvp) {
                $query = "UPDATE PRODUCTO 
                            SET 
                                NOMBRE_CORTO = CASE WHEN ? <> '' THEN ? ELSE NOMBRE_CORTO END,
                                NOMBRE = CASE WHEN ? <> '' THEN ? ELSE NOMBRE END,
                                DESCRIPCION = CASE WHEN ? <> '' THEN ? ELSE DESCRIPCION END,
                                PVP = CASE WHEN ? <> '' THEN ? ELSE PVP END
                            WHERE COD = ?";

                $stmt = $conn->prepare($query);
                $stmt->bindParam(1, $nombre_corto);
                $stmt->bindParam(2, $nombre_corto);
                $stmt->bindParam(3, $nombre);
                $stmt->bindParam(4, $nombre);
                $stmt->bindParam(5, $desc);
                $stmt->bindParam(6, $desc);
                $stmt->bindParam(7, $pvp);
                $stmt->bindParam(8, $pvp);
                $stmt->bindParam(9, $cod);
            
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
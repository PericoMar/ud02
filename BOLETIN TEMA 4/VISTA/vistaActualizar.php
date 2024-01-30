<?php
    try {
        $servername = "localhost";
        $username = "user_dwes";
        $password = "userUSER2";
        $dbname = "dwes";
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['actualizar'])) {
            $nombre_corto = isset($_POST['nombre_corto']) ? $_POST['nombre_corto'] : '';
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
            $desc = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
            $pvp = isset($_POST['pvp']) ? $_POST['pvp'] : '';
            $cod = isset($_POST['cod']) ? $_POST['cod'] : '';

            if ($nombre_corto || $nombre || $desc || $pvp) {
                actualizarProducto($cod, $nombre_corto, $nombre, $desc, $pvp);
                ?>
                <h1>El producto ha sido actualizado</h1>
                <?php
            } else {
                ?>
                <h1>Debes rellenar alguno de los campos para poder actualizar el producto</h1>
                <?php
            }
        } else {
            ?>
            <h1>No se han confirmado los cambios</h1>
            <?php
        }
    } catch (PDOException $e) {
        ?>
        <h1>Error con la conexión a la base de datos. Asegúrate de estar conectado</h1>
        <h3><?php echo $e->getMessage(); ?></h3>
        <?php
    }
    ?>
    <form action="index.php">
        <button class="btn btn-dark">Volver al Inicio</button>
    </form>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            font-size: 24px;
            margin: 0;
            text-align: center;
        }
        table{
            margin:32px;
            height:400px;
            width:800px;
        }
        button{
            margin:0px 300px;
        }
        footer {
            background-color: #333;
            color: #fff;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
<header>
        <h1>Editar producto</h1>
</header>
    <?php
    try{
        $servername = "localhost";
        $username = "user_dwes";
        $password = "userUSER2";
        $dbname = "dwes";
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    ?>
    <form action="actualizar.php" method=post>
        <div class="table">
            <table class="table table-bordered table-hover" style="width:1400px;">
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
                            <label for="descripcion">Nueva DESCRIPCIÓN:</label>
                            <br>
                            <input type="text" name="descripcion" style="width:400px; height:120px;">
                        </td>
                        <td>
                            <label for="pvp">Nuevo PVP:</label>
                            <input type="number" name="pvp">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Le paso el cod para usarlo despues en actualizar.php para no tener que hacer otra petición -->
        <input type="hidden" name=cod value=<?php echo $cod ?>>
        <div class="btns">
            <button name="actualizar" class="btn btn-success">Actualizar</button>
            <button name=cancelar class="btn btn-danger">Cancelar</button>
        </div>
    </form>
    <?php
    }catch(PDOException $e){    
        ?>
        <h1>Error con la conexión a la base de datos. Asegurate de estar conectado</h1>
        <h3><?php echo $e->getMessage(); ?></h3>
        <?php
    }
    ?>
    <footer>
        <p>&copy; 2024 Pedro Martínez González | Todos los derechos reservados</p>
    </footer>
</body>
</html>
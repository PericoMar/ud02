<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Familias</title>
    <style>
        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            font-size: 24px;
            margin: 0;
            text-align: center;
        }
        main {
            margin : 30px;
        }
        main * {
            margin: 4px;
        }
        label{
            font-size: 32px;
            font-style:bold;
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
        <h1>Listado de Productos</h1>
    </header>
    <main>
    <?php
        $servername = "localhost";
        $username = "user_dwes";
        $password = "userUSER2";
        $dbname = "dwes";
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    ?>

    <form action="" method="post">
        <label for="familias">Seleccione una familia:</label>
        <select name="familias" class="form-select" id=familias>
        <?php
            $sqlQueryFamilias = "SELECT * FROM FAMILIA;";
            $result =  $conn->query($sqlQueryFamilias);
            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                $cod = $row['COD'];
                $nombre = $row['NOMBRE'];
                ?>
                <option value="<?php echo $cod ?>"><?php echo $nombre ?></option>
                <?php
            }
        ?>
        </select>
        <button class="btn btn-success" >Mostrar</button>
    </form>
    
    <?php
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $familia = $_POST['familias'];
            $sqlQueryProductos = "SELECT NOMBRE_CORTO , PVP FROM PRODUCTO WHERE FAMILIA = '$familia'";
            $result = $conn->query($sqlQueryProductos);
            $row = $result->fetch(PDO::FETCH_ASSOC);
            if($row){
                ?>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>PVP</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php
                while($row){
                    $nombre_corto = $row['NOMBRE_CORTO'];
                    $pvp = $row['PVP'];
                    ?>
                        <td><?php echo $nombre_corto ?></td>
                        <td><?php echo $pvp ?></td>
                        <td>
                            <form action="editar.php" method=post>
                                <input type="hidden" name="nombre_corto" value="<?php echo $nombre_corto ?>">
                                <input type="hidden" name="pvp" value="<?php echo $pvp ?>">
                                <button class="btn btn-secondary">Editar</button>
                            </form>
                        </td>
                    </tbody>
                    <?php
                    $row = $result->fetch(PDO::FETCH_ASSOC);
                }
            } else {
                ?>
                <h1>No hay productos en esta familia</h1>
                <?php
            }
        }
    ?>
    </main>

    <?php
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            ?>
            <footer>
                <p>&copy; 2024 Pedro Martínez González | Todos los derechos reservados</p>
            </footer>
            <?php
        }
    ?>
    
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Familias</title>
</head>

<body>
    <?php
        $servername = "localhost";
        $username = "user_dwes";
        $password = "userUSER2";
        $dbname = "dwes";
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    ?>

    <form action="" method="post">
        <label for="familias">Seleccione una familia:</label>
        <select name="familias" id="">
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
        <button>Mostrar</button>
    </form>
    
    <?php
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $familia = $_POST['familias'];
            $sqlQueryProductos = "SELECT NOMBRE_CORTO , PVP FROM PRODUCTO WHERE FAMILIA = '$familia'";
            $result = $conn->query($sqlQueryProductos);
            $row = $result->fetch(PDO::FETCH_ASSOC);
            if($row){
                ?>
                <table>
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
                                <button>Editar</button>
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

</body>

</html>
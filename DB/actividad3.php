<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        * {
            margin: 10px;
        }
    </style>
</head>

<body>
    <?php
    $dwes = new mysqli();
    try {
        $dwes->connect('localhost', 'user_dwes', 'userUSER2', 'dwes');
    } catch (mysqli_sql_exception $e) {
    }
    $productos = $dwes->query('SELECT DISTINCT PRODUCTO FROM STOCK');
    ?>

    <form action="" method="post">
        <select name="producto" id="">
            <?php
            $producto = $productos->fetch_assoc();
            while ($producto != null) {
                $nombreProducto = $producto['PRODUCTO'];
                echo "<option value='" . $nombreProducto . "'>" . $nombreProducto . "</option>";
                $producto = $productos->fetch_assoc();
            }
            ?>
        </select>
        <button action="submit">Elegir producto</button>
    </form>

    <table class="table table-secondary" style="width:50%">
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productoSeleccionado = $_POST['producto'];
            echo "<h1>$productoSeleccionado</h1>";
            $stock = $dwes->query("SELECT TIENDA , UNIDADES FROM STOCK WHERE PRODUCTO = '" . $productoSeleccionado . "';");
            echo "<thead>
                    <tr>
                        <td>SUCURSAL</td>
                        <td>STOCK</td>
                      </tr>
                 </thead>
                 <tbody class'table-group-divider'>";


            $fila = $stock->fetch_assoc();
            while ($fila != null) {
                $tienda = $fila['TIENDA'];
                $unidades = $fila['UNIDADES'];
                echo "<tr>
                            <td>$tienda</td>
                            <td>$unidades</tr>
                         </tr>
                    </tbody>";
                $fila = $stock->fetch_assoc();
            }

        }
        ?>
    </table>

</body>

</html>
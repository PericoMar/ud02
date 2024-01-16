<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Stock</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        form {
            margin-bottom: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <?php
    // Conexión a la base de datos
    $servername = "localhost";
    $username = "user_dwes";
    $password = "userUSER2";
    $dbname = "dwes";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        ?>
        <p>Se ha producido el error:
            <?php echo $dwes->connect_error; ?>.
        </p>
        <?php
        exit();
    }

    // Obtener la lista de productos
    $sql = "SELECT COD, NOMBRE_CORTO FROM PRODUCTO";
    $result = $conn->query($sql);

    // Manejar el envío del formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener el código del producto seleccionado
        $productoSeleccionado = $_POST["producto"];

        // Obtener el stock por tienda para el producto seleccionado
        $sqlStock = "SELECT TIENDA.NOMBRE AS TIENDA, STOCK.UNIDADES AS UNIDADES FROM STOCK, TIENDA
                        WHERE TIENDA.COD = STOCK.TIENDA
                        AND STOCK.PRODUCTO = '$productoSeleccionado'";

        /**
         * RESPUESTA CHAT GPT: 
         * SELECT T.NOMBRE AS TIENDA, 
         *      (SELECT UNIDADES FROM STOCK WHERE PRODUCTO = '$productoSeleccionado' AND TIENDA = T.COD) 
         *      AS UNIDADES FROM TIENDA T";
         */

        $resultStock = $conn->query($sqlStock);
    }


    ?>

    <h2>Consulta de Stock</h2>

    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="producto">Selecciona un producto:</label>
        <select name="producto">
            <?php
            // Mostrar la lista de productos en el cuadro de selección
            while ($row = $result->fetch_assoc()) {
                ?>
                <option value="<?php echo $row["COD"]; ?>">
                    <?php echo $row["NOMBRE_CORTO"]; ?>
                </option>
                <?php
            }
            ?>
        </select>
        <input type="submit" value="Consultar Stock">
        <br>
        <label for="tienda">Selecciona tienda:</label>
        <select name="tienda" id="">
            <option value="1">Tienda 1</option>
            <option value="2">Tienda 2</option>
            <option value="3">Tienda 3</option>
        </select>
        <label for="stock">Inserte unidades:</label>
        <input type="text" name="stock">
        <button name="stock-change" action="submit">Actualizar stock</button>
    </form>

    <?php
    // Mostrar el stock si se ha enviado el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST" && $resultStock->num_rows > 0) {

        ?>
        <h3>Stock del producto seleccionado por tienda:</h3>
        <table>
            <tr>
                <th>Tienda</th>
                <th>Stock</th>
            </tr>
            <?php
            while ($rowStock = $resultStock->fetch_assoc()) {
                ?>
                <tr>
                    <td>
                        <?php echo $rowStock["TIENDA"] ?>
                    </td>
                    <td>
                        <?php echo $rowStock["UNIDADES"] ?>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>

        <?php
        function tieneStockEnTienda($conn, $producto, $tienda)
        {
            return $conn->query("SELECT TIENDA FROM STOCK WHERE PRODUCTO = '$producto'; AND TIENDA = '$tienda'");
        }

        if (isset($_POST['stock-change'])) {
            if (isset($_POST['stock']) && !empty($_POST['stock'])) {
                $stock = $_POST['stock'];
                $tienda = $_POST['tienda'];
                $producto = $_POST['producto'];
                if (tieneStockEnTienda($conn, $producto, $tienda)) {
                    $sqlUpdate = "UPDATE STOCK SET UNIDADES = '$stock' WHERE TIENDA = '.$tienda' AND PRODUCTO = '$producto';";
                } else {
                    $sqlUpdate = "INSERT INTO STOCK VALUES('$producto','$tienda','$stock');";
                }

                $conn->query($sqlUpdate);
            } else {
                ?>
                <h3>Debes rellenar el campo de stock.</h3>
                <?php
            }
        }


    }
    ?>

</body>

</html>
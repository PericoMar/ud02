<form action="index.php" method="post">
    <?php
    // Lógica para mostrar el formulario de edición utilizando los datos de $producto
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre_corto = $_POST['nombre_corto'];
        $pvp = $_POST['pvp'];
        $producto = obtenerProductoPorNombreCorto($nombre_corto);
        ?>
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
                    <tr>
                        <td>
                            <?php echo $nombre_corto ?>
                        </td>
                        <td>
                            <?php echo $producto['NOMBRE'] ?>
                        </td>
                        <td>
                            <?php echo $producto['DESCRIPCION'] ?>
                        </td>
                        <td>
                            <?php echo $pvp ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="nombre_corto">Nuevo NOMBRE_CORTO:</label>
                            <input type="text" name="nombre_corto" value="<?php echo $nombre_corto ?>">
                        </td>
                        <td>
                            <label for="nombre">Nuevo NOMBRE:</label>
                            <input type="text" name="nombre" value="<?php echo $producto['NOMBRE'] ?>">
                        </td>
                        <td>
                            <label for="descripcion">Nueva DESCRIPCIÓN:</label>
                            <br>
                            <input type="text" name="descripcion" style="width:400px; height:120px;"
                                value="<?php echo $producto['DESCRIPCION'] ?>">
                        </td>
                        <td>
                            <label for="pvp">Nuevo PVP:</label>
                            <input type="number" name="pvp" value="<?php echo $pvp ?>">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <input type="hidden" name="cod" value="<?php echo $producto['COD'] ?>">
        <div class="btns">
            <button name="actualizar" class="btn btn-success">Actualizar</button>
            <button name="cancelar" class="btn btn-danger">Cancelar</button>
        </div>
        <?php
    }
    ?>
</form>
<?php
// vista.php
// include_once('../MODELO/modelo.php');

$familias = obtenerFamilias();
?>

<form action="" method="post">
    <label for="familias">Seleccione una familia:</label>
    <select name="familias" class="form-select" id="familias">
        <?php
        foreach ($familias as $familia) {
            $cod = $familia['COD'];
            $nombre = $familia['NOMBRE'];
            ?>
            <option value="<?php echo $cod ?>"><?php echo $nombre ?></option>
            <?php
        }
        ?>
    </select>
    <button class="btn btn-success">Mostrar</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $familia = $_POST['familias'];
    $productos = obtenerProductosPorFamilia($familia);

    if ($productos) {
        ?>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>PVP</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($productos as $producto) {
                    $nombre_corto = $producto['NOMBRE_CORTO'];
                    $pvp = $producto['PVP'];
                    ?>
                    <tr>
                        <td><?php echo $nombre_corto ?></td>
                        <td><?php echo $pvp ?></td>
                        <td>
                            <form action="editar.php" method="post">
                                <input type="hidden" name="nombre_corto" value="<?php echo $nombre_corto ?>">
                                <input type="hidden" name="pvp" value="<?php echo $pvp ?>">
                                <button type="submit" class="btn btn-secondary">Editar</button>
                            </form>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        <?php
    } else {
        echo "<h1>No hay productos en esta familia</h1>";
    }
}
?>

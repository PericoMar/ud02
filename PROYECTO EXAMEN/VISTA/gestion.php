<?php
if ($reservas) {
    ?>
    <div>
    <div class="contenedor-filtro">
            <form action="index.php" method=post class=filtro>
            <input name="fechaFiltrar" type="date" value="<?php echo date('Y-m-d'); ?>">
                <input type="hidden" name="user" value=<?php echo $user ?>>
                <?php
                    if(isset($noHayReservasFiltro)){
                        ?>
                        <p>No hay reservas en esa fecha.</p>
                        <?php
                    }
                ?>
                <button name=filtrar >Filtrar</button>
                <button name=quitar-filtro>Quitar filtro</button>
            </form>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Cliente</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Mesa</th>
                    <th>Descripcion</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($reservas as $reserva) {
                    $clientEmail = $reserva['client_email'];
                    $fecha = $reserva['date'];
                    $hora = $reserva['time'];
                    $mesa = $reserva['table_number'];
                    $desc = $reserva['description'];
                    ?>
                    <tr>
                        <form action="index.php" method=post class=form-gestionar>
                            <td>
                                <?php echo $clientEmail ?>
                            </td>
                            <td>
                                <?php echo $fecha ?>
                                <input type="hidden" name="fecha" value=<?php echo $fecha ?>>
                            </td>
                            <td>
                                <?php echo $hora ?>
                                <input type="hidden" name="hora" value=<?php echo $hora ?>>
                            </td>
                            <td>
                                <?php echo $mesa ?>
                                <input type="hidden" name="mesa" value=<?php echo $mesa ?>>
                            </td>
                            <td class=descripcion>
                                <?php echo $desc ?>
                            </td>
                            <td>
                                <input type="hidden" name="user" value=<?php echo $user ?>>
                                <button name=cancelada-empleado>Cancelar</button>
                            </td>
                        </form>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php
} else {
    ?>
    <form action="index.php" method=post>
        <h1>No hay reservas aún.</h1>
        <input type="hidden" name="user" value=<?php echo $user ?>>
        <button name="empleado-loged">Atras</button>
        <button name=quitar-filtro>Quitar filtro</button>
    </form>
    <?php
}
?>
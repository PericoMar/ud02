<?php
if (isset($reservasActivas)) {
    ?>
    <form action="index.php" method=post class=form-gestionar>
        <table>
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Mesa</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($reservasActivas as $reserva) {
                    $fecha = $reserva['date'];
                    $hora = $reserva['time'];
                    $mesa = $reserva['table_number'];
                    $desc = $reserva['description'];

                    ?>
                    <tr>
                        <td>
                            <?php echo $fecha ?>
                            <input type="hidden" name="fecha">
                        </td>
                        <td>
                            <?php echo $hora ?>
                            <input type="hidden" name="hora">
                        </td>
                        <td>
                            <?php echo $mesa ?>
                            <input type="hidden" name="mesa">
                        </td>
                        <td class=descripcion>
                            <?php echo $desc ?>
                            <input type="hidden" name="desc">
                        </td>
                        <input type="hidden" value=<?php echo $email ?>> 
                        <td><button name=cancelar>Cancelar</button></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </form>
    <?php
} else {
    ?>
    <form action="index.php" method=post>
        <h1>No tienes reservas aún.</h1>
        <p>Recuerda que puedes hacer tus reservas aquí:</p>
        <input type="hidden" name=email value=<?php echo $email ?>>
        <button name="nueva-reserva">Nueva reserva</button>
    </form>
    <?php
}
?>
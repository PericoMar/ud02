<?php
if ($reservasPasadas) {
    ?><div>
        <table>
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Mesa</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($reservasPasadas as $reserva) {
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
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        <div class="btns-href">
            <form action="index.php" method=post>
                <input type="hidden" value=<?php echo $email ?> name=email>
                <button name="gestionar">Gestionar reservas</button>
                <button name="nueva-reserva">Nueva reserva</button>
            </form>
        </div>
        </div>
    <?php
} else {
    ?>
    <form action="index.php" method=post>
        <h1>No tienes reservas pasadas aún.</h1>
        <p>Recuerda que puedes ver tus reservas activas aquí:</p>
        <input type="hidden" name=email value=<?php echo $email ?>>
        <button name="gestionar">Gestionar reservas</button>
    </form>
    <?php
}
?>
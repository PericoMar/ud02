<?php
if ($reservasActivas) {
    ?>
    
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
                        <form action="index.php" method=post class=form-gestionar>
                        <td>
                            <?php echo $fecha ?>
                            <input type="hidden" name="fecha" value=<?php echo $fecha?>>
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
                        <input type="hidden" value=<?php echo $email ?> name=email> 
                        <td><button name=cancelar>Cancelar</button></td>
                        </form>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    
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
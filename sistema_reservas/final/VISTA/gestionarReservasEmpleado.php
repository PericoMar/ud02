<?php
if($reservas){
?>
<h1>Gestión reservas</h1>
<table>
    <thead>
        <tr>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Mesa</th>
            <th>Descripción</th>
            <th>Email Cliente</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($reservas as $reserva) {
            $fecha = $reserva['fecha'];
            $hora = $reserva['hora'];
            $mesa = $reserva['numero'];
            $desc = $reserva['description'];
            $email = $reserva['id_cliente'];

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
                <td>
                    <?php echo $email ?>
                    <input type="hidden" name="email" value=<?php echo $email ?>>
                </td>
                <?php
                    
                ?>
                <td><button name=cancelarReservaEmpleado>Cancelar</button></td>
                </form>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>
<form action="index.php" method=post>
    Filtrar:
    <input type="date" name=fechaFiltrada>
    <button name=filtrar>Filtrar</button>
<button name=atrasEmpleado>Atras</button>
<input type="hidden" name=email value=<?php echo $email ?>>
</form>
<?php
} else {
    ?><h1>No hay reservas</h1>
    <form action="index.php" method=post>
        <button name=atrasEmpleado>Atras</button>
    </form>
    <?php
}
?>
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
                <?php
                    
                ?>
                <td><button name=cancelarReserva>Cancelar</button></td>
                </form>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>
<form action="index.php" method=post>
<button name=atras>Atras</button>
<input type="hidden" name=email value=<?php echo $email ?>>
</form>
<?php
} else {
    ?><h1>No hay reservas activas</h1>
    <form action="index.php" method=post>
        <input type="hidden" name=email value=<?php echo $email ?>>
        <button name=atras>Atras</button>
    </form>
    <?php
}
?>
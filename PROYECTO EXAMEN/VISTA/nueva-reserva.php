<form action="index.php" method=post>
    <h1>Nueva reserva</h1>
    <label for="fecha">Fecha:</label>
    <input type="date" name=fecha min="<?php echo date('Y-m-d'); ?>">
    <label for="hora">Hora:</label>
    <select name="hora" id="hora">
        <option value="20:30">20:30</option>
        <option value="21:00">21:00</option>
        <option value="21:30">21:30</option>
        <option value="22:00">22:00</option>
        <option value="22:30">22:30</option>
        <option value="23:00">23:00</option>
    </select>
    <label for="mesa">Mesa:</label>
    <select name="mesa" id="mesa">
        <option value="1">Mesa 1</option>
        <option value="2">Mesa 2</option>
        <option value="3">Mesa 3</option>
        <option value="4">Mesa 4</option>
        <option value="5">Mesa 5</option>
    </select>
    <label for="desc">Descripción:</label>
    <textarea name="desc" id="" cols="30" rows="5"></textarea>
    <?php
        if(isset($reservaOcupada)){
            ?>
            <small>Mesa ocupada</small>
            <?php
        }
        if(isset($reservaInvalida)){
            ?>
            <small>Lo siento, la reserva no puede ser realizada porque la hora seleccionada ya ha pasado.</small>
            <?php
        }
    ?>
    <input type="hidden" name="email" value=<?php echo $email ?>>
    <button name=reserva-hecha>Reservar</button>
    <div class=flex>
        <button name=gestionar>Gestionar Reservas</button>
        <button name=historico>Reservas Pasadas</button>
    </div>
</form>
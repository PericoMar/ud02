<form action="index.php" method="post">
    <h1>Nueva reserva</h1>
    <div>
        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" min="<?php echo date('Y-m-d'); ?>" max="9999-12-31">
    </div>
    <div>
        <label for="hora">Hora:</label>
        <select name="hora" id="hora">
            <option value="20:30">20:30</option>
            <option value="21:00">21:00</option>
            <option value="21:30">21:30</option>
            <option value="22:00">22:00</option>
            <option value="22:30">22:30</option>
            <option value="23:00">23:00</option>
        </select>
    </div>
    <div>
        <label for="mesa">Mesa:</label>
        <select name="mesa" id="mesa">
            <option value="1">Mesa 1</option>
            <option value="2">Mesa 2</option>
            <option value="3">Mesa 3</option>
            <option value="4">Mesa 4</option>
            <option value="5">Mesa 5</option>
        </select>
    </div>
    <div>
        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="descripcion" cols="25" rows="4"></textarea>
    </div>
    <input type="hidden" value="<?php echo $email ?>" name="email">
    <?php if(isset($mensaje)): ?>
        <p class="mensaje"><?php echo $mensaje ?></p>
    <?php endif; ?>
    <button name="reserva">Nueva reserva</button>
    <button name="atras">Atras</button>
</form>

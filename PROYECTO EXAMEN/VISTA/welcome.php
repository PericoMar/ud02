<form method=post action=index.php> 
    <h1>Bienvenido a Pedro Pizza:</h1>
    <p>Selecciona una opcion:</p>
    <div class="column">
        <input type="hidden" value='<?php echo $email ?>' name="email">
        <button name=gestionar>Ver y Gestionar reservas activas</button>
        <button name=nueva-reserva>Hacer una nueva reserva</button>
        <button name=historico>Ver Historico de Reservas</button>
        <?php
        if(isset($reservaHecha)){
            ?>
            <h4>Reserva hecha con exito.</h4>
            <?php
        }
    ?>
    </div>
    
</form>
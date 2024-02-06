<form method=post action=index.php> 
    <h1>Bienvenido a Pedro Pizza:</h1>
    
    
    <div class="column">
        <?php
            if(isset($reservaHecha)){
                ?>
                <h3>Reserva realizada con exito.</h3>
                <?php
            }
        ?>
        <p>Selecciona una opcion:</p>
        <input type="hidden" value='<?php echo $email ?>' name="email">
        <button name=gestionar>Ver y Gestionar reservas activas</button>
        <button name=nueva-reserva>Hacer una nueva reserva</button>
        <button name=historico>Ver Historico de Reservas</button>
        
    </div>
    
</form>
<form method=post action=index.php> 
    <h1>Bienvenido a Pedro Pizza:</h1>
    <p>Selecciona una opcion:</p>
    <div class="column">
        <input type="hidden" value=<?php echo $email ?>>
        <button name=gestionar>Ver y Gestionar reservas activas</button>
        <button name=nueva-reserva>Hacer una nueva reserva</button>
        <button name=historico>Ver Historico de Reservas</button>
    </div>
</form>
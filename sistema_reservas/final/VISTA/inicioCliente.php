<form action="index.php" method=post>
    <h1>Bienvenido a Sabor Auténtico</h1>
    <input type="hidden" value=<?php echo $email ?> name=email>
    <button name=gestionReservas>Gestión reservas</button>
    <button name=historicoReservas>Historico reservas</button>
    <button name=nuevaReserva>Nueva reserva</button>
</form>
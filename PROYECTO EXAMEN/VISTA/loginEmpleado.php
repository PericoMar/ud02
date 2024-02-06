<form action="index.php" method=post>
    <h1>Iniciar Sesión</h1>
    <label for="user">Usuario:</label>
    <input type="text" name=user>
    <label for="password">Contraseña</label>
    <input type="password" name=password>
    <?php
        if($credencialesIncorrectas){
            ?>
            <small>Credenciales incorrectas.</small>
            <?php
        }
    ?>
    <button name=empleado-loged>Iniciar Sesión</button>
</form>
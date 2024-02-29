<form action="index.php" method="post">
    <h1>Inicia Sesión</h1>
    <div class="input-container">
        <label for="email">Usuario:</label>
        <input type="email" name="user">
    </div>
    <div class="input-container">
        <label for="contraseña">Contraseña:</label>
        <input type="text" name="contraseña">
    </div>
    <?php 
        if(isset($empleadoInvalido)){
            ?>
            <p class="mensaje">Credenciales invalidas</p>
            <?php
        }
    ?>
    <button type="submit" name="sesionIniciadaEmpleado">Inicia Sesión</button>
</form>
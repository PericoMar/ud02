<form action="index.php" method=post>
    <h1>Registrate</h1>
    <label for="email">Email:</label>
    <input type="email" name=email id=email required>
    <label for="password">Contraseña:</label>
    <input type="password" name=password required>
    <input type="hidden" name=register>
    <?php
        if(isset($email)){
            ?>
            <small>Ya existe una cuenta con este correo</small>
            <?php
        }
    ?>
    <button name=loged>Registrate</button>
    <p>¿Ya tienes cuenta? <a href="index.php?rol=cliente">Inicia sesión aquí.</a></p>
</form>
<form action="index.php" method=post>
    <h1>Registrate</h1>
    <div class="input-container">
        <label for="email">Email:</label>
        <input type="email" name="email">
    </div>
    <div class="input-container">
        <label for="contraseña">Contraseña:</label>
        <input type="text" name="contraseña">
    </div>
    <?php
        if(isset($usuarioYaExiste)){
            ?>
            <p class="mensaje">Ya hay una cuenta con ese email.</p>
            <?php
        }
    ?>
    <button name=registro>Registrate</button>
    <button name=cliente>Inicia sesión aquí</button>
</form>
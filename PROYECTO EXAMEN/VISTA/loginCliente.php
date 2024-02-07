<form action="index.php" method=post class=login>
    <h1>Inicia Sesión</h1>
    <label for="email">Email:</label>
    <input type="email" name=email id=email required>
    <label for="password">Contraseña:</label>
    <input type="password" name=password required>
    <?php 
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($mensaje)){
                    ?>
                    <small><?php echo $mensaje ?></small>
                    <?php
            }
        } 
    ?>
    <button name=loged>Inicia Sesión</button>
    <p>¿No tienes cuenta? <a href="index.php?register=1">Regístrate aquí</a></p>
</form>

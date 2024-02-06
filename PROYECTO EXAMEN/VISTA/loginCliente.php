<form action="index.php" method=post class=login>
    <h1>Inicia Sesión</h1>
    <label for="email">Email:</label>
    <input type="email" name=email id=email required>
    <label for="password">Contraseña:</label>
    <input type="password" name=password required>
    <?php 
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(userExists($email)){
                if(!passwdMatch($email , $pass)){
                    ?>
                    <small>Contraseña incorrecta</small>
                    <?php
                }
            } else {
                ?>
                <small>No hay ninguna cuenta con este email</small>
                <?php
            }
        }
    ?>
    <button name=login>Inicia Sesión</button>
    <p>¿No tienes cuenta? <a href="index.php?register=1">Regístrate aquí</a></p>
</form>

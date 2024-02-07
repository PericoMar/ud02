<form action="index.php" method=post>
    <h1>Crea nuevo usuario</h1>
    <label for="new-user">Nombre del nuevo usuario:</label>
    <input type="text" name=new-user required>
    <label for="password">Contraseña:</label>
    <input type="password" name=password required>
    <input type="hidden" name="user" value=<?php echo $user ?>>
    <?php
        if(isset($employeeAlreadyExists)){
            ?>
            <small>Ya existe un usuario con ese nombre de usuario.</small>
            <?php
        }
    ?>
    <button name=new-user-created>Crear nuevo usuario con permisos</button>  
</form>
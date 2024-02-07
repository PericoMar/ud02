<form action="index.php" method=post class=column>
    <h1>Usuario: <?php echo $user ?></h1>
    <div class=column>
        <?php
            if(isset($userEmployeeCreated)){
                ?>
                <h3>Usuario con permisos creado.</h3>
                <?php
            }
        ?>
        <input type="hidden" name="user" value=<?php echo $user ?>>
        <button name=new-user>Añadir nuevo usuario</button>
        <button name=gestion>Gestionar reservas</button>
    </div>
</form>
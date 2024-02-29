<h1>Añadir Usuario</h1>
<form action="index.php" method="post">
    <div>
        <label for="nombre">Nombre de Usuario:</label>
        <input type="text" name="user" id="nombre">
    </div>
    <div>
        <label for="contraseña">Contraseña:</label>
        <input type="password" name="contraseña" id="contraseña">
    </div>
    <?php
        if(isset($mensaje)){
            ?>
                <p class=mensaje><?php echo $mensaje ?></p>
            <?php
        }
    ?>
    <div>
        <button name="añadirUsuario">Añadir Usuario</button>
        <button name="atrasEmpleado">Atras</button>
    </div>
</form>
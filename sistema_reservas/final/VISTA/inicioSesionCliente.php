<form action="index.php" method="post">
    <h1>Inicia Sesión</h1>
    <div class="input-container">
        <label for="email">Email:</label>
        <input type="email" name="email">
    </div>
    <div class="input-container">
        <label for="contraseña">Contraseña:</label>
        <input type="text" name="contraseña">
    </div>
    <?php if(isset($usuarioNoValido)): ?>
        <p class="mensaje">Usuario o contraseña incorrectos.</p>
    <?php endif; ?>
    <button name="sesionIniciada">Inicia Sesión</button>
    <button name="paginaRegistro">Regístrate aquí</button>
</form>
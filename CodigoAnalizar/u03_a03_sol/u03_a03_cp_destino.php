<?php
/**
 * Reanudamos la sesión.
 */
session_start();

/**
 * Si no está seteado el nombre, cambiamos el valor al mensaje
 * y redirigimos a u03_a03_cp.php
 */
if (!isset($_SESSION['nombre'])) {
    $_SESSION["mensaje"] = "Debes rellenar el formulario";
    header("location:u03_a03_cp.php");
}

/**
 * Si el nombre está seteado se sanea el nombre, apellidos y género.
 * Se da el mensaje de bienvenida teniendo en cuenta el género del usuario
 * con un operador ternario.
 */
else {
    $nombre = strip_tags($_SESSION['nombre']);
    $apellidos = strip_tags($_SESSION['apellidos']);
    $genero = strip_tags($_SESSION['genero']);
    $bienvenida = ($genero == "masculino" ? "Bienvenido, " : "Bienvenida, ");
    echo $bienvenida . $nombre . " " . $apellidos;
}
?>


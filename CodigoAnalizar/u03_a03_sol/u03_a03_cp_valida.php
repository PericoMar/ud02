<?php
/**
 * Reanudamos la sesión.
 */
session_start();

/**
 * Si no está seteada la variable de sesión nombre, se muestra el mensaje "Comprueba que se han mandado datos"
 * y te redirige a la página u03_a03_cp.php, la cual contiene el formulario.
 * Pero con la variable mensaje seteada, por lo que se mostrará el mensaje.
 */
if (!isset($_POST['nombre'])) {
    $_SESSION["mensaje"] = "Debes rellenar el formulario";
    header("location:u03_a03_cp.php");
}

/**
 * Valida que no haya ningún campo vacío. 
 * Si alguno está vacío, la variable mensaje de sesión se setea con el mensaje
 * "Debes rellenar todos los campos del formulario" y te redirige a la página u03_a03_cp.php.
 */
elseif (
    empty($_POST['nombre']) ||
    empty($_POST['apellidos']) ||
    empty($_POST['direccion']) ||
    empty($_POST['poblacion']) ||
    empty($_POST['genero']) ||
    is_null($_POST['genero'])
) {
    $_SESSION["mensaje"] = "Debes rellenar todos los campos del formulario";
    header("location:u03_a03_cp.php");
}

/**
 * Comprueba que se han aceptado las condiciones, si no se han aceptado, 
 * se setea la variable de sesión mensaje con el mensaje "Debes aceptar las condiciones de acceso"
 * y te redirige a la página u03_a03_cp.php.
 */
elseif (empty($_POST['acepto'])) {
    $_SESSION["mensaje"] = "Debes aceptar las condiciones de acceso";
    header("location:u03_a03_cp.php");
}

/**
 * Comprueba que la población sigue el patrón establecido, si no lo sigue,
 * se setea la variable de sesión mensaje con el mensaje "La población no sigue el formato establecido"
 * y te redirige a la página u03_a03_cp.php.
 */
elseif (!preg_match('/^[0-9]{5}-[A-Za-z]+$/', $_POST['poblacion'])) {
    $_SESSION["mensaje"] = "La población no sigue el formato establecido";
    header("location:u03_a03_cp.php");
}

/**
 * Si está todo correcto (no se ha entrado en ningun elseif), se sanea el nombre y los apellidos,
 * se meten dentro del array $_SESSION y te redirige a u03_a03_cp_destino.php.
 */
else {
    $nombre = strip_tags($_POST['nombre']);
    $apellidos = strip_tags($_POST['apellidos']);
    $genero = strip_tags($_POST['genero']);
    $_SESSION["nombre"] = $nombre;
    $_SESSION["apellidos"] = $apellidos;
    $_SESSION["genero"] = $genero;
    header("location:u03_a03_cp_destino.php");
}
?>

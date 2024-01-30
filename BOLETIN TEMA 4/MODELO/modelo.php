<?php
// modelo.php
include_once('bbdd.php');

function obtenerFamilias() {
    global $conn;
    $sqlQueryFamilias = "SELECT * FROM FAMILIA;";
    $result =  $conn->query($sqlQueryFamilias);
    return $result->fetchAll(PDO::FETCH_ASSOC);
}

function obtenerProductosPorFamilia($familia) {
    global $conn;
    $sqlQueryProductos = "SELECT NOMBRE_CORTO, PVP FROM PRODUCTO WHERE FAMILIA = '$familia'";
    $result = $conn->query($sqlQueryProductos);
    return $result->fetchAll(PDO::FETCH_ASSOC);
}

function obtenerProductoPorNombreCorto($nombre_corto) {
    global $conn;
    $sqlQueryProducto = "SELECT NOMBRE, DESCRIPCION, COD FROM PRODUCTO WHERE NOMBRE_CORTO = '$nombre_corto'";
    $result = $conn->query($sqlQueryProducto);
    return $result->fetch(PDO::FETCH_ASSOC);
}

function actualizarProducto($cod, $nuevo_nombre_corto, $nuevo_nombre, $nueva_descripcion, $nuevo_pvp) {
    global $conn;
    
    // Puedes realizar validaciones y lógica adicional aquí antes de la actualización

    $sqlQueryActualizar = "UPDATE PRODUCTO 
    SET 
        NOMBRE_CORTO = CASE WHEN ? <> '' THEN ? ELSE NOMBRE_CORTO END,
        NOMBRE = CASE WHEN ? <> '' THEN ? ELSE NOMBRE END,
        DESCRIPCION = CASE WHEN ? <> '' THEN ? ELSE DESCRIPCION END,
        PVP = CASE WHEN ? <> '' THEN ? ELSE PVP END
    WHERE COD = ?";
    $stmt = $conn->prepare($sqlQueryActualizar);
    $stmt->bindParam(1, $nuevo_nombre_corto);
    $stmt->bindParam(2, $nuevo_nombre_corto);
    $stmt->bindParam(3, $nuevo_nombre);
    $stmt->bindParam(4, $nuevo_nombre);
    $stmt->bindParam(5, $nueva_descripcion);
    $stmt->bindParam(6, $nueva_descripcion);
    $stmt->bindParam(7, $nuevo_pvp);
    $stmt->bindParam(8, $nuevo_pvp);
    $stmt->bindParam(9, $cod);

    // Ejecuta la consulta
    $stmt->execute();
}


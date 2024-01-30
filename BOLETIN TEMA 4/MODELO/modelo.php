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

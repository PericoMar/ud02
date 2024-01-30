<?php
// controlador.php
include_once('MODELO/modelo.php');
$title = "Productos";
if(isset($_POST['nombre_corto'])){
    if(isset($_POST['descripcion'])){
        $header = "Actualización";
        $content = 'VISTA/vistaActualizar.php';
    } else {
        $header = "Editar Prodcuto";
        $content = 'VISTA/vistaEditar.php';
    }
} else {
    $header = "Listado de Productos";
    $content = 'VISTA/vistaListado.php';
}

include('VISTA/LAYOUT/layout.php');


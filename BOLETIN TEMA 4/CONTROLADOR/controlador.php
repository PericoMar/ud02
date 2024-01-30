<?php
// controlador.php
include_once('MODELO/modelo.php');
$title = "Productos";

$header = "Listado de Productos";
$content = 'VISTA/vistaListado.php';

if(isset($_POST['editar'])){
    $header = "Editar Prodcuto";
    $content = 'VISTA/vistaEditar.php';
}

if(isset($_POST['actualizar']) || isset($_POST['cancelar'])){
    $header = "Actualización";
    $content = 'VISTA/vistaActualizar.php';
}

include('VISTA/LAYOUT/layout.php');


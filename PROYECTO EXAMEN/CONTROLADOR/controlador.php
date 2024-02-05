<?php

include_once('MODELO/modelo.php');

$header = 'VISTA/headerInicio.php';
$content = 'VISTA/inicio.php';
if(isset($_GET['rol'])){
    $rol = $_GET['rol'];
    if($rol == 'cliente'){
        $content = 'VISTA/loginCliente.php';
    } else {
        $content = 'VISTA/loginEmpleado.php';
    }
}

if(userExist($email)){
    
}


include('VISTA/LAYOUT/layout.php');
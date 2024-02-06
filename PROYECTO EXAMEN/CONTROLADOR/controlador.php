<?php

include_once('MODELO/modelo.php');

$header = 'VISTA/headerInicio.php';
$content = 'VISTA/inicio.php';


// Seleccion del rol:
if(isset($_GET['rol'])){
    $rol = $_GET['rol'];
    if($rol == 'cliente'){
        $content = 'VISTA/loginCliente.php';
    } else {
        $content = 'VISTA/loginEmpleado.php';
    }
}

// Redirigir a pagina de registro:
if(isset($_GET['register'])){
    $content = 'VISTA/register.php';
}

// Comprobación de los datos de inicio de sesión o registro:
if(isset($_POST['email']) && isset($_POST['password'])){
    $email = $_POST['email'];
    $pass = $_POST['password'];
    // Si es un nuevo registro entra directamente:
    if(isset($_POST['register'])){
        if(userExists($email)){
            $content = 'VISTA/register.php';
        } else {
            // Si no existe el usuario le creamos la cuenta:
            createUser($email,$pass);
            $header = 'VISTA/headerLoged.php';
            $content = 'VISTA/welcome.php';
        }
    } else {
        // Si no se comprueban los credenciales:
        if(userExists($email) && passwdMatch($email , $pass)){
            $header = 'VISTA/headerLoged.php';
            $content = 'VISTA/welcome.php';
        } else {
            $content = 'VISTA/loginCliente.php';
        }
    }
}

if(isset($_POST['gestionar'])){
    $email = $_POST['email'];
    $reservas = reservasActivas($email);
    $header = 'VISTA/headerLoged.php';
    $content = 'VISTA/gestionar.php';
}

include('VISTA/LAYOUT/layout.php');
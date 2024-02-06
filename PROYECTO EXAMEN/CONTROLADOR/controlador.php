<?php

include_once('MODELO/modelo.php');

$header = 'VISTA/headerInicio.php';
$content = 'VISTA/inicio.php';


if(isset($_POST['email'])){
    $email = $_POST['email'];
    $email = strtolower($email);
}

if(isset($_GET['email'])){
    $email = $_GET['email'];
    $email = strtolower($email);
}

if(isset($_POST['password'])){
    $pass = $_POST['password'];
}

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
if(isset($_POST['loged'])){
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

if(isset($_GET['welcome'])){
    $header = 'VISTA/headerLoged.php';
    $content = 'VISTA/welcome.php';
}

if(isset($_POST['gestionar']) || isset($_GET['gestionar'])){
    $reservasActivas = reservasActivas($email);
    $header = 'VISTA/headerLoged.php';
    $content = 'VISTA/gestionar.php';
}

if(isset($_POST['nueva-reserva']) || isset($_GET['nueva-reserva'])){
    $header = 'VISTA/headerLoged.php';
    $content = 'VISTA/nueva-reserva.php';
}

if(isset($_POST['historico']) || isset($_GET['historico'])){
    $reservasPasadas = reservasPasadas($email);
    $header = 'VISTA/headerLoged.php';
    $content = 'VISTA/historico.php';
}

if(isset($_POST['reserva-hecha'])){
    $fecha = $_POST['fecha']; 
    $hora = $_POST['hora'];
    $mesa = $_POST['mesa'];
    $desc = $_POST['desc'];
    if(reservaExistente($fecha, $hora, $mesa)){
        $header = 'VISTA/headerLoged.php';
        $content = 'VISTA/nueva-reserva.php';
        $reservaOcupada = true;
    } else if(reservaInvalida($fecha ,$hora)) {
        $header = 'VISTA/headerLoged.php';
        $content = 'VISTA/nueva-reserva.php';
        $reservaInvalida = true;
    } else {
        nuevaReserva($fecha, $hora, $mesa, $desc, $email);
        $header = 'VISTA/headerLoged.php';
        $content = 'VISTA/welcome.php';
        $reservaHecha = true;
    }
}

if(isset($_POST['cancelar'])){
    $fecha = $_POST['fecha']; 
    $hora = $_POST['hora'];
    $mesa = $_POST['mesa'];
    cancelarReserva($fecha, $hora, $mesa);
    $reservasActivas = reservasActivas($email);
    $header = 'VISTA/headerLoged.php';
    $content = 'VISTA/gestionar.php';
}

if(isset($_POST['empleado-loged'])){
    $user = $_POST['user'];
    if(employeeExists($user, $pass)){
        $header = 'VISTA/headerEmployee.php';
        $content = 'VISTA/empleadoLoged.php';
    } else {
        $content = 'VISTA/loginEmpleado.php';
        $credencialesIncorrectas = true;
    }
}

include('VISTA/LAYOUT/layout.php');
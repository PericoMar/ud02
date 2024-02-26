<?php

include_once('MODELO/modelo.php');
include_once('MODELO/Usuario.php');

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

//CLIENTE:

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

// Redirigir a pagina de registro:
if(isset($_GET['register'])){
    $content = 'VISTA/register.php';
}

// Comprobación de los datos de inicio de sesión o registro:
if (isset($_POST['loged'])) {
    if (isset($_POST['register'])) {
        if (Usuario::existe($email)) {
            $content = 'VISTA/register.php';
        } else {
            Usuario::crear($email, $pass);
            $header = 'VISTA/headerLoged.php';
            $content = 'VISTA/welcome.php';
        }
    } else {
        if (Usuario::validarCredenciales($email, $pass)) {
            $header = 'VISTA/headerLoged.php';
            $content = 'VISTA/welcome.php';
        } else {
            $mensaje = Usuario::existe($email) ? 'Contraseña incorrecta' : 'No hay ninguna cuenta con este email';
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
    $header = 'VISTA/headerLoged.php';
    if(preg_match('/\b\d{5,}\b/', $fecha)){
        $content = 'VISTA/nueva-reserva.php';
        $formatoFechaInvalido = true;
    } else if(reservaExistente($fecha, $hora, $mesa)){
        $content = 'VISTA/nueva-reserva.php';
        $reservaOcupada = true;
    } else if(reservaInvalida($fecha ,$hora)) {
        $content = 'VISTA/nueva-reserva.php';
        $reservaInvalida = true;
    } else {
        nuevaReserva($fecha, $hora, $mesa, $desc, $email);
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

//EMPLEADO

if(isset($_POST['user'])){
    $user = $_POST['user'];
}

if(isset($_GET['user'])){
    $user = $_GET['user'];
}

if(isset($_POST['empleado-loged']) || isset($_GET['empleado-loged'])){
    if(employeeExists($user)){
        $header = 'VISTA/headerEmployee.php';
        $content = 'VISTA/empleadoLoged.php';
    } else {
        $content = 'VISTA/loginEmpleado.php';
        $credencialesIncorrectas = true;
    }
}

if(isset($_POST['new-user']) || isset($_GET['new-user'])){
    $header = 'VISTA/headerEmployee.php';
    $content = 'VISTA/new-user.php';
}

if(isset($_POST['new-user-created'])){
    $newUser = $_POST['new-user'];
    $header = 'VISTA/headerEmployee.php';
    if(employeeExists($newUser)){
        $content = 'VISTA/new-user.php';
        $employeeAlreadyExists = true;
    } else {
        createEmployeeUser($newUser,$pass);
        $content = 'VISTA/empleadoLoged.php';
        $userEmployeeCreated = true;
    }
}

if(isset($_POST['gestion']) || isset($_GET['gestion'])){
    $reservas = todasReservasActivas();
    $header = 'VISTA/headerEmployee.php';
    $content = 'VISTA/gestion.php';
}

if(isset($_POST['cancelada-empleado'])){
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $mesa = $_POST['mesa'];
    cancelarReserva($fecha,$hora,$mesa);
    $reservas = todasReservasActivas();
    $header = 'VISTA/headerEmployee.php';
    $content = 'VISTA/gestion.php';
}

if(isset($_POST['filtrar'])){
    $fechaFiltrar = $_POST['fechaFiltrar'];
    $reservas = filtrarReservas($fechaFiltrar);
    if(empty($reservas)){
        $reservas = todasReservasActivas();
        $noHayReservasFiltro = true;
    }
    $header = 'VISTA/headerEmployee.php';
    $content = 'VISTA/gestion.php';
}

include('VISTA/LAYOUT/layout.php');
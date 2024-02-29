<?php
include('MODELO/modelo.php');

$content = 'VISTA/inicio.php';

// Selecciona cliente:
if(isset($_POST['cliente'])){
    $content = 'VISTA/inicioSesionCliente.php';
}

// Si selecciona la opción de registrarse:
if(isset($_POST['paginaRegistro'])){
    $content = 'VISTA/registro.php';
}

if(isset($_POST['registro'])){
    // COMPROBAR QUE EL USUARIO NO EXISTE YA
    $email = $_POST['email'];
    $pass = $_POST['contraseña'];
    if(usuarioYaExiste($email, $pdo)){
        $usuarioYaExiste = true;
        $content = 'VISTA/registro.php';
    } else {
        crearUsuarioCliente($email, $pass, $pdo);
        $content = 'VISTA/inicioCliente.php';
    }
}

if(isset($_POST['sesionIniciada'])){
    // COMPROBAR CREDENCIALES
    $email = $_POST['email'];
    $pass = $_POST['contraseña'];
    if(comprobarUsuario($email, $pass, $pdo)){
        $content = 'VISTA/inicioCliente.php';
    } else {
        $content = 'VISTA/inicioSesionCliente.php';
        $usuarioNoValido = true;
    }
    
}

if(isset($_POST['atras'])){
    $email = $_POST['email'];
    $content = 'VISTA/inicioCliente.php';
}

if(isset($_POST['gestionReservas'])){
    $email = $_POST['email'];
    $reservas = getReservasActivas($email, $pdo);
    $content = 'VISTA/gestionarReservas.php';
}

if(isset($_POST['historicoReservas'])){
    $email = $_POST['email'];
    $reservasHistorico = getReservasPasadas($email, $pdo);
    $content = 'VISTA/historicoReservas.php';
}

if(isset($_POST['nuevaReserva'])){
    $email = $_POST['email'];
    $content = 'VISTA/nuevaReserva.php';
}

if(isset($_POST['reserva'])){
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $mesa = $_POST['mesa'];
    $desc = $_POST['descripcion'];
    $email = $_POST['email'];
    if(reservaInvalida($fecha, $hora, $mesa, $pdo)){
        $mensaje = 'Reserva invalida, la mesa esta ocupada o has introducido una fecha invalida';
    } else {
        crearReserva($fecha,$hora, $mesa,$desc,$email,$pdo);
        $mensaje = 'Reserva realizada con exito';
    }
    $content = 'VISTA/nuevaReserva.php';
}

if(isset($_POST['cancelarReserva'])){
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $mesa = $_POST['mesa'];
    $email = $_POST['email'];
    cancelarReserva($fecha,$hora,$mesa,$pdo);
    $reservas = getReservasActivas($email, $pdo);
    $content = 'VISTA/gestionarReservas.php';
}

//Selecciona empleado:
if(isset($_POST['empleado'])){
    $content = 'VISTA/inicioSesionEmpleado.php';
}

if(isset($_POST['sesionIniciadaEmpleado'])){
    $usuario = $_POST['user'];
    $contraseña = $_POST['contraseña'];
    if(empleadoCorrecto($usuario, $contraseña, $pdo)){
        $content = 'VISTA/inicioEmpleado.php';
    } else {
        $empleadoInvalido = true;
        $content = 'VISTA/inicioSesionEmpleado.php';
    }
}

if(isset($_POST['añadirUsuario'])){
    if(isset($_POST['user'])){
        $user = $_POST['user'];
        $contraseña = $_POST['contraseña'];
        if(empleadoExiste($user, $pdo)){
            $mensaje = 'Ya existe un empleado con ese usuario';
        } else {
            añadirUsuario($user,$contraseña,$pdo);
            $mensaje = 'Nuevo usuario creado';
        }
    }
    $content = 'VISTA/añadirUsuario.php';
}

if(isset($_POST['gestionarReservasEmpleado'])){
    $reservas = todasLasReservas($pdo);
    $content = 'VISTA/gestionarReservasEmpleado.php';
}

if(isset($_POST['cancelarReservaEmpleado'])){
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $mesa = $_POST['mesa'];
    cancelarReserva($fecha,$hora,$mesa,$pdo);
    $reservas = todasLasReservas($pdo);
    $content = 'VISTA/gestionarReservasEmpleado.php';
}

if(isset($_POST['filtrar'])){
    $fecha = $_POST['fechaFiltrada'];
    $reservas = fechasFiltradas($fecha, $pdo);
    $content = 'VISTA/gestionarReservasEmpleado.php';
}

if(isset($_POST['atrasEmpleado'])){
    $content = 'VISTA/inicioEmpleado.php';
}

include('VISTA/LAYOUT/layout.php');
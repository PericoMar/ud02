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

//CLIENTE:

//Recogemos el email del cliente:
if(isset($_POST['email'])){
    $email = $_POST['email'];
    $email = strtolower($email);
}

if(isset($_GET['email'])){
    $email = $_GET['email'];
    $email = strtolower($email);
}

//Recogemos la contraseña del cliente:
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
        $conn = obtenerConexion(); // Función para obtener la conexión a la base de datos
        if (Usuario::existeUsuario($email, $conn)) {
            $content = 'VISTA/register.php';
        } else {
            $usuario = new Usuario($email, $pass, $conn);
            $usuario->crearUsuario();
            $header = 'VISTA/headerLoged.php';
            $content = 'VISTA/welcome.php';
        }
    } else {
        $email = $_POST['email']; // Suponiendo que obtienes el email y la contraseña del formulario
        $pass = $_POST['password'];
        $conn = obtenerConexion(); // Función para obtener la conexión a la base de datos

        if (Usuario::validarCredenciales($email, $pass, $conn)) {
            $header = 'VISTA/headerLoged.php';
            $content = 'VISTA/welcome.php';
        } else {
            $mensaje = Usuario::existeUsuario($email, $conn) ? 'Contraseña incorrecta' : 'No hay ninguna cuenta con este email';
            $content = 'VISTA/loginCliente.php';
        }
    }
}

if (isset($_GET['welcome'])) {
    $header = 'VISTA/headerLoged.php';
    $content = 'VISTA/welcome.php';
}

if (isset($_POST['gestionar']) || isset($_GET['gestionar'])) {
    $conn = obtenerConexion(); // Función para obtener la conexión a la base de datos

    $reservasActivas = Reserva::obtenerReservasActivas($email, $conn);
    $header = 'VISTA/headerLoged.php';
    $content = 'VISTA/gestionar.php';
}

if (isset($_POST['nueva-reserva']) || isset($_GET['nueva-reserva'])) {
    $header = 'VISTA/headerLoged.php';
    $content = 'VISTA/nueva-reserva.php';
}

if (isset($_POST['historico']) || isset($_GET['historico'])) {
    $conn = obtenerConexion(); // Función para obtener la conexión a la base de datos

    $reservasPasadas = Reserva::obtenerReservasPasadas($email, $conn);
    $header = 'VISTA/headerLoged.php';
    $content = 'VISTA/historico.php';
}

if (isset($_POST['reserva-hecha'])) {
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $mesa = $_POST['mesa'];
    $desc = $_POST['desc'];
    $conn = obtenerConexion(); // Función para obtener la conexión a la base de datos

    $reserva = new Reserva($fecha, $hora, $mesa, $desc, $email, $conn);
    if (preg_match('/\b\d{5,}\b/', $fecha)) {
        $content = 'VISTA/nueva-reserva.php';
        $formatoFechaInvalido = true;
    } else if ($reserva->reservaExistente()) {
        $content = 'VISTA/nueva-reserva.php';
        $reservaOcupada = true;
    } else if ($reserva->reservaInvalida()) {
        $content = 'VISTA/nueva-reserva.php';
        $reservaInvalida = true;
    } else {
        $reserva->guardar();
        $content = 'VISTA/welcome.php';
        $reservaHecha = true;
    }
}

if (isset($_POST['cancelar'])) {
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $mesa = $_POST['mesa'];
    $conn = obtenerConexion(); // Función para obtener la conexión a la base de datos
    $reserva = new Reserva($fecha, $hora, $mesa, '', $email, $conn);
    $reserva->cancelaReserva();
    $reservasActivas = Reserva::obtenerReservasActivas($email, $conn);
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
    $pass = $_POST['password'];
    $conn = obtenerConexion(); // Función para obtener la conexión a la base de datos.
    if(Empleado::employeeExists($user, $conn) && Empleado::credencialesEmpleadoValidas($user, $pass, $conn)){
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
    $conn = obtenerConexion(); // Función para obtener la conexión a la base de datos.
    $newUser = $_POST['new-user'];
    $pass = $_POST['password'];
    $header = 'VISTA/headerEmployee.php';
    if(Empleado::employeeExists($newUser, $conn)){
        $content = 'VISTA/new-user.php';
        $employeeAlreadyExists = true;
    } else {
        Empleado::createEmployeeUser($newUser, $pass ,$conn);
        $content = 'VISTA/empleadoLoged.php';
        $userEmployeeCreated = true;
    }
}

if(isset($_POST['gestion']) || isset($_GET['gestion'])){
    $conn = obtenerConexion(); // Función para obtener la conexión a la base de datos.
    $reservas = Reserva::obtenerTodasReservasActivas($conn);
    $header = 'VISTA/headerEmployee.php';
    $content = 'VISTA/gestion.php';
}

if(isset($_POST['cancelada-empleado'])){
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $mesa = $_POST['mesa'];
    $conn = obtenerConexion(); // Función para obtener la conexión a la base de datos.
    Reserva::cancelarReserva($fecha, $hora, $mesa, $conn);
    $reservas = Reserva::obtenerTodasReservasActivas($conn);
    $header = 'VISTA/headerEmployee.php';
    $content = 'VISTA/gestion.php';
}

if(isset($_POST['filtrar'])){
    $conn = obtenerConexion(); // Función para obtener la conexión a la base de datos.
    $fechaFiltrar = $_POST['fechaFiltrar'];
    $reservas = Reserva::reservasFiltradas($fechaFiltrar, $conn);
    if(empty($reservas)){
        $noHayReservasFiltro = true;
    }
    $header = 'VISTA/headerEmployee.php';
    $content = 'VISTA/gestion.php';
}

if(isset($_POST['quitar-filtro'])){
    $conn = obtenerConexion();
    $reservas = Reserva::obtenerTodasReservasActivas($conn);
    $header = 'VISTA/headerEmployee.php';
    $content = 'VISTA/gestion.php';
}

include('VISTA/LAYOUT/layout.php');
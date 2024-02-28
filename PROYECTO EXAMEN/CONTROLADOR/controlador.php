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
    $conn = obtenerConexion(); // Función para obtener la conexión a la base de datos
    if (isset($_POST['register'])) {
        // Si ya existe el usuario lo mandamos a la pagina de resgistro con un advertencia.
        if (Usuario::existeUsuario($email, $conn)) {
            $content = 'VISTA/register.php';
        } else {
            // Si no creamos el usuario y lo mandamos a la pagina de inicio. 
            // (Una vez que te registras entras directamente no tiene que iniciar sesion)
            $usuario = new Usuario($email, $pass, $conn);
            $usuario->crearUsuario();
            $header = 'VISTA/headerLoged.php';
            $content = 'VISTA/welcome.php';
        }
    } else {
        // Si estaba iniciando sesion:
        // Y las credenciales son validas va a la pagina de inicio.
        if (Usuario::validarCredenciales($email, $pass, $conn)) {
            $header = 'VISTA/headerLoged.php';
            $content = 'VISTA/welcome.php';
        } else {
            // Si no lo mandamos a la pagina de inicio de sesion con un mensaje correspondiente.
            $mensaje = Usuario::existeUsuario($email, $conn) ? 'Contraseña incorrecta' : 'No hay ninguna cuenta con este email';
            $content = 'VISTA/loginCliente.php';
        }
    }
}

if (isset($_GET['welcome'])) {
    $header = 'VISTA/headerLoged.php';
    $content = 'VISTA/welcome.php';
}

// Si se dirige a la pagina de gestión de reservas le enseñamos todas las reservas hechas por el cliente.
if (isset($_POST['gestionar']) || isset($_GET['gestionar'])) {
    $conn = obtenerConexion(); // Función para obtener la conexión a la base de datos

    $reservasActivas = Reserva::obtenerReservasActivas($email, $conn);
    $header = 'VISTA/headerLoged.php';
    $content = 'VISTA/gestionar.php';
}

// Redirección a la pagina para hacer una nueva reserva.
if (isset($_POST['nueva-reserva']) || isset($_GET['nueva-reserva'])) {
    $header = 'VISTA/headerLoged.php';
    $content = 'VISTA/nueva-reserva.php';
}

// Redirección a la pagina del historial de reservas.
if (isset($_POST['historico']) || isset($_GET['historico'])) {
    $conn = obtenerConexion(); // Función para obtener la conexión a la base de datos
    // Enseñamos solo las reservas pasadas.
    $reservasPasadas = Reserva::obtenerReservasPasadas($email, $conn);
    $header = 'VISTA/headerLoged.php';
    $content = 'VISTA/historico.php';
}
// Si hace la reserva hacemos las comprobaciones necesarias.
if (isset($_POST['reserva-hecha'])) {
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $mesa = $_POST['mesa'];
    $desc = $_POST['desc'];
    $conn = obtenerConexion(); // Función para obtener la conexión a la base de datos

    // Si tiene formato invalido le volvemos a mandar a la pagina de hacer reserva con un mensaje.
    $reserva = new Reserva($fecha, $hora, $mesa, $desc, $email, $conn);
    if (preg_match('/\b\d{5,}\b/', $fecha)) {
        $content = 'VISTA/nueva-reserva.php';
        $formatoFechaInvalido = true;
        // Si la mesa esta ocupada se redirige a la pagina de hacer nueva reserva y se le lanza un mensaje
    } else if ($reserva->reservaExistente()) {
        $content = 'VISTA/nueva-reserva.php';
        $reservaOcupada = true;
        // Si la reserva no es valida se le redirige a la pagina nueva reserva y le enseñamos el correspondiente mensaje.
    } else if ($reserva->reservaInvalida()) {
        $content = 'VISTA/nueva-reserva.php';
        $reservaInvalida = true;
        // Si la reserva es correcta se guarda.
    } else {
        $reserva->guardar();
        $content = 'VISTA/welcome.php';
        $reservaHecha = true;
    }
}

// Si le ha dado a cancelar una reserva
if (isset($_POST['cancelar'])) {
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $mesa = $_POST['mesa'];
    $conn = obtenerConexion(); // Función para obtener la conexión a la base de datos
    $reserva = new Reserva($fecha, $hora, $mesa, '', $email, $conn);
    // Se cancela la reserva y se vuelven a mostrar las reservas activas.
    $reserva->cancelaReserva();
    $reservasActivas = Reserva::obtenerReservasActivas($email, $conn);
    $header = 'VISTA/headerLoged.php';
    $content = 'VISTA/gestionar.php';
}


// EMPLEADO

// Recogemos los datos del empleado para poder mostrarlos por pantalla 
// o hacer las comprobaciones correspondientes.
if(isset($_POST['user'])){
    $user = $_POST['user'];
}

if(isset($_GET['user'])){
    $user = $_GET['user'];
}

// Se hace la comprobacion de que el usuario y contraseña coincidan con alguno en la bbdd sino se vuelve
// a la pagina de inicio con un mensaje.
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

// Se redirige a la pagina de crear nuevo usuario.
if(isset($_POST['new-user']) || isset($_GET['new-user'])){
    $header = 'VISTA/headerEmployee.php';
    $content = 'VISTA/new-user.php';
}

// Si le da a crear nuevo usuario se comprueba que no exista ya y sino pues se añade
// un nuevo empleado a la bbdd.
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

// Se redirige a la pagina de gestión de reservas activas.
if(isset($_POST['gestion']) || isset($_GET['gestion'])){
    $conn = obtenerConexion(); // Función para obtener la conexión a la base de datos.
    // Se recogen todas las reservas activas que haya dentro de la bbdd.
    $reservas = Reserva::obtenerTodasReservasActivas($conn);
    $header = 'VISTA/headerEmployee.php';
    $content = 'VISTA/gestion.php';
}

// Si cancela alguna reserva se quita de la bbdd y se vuelven a mostrar las reservas activas
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

// Si filtra.
if(isset($_POST['filtrar'])){
    $conn = obtenerConexion(); // Función para obtener la conexión a la base de datos.
    $fechaFiltrar = $_POST['fechaFiltrar'];
    $reservas = Reserva::reservasFiltradas($fechaFiltrar, $conn);
    // Dependiendo de si hay o no reservas en ese fecha, se le muestra un mensaje 
    // o las reservas que haya en ese fecha
    if(empty($reservas)){
        $noHayReservasFiltro = true;
    }
    $header = 'VISTA/headerEmployee.php';
    $content = 'VISTA/gestion.php';
}

// Si quita el filtro se muestran todas las reservas activas.
if(isset($_POST['quitar-filtro'])){
    $conn = obtenerConexion();
    $reservas = Reserva::obtenerTodasReservasActivas($conn);
    $header = 'VISTA/headerEmployee.php';
    $content = 'VISTA/gestion.php';
}

include('VISTA/LAYOUT/layout.php');
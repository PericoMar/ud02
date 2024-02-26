<?php


include_once('MODELO/Usuario.php');
include_once('MODELO/Reserva.php');
include_once('MODELO/Empleado.php');
function obtenerConexion() {
    include_once('config.php');
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Configurar PDO para que lance excepciones en caso de errores
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        // Manejar el error de conexión de alguna manera, por ejemplo, imprimir un mensaje de error
        echo "Error de conexión: " . $e->getMessage();
        return null;
    }
}
// function createUser($email, $pass)
// {
//     global $conn;
//     // Query para añadir usuarios solo si no existen:
//     $query = "INSERT INTO client (email, password)
//     SELECT * FROM (SELECT '$email', '$pass') AS tmp
//     WHERE NOT EXISTS (
//         SELECT email FROM client WHERE email = '$email'
//     ) LIMIT 1;";
//     $conn->query($query);

// }

// function userExists($email)
// {
//     global $conn;
//     $query = "SELECT email FROM CLIENT WHERE email = '$email';";
//     $result = $conn->query($query);
//     return $result->fetch(PDO::FETCH_ASSOC);
// }


// function passwdMatch($email, $pass)
// {
//     global $conn;
//     $query = "SELECT email FROM CLIENT WHERE email = '$email' AND password = '$pass';";
//     $result = $conn->query($query);
//     return $result->fetch(PDO::FETCH_ASSOC);
// }

// function reservaExistente($fecha, $hora, $mesa)
// {
//     global $conn;
//     $query = "SELECT * FROM BOOKING WHERE date = '$fecha' AND time = '$hora' AND table_number = '$mesa';";
//     $result = $conn->query($query);
//     return $result->fetch(PDO::FETCH_ASSOC);
// }

// function nuevaReserva($fecha, $hora, $mesa, $desc, $email)
// {
//     global $conn;
//     $query = "INSERT INTO BOOKING (`date`, `time`, `table_number`, `description`,`client_email`)
//     VALUES ('$fecha','$hora','$mesa','$desc','$email')";
//     $conn->query($query);
// }

// function reservaInvalida($fecha ,$hora)
// {
//     // Convertir la fecha y la hora en un objeto DateTime
//     $reservaDateTime = new DateTime($fecha . ' ' . $hora);

//     // Obtener la fecha y hora actual
//     $now = new DateTime();

//     // Comparar la fecha y hora de la reserva con la fecha y hora actuales
//     return $reservaDateTime < $now;
// }

// function cancelarReserva($fecha, $hora, $mesa)
// {
//     global $conn;
//     $query = "DELETE FROM BOOKING WHERE date = '$fecha' AND time = '$hora' AND table_number = '$mesa';";
//     $conn->query($query);
// }

// function reservasActivas($email)
// {
//     global $conn;
//     $query = "SELECT date, time, table_number, description
//     FROM BOOKING
//     WHERE date >= CURDATE() AND (date > CURDATE() OR (date = CURDATE() AND time >= CURTIME())) AND client_email = '$email';";
//     $result = $conn->query($query);
//     return $result->fetchAll(PDO::FETCH_ASSOC);
// }

// function reservasPasadas($email)
// {
//     global $conn;
//     $query = "SELECT date, time, table_number, description
//     FROM BOOKING
//     WHERE date < CURDATE() OR (date = CURDATE() AND time < CURTIME()) AND client_email = '$email';";
//     $result = $conn->query($query);
//     return $result->fetchAll(PDO::FETCH_ASSOC);
// }

// function createEmployeeUser($user,$pass)
// {
//     global $conn;
//     $query = "INSERT INTO employee (username, password)
//     VALUES ('$user','$pass');";
//     $conn->query($query);
// }

// function employeeExists($user){
//     global $conn;
//     $query = "SELECT username FROM EMPLOYEE WHERE username = '$user';";
//     $result = $conn->query($query);
//     return $result->fetch(PDO::FETCH_ASSOC); 
// }

// function credencialesEmpleadoValidas(){
//     global $conn;
//     $query = "SELECT email FROM EMPLOYEE WHERE email = '$email' AND password = '$pass';";
//     $result = $conn->query($query);
//     return $result->fetch(PDO::FETCH_ASSOC);
// }

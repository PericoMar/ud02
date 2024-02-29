<?php

include('config.php');

function crearUsuarioCliente($email, $contraseña, $pdo) {
    $query = "INSERT INTO clientes (Email_cliente, contraseña)
        VALUES ( ? , ? ); ";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$email, $contraseña]);

}

function usuarioYaExiste($email, $pdo){
    $query = "SELECT Email_cliente FROM clientes WHERE email_cliente = ? ;";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$email]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function comprobarUsuario($email, $contraseña, $pdo){
    $query = "SELECT Email_cliente FROM clientes WHERE email_cliente = ? AND contraseña = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$email, $contraseña]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getReservasActivas($email, $pdo){
    $query = "SELECT fecha,hora, numero, description
                FROM Reservas
                WHERE fecha >= CURDATE() 
                AND (fecha > CURDATE() OR (fecha = CURDATE() AND hora >= CURTIME())) 
                AND id_cliente = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$email]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getReservasPasadas($email, $pdo){
    $query = "SELECT fecha,hora, numero, description
                FROM Reservas
                WHERE fecha < CURDATE() 
                AND id_cliente = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$email]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function reservaInvalida($fecha, $hora, $mesa ,$pdo){
    // Obtener la fecha y hora actual
    $now = date("Y-m-d H:i:s");

    // Combinar la fecha y hora en un solo formato para comparación
    $fechaHoraActual = date("Y-m-d H:i:s", strtotime($fecha . ' ' . $hora));

    // Preparar la consulta SQL
    $query = "SELECT * FROM reservas WHERE fecha = ? AND hora = ? AND numero = ? AND CONCAT(fecha, ' ', hora) >= ?";
    $stmt = $pdo->prepare($query);

    // Ejecutar la consulta con los parámetros proporcionados
    $stmt->execute([$fecha, $hora, $mesa, $fechaHoraActual]);

    // Retornar los resultados
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function crearReserva($fecha,$hora,$mesa, $des,$email, $pdo){
    $query = "INSERT INTO reservas (`fecha`, `hora`, `numero`, `description`,`id_cliente`) VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$fecha, $hora, $mesa, $des, $email]);
}

function cancelarReserva($fecha,$hora,$mesa,$pdo){
    $query = "DELETE FROM reservas WHERE fecha = ? AND hora = ? AND numero = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$fecha, $hora, $mesa]);
}


function empleadoCorrecto($usuario, $contraseña, $pdo){
    $query = "SELECT id_empleado FROM empleados WHERE id_empleado = ? AND contraseña = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$usuario, $contraseña]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
}

function empleadoExiste($user,$pdo){
    $query = "SELECT id_empleado FROM empleados WHERE id_empleado = ?;";
    $stmt = $pdo->prepare($query);
        $stmt->execute([$user]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
}

function añadirUsuario($user, $contraseña, $pdo){
    $query = "INSERT INTO empleados (id_empleado, contraseña) VALUES (?, ?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$user, $contraseña]);
}

function todasLasReservas($pdo){
    $query = "SELECT id_cliente, fecha, hora, numero, description 
                  FROM reservas";
        $stmt = $pdo->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function fechasFiltradas($fechaFiltrada ,$pdo){
    $query = "SELECT id_cliente, fecha, hora, numero,description FROM reservas WHERE fecha = '$fechaFiltrada';";
    $result = $pdo->query($query);
    return $result->fetchAll(PDO::FETCH_ASSOC);
}
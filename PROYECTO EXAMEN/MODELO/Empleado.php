<?php
class Empleado {
    // Método para crear un nuevo empleado
    public static function createEmployeeUser($user, $pass, $conn) {
        $query = "INSERT INTO employee (username, password) VALUES (?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->execute([$user, $pass]);
    }

    // Método para verificar si un empleado existe
    public static function employeeExists($user, $conn) {
        $query = "SELECT username FROM EMPLOYEE WHERE username = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$user]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Método para validar las credenciales de un empleado
    public static function credencialesEmpleadoValidas($user, $pass ,$conn) {
        $query = "SELECT username FROM EMPLOYEE WHERE username = ? AND password = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$user, $pass]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

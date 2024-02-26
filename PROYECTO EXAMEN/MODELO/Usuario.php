<?php
class Usuario {
    public static function crear($email, $pass) {
        global $conn;
        // Query para añadir usuarios solo si no existen:
        $query = "INSERT INTO client (email, password)
        SELECT * FROM (SELECT '$email', '$pass') AS tmp
        WHERE NOT EXISTS (
            SELECT email FROM client WHERE email = '$email'
        ) LIMIT 1;";
        $conn->query($query);
    }

    public static function existe($email) {
        // Verificar si el usuario ya existe en la base de datos
        global $conn;
        $query = "SELECT email FROM CLIENT WHERE email = '$email';";
        $result = $conn->query($query);
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public static function validarCredenciales($email, $pass) {
        // Verificar si las credenciales son válidas para iniciar sesión
        global $conn;
        $query = "SELECT email FROM CLIENT WHERE email = '$email' AND password = '$pass';";
        $result = $conn->query($query);
        return $result->fetch(PDO::FETCH_ASSOC);
    }
}
<?php
// MODELO/Usuario.php
class Usuario {
    private $email;
    private $password;
    private $conn; // Conexión a la base de datos

    public function __construct($email, $password, $conn) {
        $this->email = $email;
        $this->password = $password;
        $this->conn = $conn;
    }

    public function crearUsuario() {
        // Query para añadir usuarios solo si no existen:
        $query = "INSERT INTO client (email, password)
                  SELECT * FROM (SELECT ?, ?) AS tmp
                  WHERE NOT EXISTS (
                      SELECT email FROM client WHERE email = ?
                  ) LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$this->email, $this->password, $this->email]);
    }

    public static function existeUsuario($email, $conn) {
        // Verificar si el usuario ya existe en la base de datos
        $query = "SELECT email FROM CLIENT WHERE email = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function validarCredenciales($email, $password, $conn) {
        // Verificar si las credenciales son válidas para iniciar sesión
        $query = "SELECT email FROM CLIENT WHERE email = ? AND password = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$email, $password]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}


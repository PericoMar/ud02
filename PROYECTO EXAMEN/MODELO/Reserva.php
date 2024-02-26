<?php
class Reserva {
    private $fecha;
    private $hora;
    private $mesa;
    private $descripcion;
    private $cliente_email;

    public function __construct($fecha, $hora, $mesa, $descripcion, $cliente_email, $conn) {
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->mesa = $mesa;
        $this->descripcion = $descripcion;
        $this->cliente_email = $cliente_email;
        $this->conn= $conn;
    }
    public function guardar() {
        // Lógica para guardar la reserva en la base de datos
        $query = "INSERT INTO BOOKING (`date`, `time`, `table_number`, `description`,`client_email`) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$this->fecha, $this->hora, $this->mesa, $this->descripcion, $this->cliente_email]);
    }

    public function reservaExistente() {
        $query = "SELECT * FROM BOOKING WHERE date = ? AND time = ? AND table_number = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$this->fecha, $this->hora, $this->mesa]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function reservaInvalida() {
        // Convertir la fecha y la hora en un objeto DateTime
        $reservaDateTime = new DateTime($this->fecha . ' ' . $this->hora);

        // Obtener la fecha y hora actual
        $now = new DateTime();

        // Comparar la fecha y hora de la reserva con la fecha y hora actuales
        return $reservaDateTime < $now;
    }

    public function cancelaReserva() {
        $query = "DELETE FROM BOOKING WHERE date = ? AND time = ? AND table_number = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$this->fecha, $this->hora, $this->mesa]);
    }

    public static function cancelarReserva($fecha, $hora, $mesa, $conn){
        $query = "DELETE FROM BOOKING WHERE date = ? AND time = ? AND table_number = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$fecha, $hora, $mesa]);
    }

    public static function obtenerTodasReservasActivas($conn) {
        $query = "SELECT client_email, date, time, table_number, description 
                  FROM BOOKING";
        $stmt = $conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function obtenerReservasActivas($email, $conn) {
        $query = "SELECT date, time, table_number, description
                  FROM BOOKING
                  WHERE date >= CURDATE() 
                  AND (date > CURDATE() OR (date = CURDATE() AND time >= CURTIME())) 
                  AND client_email = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$email]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function obtenerReservasPasadas($email, $conn) {
        $query = "SELECT date, time, table_number, description
                  FROM BOOKING
                  WHERE (date < CURDATE() OR (date = CURDATE() AND time < CURTIME())) 
                  AND client_email = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$email]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function reservasFiltradas($fecha, $conn){
        $query = "SELECT client_email, date, time, table_number,description FROM BOOKING WHERE date = '$fecha';";
        $result = $conn->query($query);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getHora() {
        return $this->hora;
    }

    public function getMesa() {
        return $this->mesa;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getClienteEmail() {
        return $this->cliente_email;
    }
    // Getters y Setters si es necesario
}
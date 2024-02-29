
-- Acceso base de datos llama:
-- define('DB_HOST', 'localhost');
-- define('DB_NAME', 'sistema_reservas');
-- define('DB_USER', 'user_dwes');
-- define('DB_PASS', 'userUSER2');

-- Diseñar el script SQL para crear las tablas y sus relaciones.
-- Configuración BBDD:
CREATE DATABASE sistema_reservas;
USE sistema_reservas;

-- CREAR USUARIO
CREATE USER 'user_dwes' IDENTIFIED BY 'userUSER2';
GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP, ALTER, EXECUTE ON *.* TO 'user_dwes'@'%';


-- Creación de la tabla de Clientes

CREATE TABLE Clientes (
    Email_Cliente varchar(50) PRIMARY KEY,
    Contraseña VARCHAR(100) NOT NULL
);

-- Creación de la tabla de Empleados

CREATE TABLE Empleados (
    ID_Empleado varchar(30) PRIMARY KEY,
    Contraseña VARCHAR(100) NOT NULL
);

-- Creación de la tabla de Reservas

CREATE TABLE Reservas (
    fecha DATE,
    hora TIME,
    numero INT,
    description TEXT,
    id_cliente varchar(50),
    PRIMARY KEY (fecha, hora, numero),
    FOREIGN KEY (id_cliente) REFERENCES Clientes(Email_Cliente),
    CHECK (hora IN ('20:30', '21:00', '21:30', '22:00', '22:30', '23:00'))
);

INSERT INTO Empleados (ID_Empleado, Contraseña) values ('miguel' , 'cobo');
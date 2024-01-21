CREATE DATABASE DEPARTAMENTOS;
USE DEPARTAMENTOS;

-- Creamos el usuario
CREATE USER 'gestor_empleados' IDENTIFIED BY 'gestorGESTOR2';
GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP, ALTER, EXECUTE ON *.* TO 'gestor_empleados'@'%';

CREATE TABLE empleados (
    DNI INT PRIMARY KEY,
    NOMBRE VARCHAR(50),
    APELLIDOS VARCHAR(50),
    ES_CANDIDATO BOOLEAN,
    VOTO INT,
    FOREIGN KEY (VOTO) REFERENCES empleados(DNI)
);

-- Insertar datos en la tabla empleados
INSERT INTO empleados (DNI, NOMBRE, APELLIDOS, ES_CANDIDATO) VALUES
(111111111, 'Juan', 'Pérez', 1),
(222222222, 'María', 'Gómez', 0),
(333333333, 'Carlos', 'López', 1),
(444444444, 'Ana', 'Martínez', 0),
(555555555, 'Pedro', 'Sánchez', 1),
(666666666, 'Laura', 'Rodríguez', 0),
(888888888, 'Alberto', 'Fernández', 1),
(999999999, 'Elena', 'García', 0),
(101010101, 'Roberto', 'Díaz', 1),
(121212121, 'Isabel', 'Hernández', 0);


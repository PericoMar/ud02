-- CREAR BASE DE DATOS
CREATE DATABASE restaurante;
USE restaurante;

-- CREAR USUARIO
CREATE USER 'gestor_restaurante' IDENTIFIED BY 'gestorGESTOR2';
GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP, ALTER, EXECUTE ON *.* TO 'gestor_restaurante'@'%';

-- CREAR TABLAS
CREATE TABLE CLIENT (
    email VARCHAR(50) PRIMARY KEY,
    password VARCHAR(50) NOT NULL
);

CREATE TABLE BOOKING (
    date DATE,
    time TIME,
    table_number INT,
    description TEXT,
    client_email varchar(50),
    PRIMARY KEY (date, time, table_number),
    FOREIGN KEY (client_email) REFERENCES Client(email),
    CHECK (time IN ('20:30', '21:00', '21:30', '22:00', '22:30', '23:00'))
);

CREATE TABLE EMPLOYEE (
    username VARCHAR(20) PRIMARY KEY,
    password VARCHAR(50) NOT NULL
);
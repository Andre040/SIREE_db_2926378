-- DROP DATABASE IF EXISTS DB_SIREE;

-- Crear la base de datos
CREATE DATABASE DB_SIREE DEFAULT CHARACTER SET utf8;
USE DB_SIREE;

-- -----------------------------------------------------
-- Tabla Clientes
-- -----------------------------------------------------
CREATE TABLE Clientes (
    ClienteID INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(100) NOT NULL,
    Dirección VARCHAR(255),
    Teléfono VARCHAR(20),
    CorreoElectrónico VARCHAR(100)
) ENGINE=InnoDB;

-- -----------------------------------------------------
-- Tabla Equipos
-- -----------------------------------------------------
CREATE TABLE Equipos (
    EquipoID INT AUTO_INCREMENT PRIMARY KEY,
    NombreEquipo VARCHAR(100) NOT NULL,
    Marca VARCHAR(50),
    Modelo VARCHAR(50),
    NúmeroSerie VARCHAR(50),
    Estado ENUM('disponible', 'alquilado', 'en mantenimiento') NOT NULL
) ENGINE=InnoDB;

-- -----------------------------------------------------
-- Tabla Rentas
-- -----------------------------------------------------
CREATE TABLE Rentas (
    RentaID INT AUTO_INCREMENT PRIMARY KEY,
    ClienteID INT,
    EquipoID INT,
    FechaInicio DATE NOT NULL,
    FechaFin DATE,
    PrecioTotal DECIMAL(10, 2),
    EstadoRenta ENUM('activa', 'completada', 'cancelada') NOT NULL,
    FOREIGN KEY (ClienteID) REFERENCES Clientes(ClienteID),
    FOREIGN KEY (EquipoID) REFERENCES Equipos(EquipoID)
) ENGINE=InnoDB;

-- -----------------------------------------------------
-- Tabla Pagos
-- -----------------------------------------------------
CREATE TABLE Pagos (
    PagoID INT AUTO_INCREMENT PRIMARY KEY,
    RentaID INT,
    FechaPago DATE NOT NULL,
    Monto DECIMAL(10, 2) NOT NULL,
    MétodoPago ENUM('tarjeta de crédito', 'efectivo', 'transferencia') NOT NULL,
    FOREIGN KEY (RentaID) REFERENCES Rentas(RentaID)
) ENGINE=InnoDB;

-- -----------------------------------------------------
-- Tabla Mantenimiento
-- -----------------------------------------------------
CREATE TABLE Mantenimiento (
    MantenimientoID INT AUTO_INCREMENT PRIMARY KEY,
    EquipoID INT,
    FechaInicio DATE NOT NULL,
    FechaFin DATE,
    Descripción TEXT,
    Costo DECIMAL(10, 2),
    FOREIGN KEY (EquipoID) REFERENCES Equipos(EquipoID)
) ENGINE=InnoDB;

-- DROP DATABASE DB_SIREE;
-- -----------------------------------------------------
-- Escrtuctura de Base de Datos: DB_SIREE
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Escrtuctura de Base de Datos: DB_SIREE
-- -----------------------------------------------------
CREATE Database DB_SIREE DEFAULT CHARACTER SET utf8 ;
USE DB_SIREE;

-- -----------------------------------------------------
-- Tabla Clientes
-- -----------------------------------------------------
CREATE TABLE Clientes (
    ClienteID INT PRIMARY KEY AUTO_INCREMENT,
    Nombre VARCHAR(100),
    Dirección VARCHAR(255),
    Teléfono VARCHAR(20),
    CorreoElectrónico VARCHAR(100))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Tabla Equipos
-- -----------------------------------------------------
CREATE TABLE Equipos (
    EquipoID INT PRIMARY KEY AUTO_INCREMENT,
    NombreEquipo VARCHAR(100),
    Marca VARCHAR(50),
    Modelo VARCHAR(50),
    NúmeroSerie VARCHAR(50),
    Estado ENUM('disponible', 'alquilado', 'en mantenimiento'))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Tabla Rentas
-- -----------------------------------------------------
CREATE TABLE Rentas (
    RentaID INT PRIMARY KEY AUTO_INCREMENT,
    ClienteID INT,
    EquipoID INT,
    FechaInicio DATE,
    FechaFin DATE,
    PrecioTotal DECIMAL(10, 2),
    EstadoRenta ENUM('activa', 'completada', 'cancelada'),
    FOREIGN KEY (ClienteID) REFERENCES Clientes(ClienteID),
    FOREIGN KEY (EquipoID) REFERENCES Equipos(EquipoID))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Tabla Pagos
-- -----------------------------------------------------
CREATE TABLE Pagos (
    PagoID INT PRIMARY KEY AUTO_INCREMENT,
    RentaID INT,
    FechaPago DATE,
    Monto DECIMAL(10, 2),
    MétodoPago ENUM('tarjeta de crédito', 'efectivo', 'transferencia'),
    FOREIGN KEY (RentaID) REFERENCES Rentas(RentaID))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Tabla Mantenimiento
-- -----------------------------------------------------
CREATE TABLE Mantenimiento (
    MantenimientoID INT PRIMARY KEY AUTO_INCREMENT,
    EquipoID INT,
    FechaInicio DATE,
    FechaFin DATE,
    Descripción TEXT,
    Costo DECIMAL(10, 2),
    FOREIGN KEY (EquipoID) REFERENCES Equipos(EquipoID))
ENGINE = Innodb;  
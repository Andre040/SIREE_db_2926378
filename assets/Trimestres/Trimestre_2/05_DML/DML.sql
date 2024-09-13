-- ========================================
-- SCRIPT DML PARA LA BASE DE DATOS db_siree
-- ========================================

-- ----------------------------------------
-- Tabla `clientes`
-- ----------------------------------------

-- Insertar un nuevo cliente
INSERT INTO `db_siree`.`clientes` (`Nombre`, `Dirección`, `Teléfono`, `CorreoElectrónico`)
VALUES ('Juan Pérez', 'Av. Siempre Viva 123', '555-1234', 'juan.perez@mail.com');

-- Actualizar la dirección de un cliente
UPDATE `db_siree`.`clientes`
SET `Dirección` = 'Av. Nueva 456'
WHERE `ClienteID` = 1;

-- Eliminar un cliente por su ID
DELETE FROM `db_siree`.`clientes`
WHERE `ClienteID` = 1;

-- Consultar todos los clientes
SELECT * FROM `db_siree`.`clientes`;


-- ----------------------------------------
-- Tabla `equipos`
-- ----------------------------------------

-- Insertar un nuevo equipo
INSERT INTO `db_siree`.`equipos` (`NombreEquipo`, `Marca`, `Modelo`, `NúmeroSerie`, `Estado`)
VALUES ('Excavadora', 'Caterpillar', 'CAT320', '123456', 'disponible');

-- Actualizar el estado de un equipo
UPDATE `db_siree`.`equipos`
SET `Estado` = 'en mantenimiento'
WHERE `EquipoID` = 1;

-- Eliminar un equipo por su ID
DELETE FROM `db_siree`.`equipos`
WHERE `EquipoID` = 1;

-- Consultar todos los equipos disponibles
SELECT * FROM `db_siree`.`equipos`
WHERE `Estado` = 'disponible';


-- ----------------------------------------
-- Tabla `mantenimiento`
-- ----------------------------------------

-- Registrar un nuevo mantenimiento para un equipo
INSERT INTO `db_siree`.`mantenimiento` (`EquipoID`, `FechaInicio`, `FechaFin`, `Descripción`, `Costo`)
VALUES (1, '2024-09-01', '2024-09-10', 'Cambio de piezas', 1500.00);

-- Actualizar el costo de un mantenimiento
UPDATE `db_siree`.`mantenimiento`
SET `Costo` = 1600.00
WHERE `MantenimientoID` = 1;

-- Eliminar un registro de mantenimiento por su ID
DELETE FROM `db_siree`.`mantenimiento`
WHERE `MantenimientoID` = 1;

-- Consultar todos los mantenimientos de un equipo específico
SELECT * FROM `db_siree`.`mantenimiento`
WHERE `EquipoID` = 1;


-- ----------------------------------------
-- Tabla `rentas`
-- ----------------------------------------

-- Registrar una nueva renta
INSERT INTO `db_siree`.`rentas` (`ClienteID`, `EquipoID`, `FechaInicio`, `FechaFin`, `PrecioTotal`, `EstadoRenta`)
VALUES (1, 1, '2024-09-07', '2024-09-14', 700.00, 'activa');

-- Actualizar el estado de una renta
UPDATE `db_siree`.`rentas`
SET `EstadoRenta` = 'completada'
WHERE `RentaID` = 1;

-- Eliminar una renta por su ID
DELETE FROM `db_siree`.`rentas`
WHERE `RentaID` = 1;

-- Consultar todas las rentas activas
SELECT * FROM `db_siree`.`rentas`
WHERE `EstadoRenta` = 'activa';


-- ----------------------------------------
-- Tabla `pagos`
-- ----------------------------------------

-- Registrar un nuevo pago
INSERT INTO `db_siree`.`pagos` (`RentaID`, `FechaPago`, `Monto`, `MétodoPago`)
VALUES (1, '2024-09-08', 700.00, 'tarjeta de crédito');

-- Actualizar el monto de un pago
UPDATE `db_siree`.`pagos`
SET `Monto` = 750.00
WHERE `PagoID` = 1;

-- Eliminar un pago por su ID
DELETE FROM `db_siree`.`pagos`
WHERE `PagoID` = 1;

-- Consultar todos los pagos realizados para una renta específica
SELECT * FROM `db_siree`.`pagos`
WHERE `RentaID` = 1;
-- ========================================
-- SCRIPT DML PARA LA BASE DE DATOS db_siree
-- ========================================

-- ----------------------------------------
-- Tabla Rol
-- ----------------------------------------

-- Insertar un nuevo Rol
-- Insert
INSERT INTO db_siree.Rol (nombre) VALUES ('Guest');

-- Update
UPDATE db_siree.Rol SET nombre = 'Super Admin' WHERE Id_rol = 1;

-- Delete
DELETE FROM db_siree.Rol WHERE Id_rol = 3;

-- Select
SELECT * FROM db_siree.Rol;


-- ----------------------------------------
-- Tabla Usuarios
-- ----------------------------------------

-- Insert
INSERT INTO db_siree.USUARIOS (nombre, email, contraseña, id_rol, celular, direccion) VALUES 
('Carlos Ruiz', 'carlos.ruiz@example.com', 'securepassword', 2, '1122334455', 'Calle Verdadera 456');

-- Update
UPDATE db_siree.USUARIOS SET email = 'juan.perez_updated@example.com' WHERE id_usuario = 1;

-- Delete
DELETE FROM db_siree.USUARIOS WHERE id_usuario = 2;

-- Select
SELECT * FROM db_siree.USUARIOS;


-- ----------------------------------------
-- Tabla Rentas
-- ----------------------------------------

-- Insert
INSERT INTO db_siree.RENTAS (id_usuario, fecha_renta, fecha_devolucion, estado, precio_total, id_notificacion) VALUES 
(1, '2024-11-25', '2024-12-02', 'Pendiente', 300.00, 3);

-- Update
UPDATE db_siree.RENTAS SET fecha_devolucion = '2024-12-05' WHERE id_renta = 1;

-- Delete
DELETE FROM db_siree.RENTAS WHERE id_renta = 2;

-- Select
SELECT * FROM db_siree.RENTAS;



-- ----------------------------------------
-- Tabla Equipos
-- ----------------------------------------

-- Insert
INSERT INTO db_siree.EQUIPOS (nombre, categoria, valor_renta, estado, cantidad_disponible) VALUES 
('Proyector', 'Audiovisuales', 100.00, 'Disponible', 8);

-- Update
UPDATE db_siree.EQUIPOS SET cantidad_disponible = 7 WHERE id_equipo = 1;

-- Delete
DELETE FROM db_siree.EQUIPOS WHERE id_equipo = 2;

-- Select
SELECT * FROM db_siree.EQUIPOS;

-- ----------------------------------------
-- Tabla Listado de Equipos
-- ----------------------------------------

-- Insert
INSERT INTO db_siree.LISTADO_DE_EQUIPOS (id_renta, nombre, categoria) VALUES 
(1, 'Proyector', 'Audiovisuales');

-- Update
UPDATE db_siree.LISTADO_DE_EQUIPOS SET nombre = 'Cámara', categoria = 'Fotografía' WHERE Id_listado_equipo = 1;

-- Delete
DELETE FROM db_siree.LISTADO_DE_EQUIPOS WHERE Id_listado_equipo = 1;

-- Select
SELECT * FROM db_siree.LISTADO_DE_EQUIPOS;
/* ***************************** */
/* ---------------------------------------- DML ---------------------------------------- */
/* ---------------------------- DATA MANIPULATION LANGUAGE ----------------------------- */
/* ------------------------- LENGUAJE DE MANIPULACIÓN DE DATOS ------------------------- */
/* ------------------------------------- UNA TABLA ------------------------------------- */
/* ------------------------------------------------------------------------------------- */
/* ***************************** */
/* ------------------------------------------------------------------------------------- */
/* 1. CONSULTAS DE ACCIÓN [Inicio] : . INSERT INTO, UPDATE, DELETE                       */
/* 1.1. Crear o Registrar : .......... INSERT INTO _ VALUES ( _ , __ )                 */
/* 1.1.1. Datos Correctos : .......... INSERT INTO _ VALUES ( _ , __ )                 */
/* 1.1.2. Datos Incorrectos : ........ INSERT INTO _ VALUES ( _ , __ )                 */
/* 1.2. Actualizar : ................. UPDATE _ SET _ = _ WHERE _ = __               */
/* 1.3. Eliminar : ................... DELETE FROM _ WHERE _ = __                      */
/* 2. CONSULTAS DE SELECCIÓN : ....... SELECT                                            */
/* 2.1. Generales : .................. SELECT * FROM __                                  */
/* 2.2. Específicas : ................ SELECT _ , _ FROM __                            */
/* 2.3. Con Criterios: ............... SELECT _ FROM _ WHERE _ = _                   */
/* 2.4. Con Operadores Lógicos : ..... OR, AND, NOT                                      */
/* 2.4.1. 0 [OR] : ................... SELECT _ FROM _ WHERE _ = _ OR _ = _        */
/* 2.4.2. Y [AND] : .................. SELECT _ FROM _ WHERE _ = _ AND _ = _       */
/* 2.4.3. No [NOT] : ................. SELECT _ FROM _ WHERE _ NOT IN ( _ )          */
/* 2.5. Con Operadores Comparación : . <>, <, <=, >, >=                                  */
/* 2.5.1. Diferente [<>] : ........... SELECT _ FROM _ WHERE _ <> _                  */
/* 2.5.2. Menor que [<] : ............ SELECT _ FROM _ WHERE _ <  _                  */
/* 2.5.3. Mayor que [>] : ............ SELECT _ FROM _ WHERE _ >  _                  */
/* 2.5.4. Menor o igual [<=] : ....... SELECT _ FROM _ WHERE _ <=  _                 */
/* 2.5.5. Mayor o igual [>=] : ....... SELECT _ FROM _ WHERE _ >=  _                 */
/* 2.6. Con otros Operadores : ....... LIKE '%' , BETWEEN _ AND _ , IN ( _ , __ )    */
/* 2.6.1. Comodín [LIKE '%'] : ...... SELECT _ FROM _ WHERE _ LIKE '_%'              */
/* 2.6.2. Entre [BETWEEN] : .......... SELECT _ FROM _ WHERE _ BETWEEN _ AND __      */
/* 2.6.3. Lista [IN ( _ )] : ........ SELECT _ FROM _ WHERE _ IN( _ , _ )          */
/* 2.7. Ordenadas : .................. ORDER BY __                                       */
/* 2.7.1. Ascendente [ASC] : ......... SELECT _ FROM _ WHERE _ = _ ORDER BY __ ASC   */
/* 2.7.2. Descendente [DESC] : ....... SELECT _ FROM _ WHERE _ = _ ORDER BY __ DESC  */
/* 2.7.3. Combinadas : ............... SELECT _ FROM _ WHERE _ = _ ORDER BY __       */
/* 2.8. Calculadas con Funciones: .... GROUP BY __                                       */
/* 2.8.1. Suma [SUM()] : ............. SELECT _ , SUM( _ ) FROM _ GROUP BY _         */
/* 2.8.2. Promedio [AVG()] : ......... SELECT _ , AVG( _ ) FROM _ GROUP BY _         */
/* 2.8.3. Máximo [MAX()] : ........... SELECT _ , MAX( _ ) FROM _ GROUP BY _         */
/* 2.8.4. Mínimo [MIN()] : ........... SELECT _ , MIN( _ ) FROM _ GROUP BY _         */
/* 2.8.5. Conteo [COUNT()] : ......... SELECT _ , COUNT( _ ) FROM _ GROUP BY _       */
/* 2.9. Calculadas con Alias : ....... SELECT _ , FUN( _ ) AS _ FROM _               */
/* 2.10. Calculadas Condicionantes : . GROUP BY _ HAVING _ = _ OR _ = __             */
/* 2.11. Calculadas con Operadores : . SELECT _ , _ , ROUND( _*0.19,2) AS _ FROM __  */
/* 2.12. Calculadas con Fechas : ..... NOW(), DATE_FORMAT(), TIMESTAMPDIFF()             */
/* 2.12.1. Fecha Actual : ............ NOW()                                             */
/* 2.12.2. Formato Fecha : ........... DATE_FORMAT(NOW(), '%Y-%m-%d')                    */
/* 2.12.3. Direfencia Fechas : ....... TIMESTAMPDIFF(DAY, __ , NOW())                    */
/* 3. CONSULTAS DE ACCIÓN [Final] : .. INSERT INTO, UPDATE, DELETE                       */
/* ------------------------------------------------------------------------------------- */
/* BIBLIOGRAFÍA                                                                          */
/* ------------------------------------------------------------------------------------- */
/* ***************************** */
/* EN CONSOLA: XAMPP / SHELL / cd mysql/bin / mysql -h localhost -u root -p / ENTER      */
/* ***************************** */


/* ***************************** */
/* -------------------------- 1. CONSULTAS DE ACCIÓN [Inicio] -------------------------- */
/* ---------------------------- INSERT INTO, UPDATE, DELETE ---------------------------- */
/* ***************************** */
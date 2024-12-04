<?php
require_once './models/Rol.php';
require_once './controllers/Roles.php';

try {
    // Conexión a la base de datos
    $dbh = DataBase::connection();
    $rolModel = new Rol();
    $rolController = new Roles($rolModel);

    // Variables para cargar datos en el formulario
    $editRol = null;

    // Manejar la solicitud de eliminación
    if (isset($_POST['delete_rol_id'])) {
        $rolController->deleteRol($_POST['delete_rol_id']);
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit();
    }

    // Manejar la solicitud de creación de rol
    if (isset($_POST['create_rol'])) {
        $rol_data = [
            'nombre' => $_POST['nombre']
        ];
        $rolController->createRol($rol_data);
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit();
    }

    // Manejar la solicitud de actualización de rol
    if (isset($_POST['btnActualizar'])) {
        $rol_data = [
            'nombre' => $_POST['nombre']
        ];
        $rolController->updateRol($_POST['update_rol_id'], $rol_data);
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit();
    }

    // Manejar la solicitud de edición de rol
    if (isset($_POST['edit_rol_id'])) {
        $editRol = $rolController->listRol($_POST['edit_rol_id']);
    }

    // Llamar al método para listar los roles y almacenar los resultados en $roles
    $roles = $rolController->listRol();
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
?>

<?php
require_once './models/rol.php';
require_once './controllers/roles.php';

try {
    $dbh = DataBase::connection();
    $rolModel = new Rol($dbh);
    $rolController = new Roles($rolModel);

    // Variables para cargar datos en el formulario
    $editRol = null;

    // Manejar la solicitud de eliminación
    if (isset($_POST['delete_rol_id'])) {
        $rolController->deleteRol($_POST['delete_rol_id']);
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit();
    }

    // Manejar la solicitud de creación de usuario
    if (isset($_POST['create_rol'])) {
        $rol_data = ['name' => $_POST['name'],
        ];
        $rolController->createRol($rol_data);
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit();
    }

    // Llamar al método para listar los usuarios y almacenar los resultados en $rols
    $rols = $rolController->listRol();
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
?>
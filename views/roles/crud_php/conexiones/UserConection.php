<?php
require_once './models/user.php';
require_once './controllers/users.php';

try {
    // Conexión a la base de datos
    $dbh = DataBase::connection();
    $userModel = new User($dbh);
    $userController = new Users($userModel);

    // Variables para cargar datos en el formulario
    $editUser = null;

    // Manejar la solicitud de eliminación
    if (isset($_POST['delete_user_id'])) {
        $userController->deleteUser($_POST['delete_user_id']);
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit();
    }

    // Manejar la solicitud de creación de usuario
    if (isset($_POST['create_user'])) {
        $user_data = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'phone' => $_POST['phone'],
            'address' => $_POST['address']
        ];
        $userController->createUser($user_data);
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit();
    }

    // Manejar la solicitud de actualización de usuario
    if (isset($_POST['btnActualizar'])) {
        $user_data = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'phone' => $_POST['phone'],
            'address' => $_POST['address'],
            'role' => 1 // Rol predeterminado a 1 (Cliente)
        ];
        $userController->updateUser($_POST['update_user_id'], $user_data);
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit();
    }

    // Manejar la solicitud de edición de usuario
    if (isset($_POST['edit_user_id'])) {
        $editUser = $userController->getUserById($_POST['edit_user_id']);
    }

    // Llamar al método para listar los usuarios y almacenar los resultados en $users
    $users = $userController->listUsers();
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
?>

<?php
require_once './models/Computer.php';
require_once './controllers/Computers.php';

try {
    $dbh = DataBase::connection();
    $computerModel = new Computer($dbh);
    $computersController = new Computers($computerModel);

    // Variables para cargar datos en el formulario
    $editComputer = null;

    // Manejar la solicitud de eliminación
    if (isset($_POST['delete_computer_id'])) {
        $computersController->deleteComputer($_POST['delete_computer_id']);
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit();
    }

    // Manejar la solicitud de creación de computadora
    if (isset($_POST['create_computer'])) {
        $computer_data = [
            'nombre' => $_POST['nombre'],
            'categoria' => $_POST['categoria'],
            'valor_renta' => $_POST['valor_renta'],
            'estado' => $_POST['estado'],
            'cantidad_disponible' => $_POST['cantidad_disponible']
        ];
        $computersController->createComputer($computer_data);
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit();
    }

    // Manejar la solicitud de actualización de computadora
    if (isset($_POST['btnActualizar'])) {
        $computer_data = [
            'nombre' => $_POST['nombre'],
            'categoria' => $_POST['categoria'],
            'valor_renta' => $_POST['valor_renta'],
            'estado' => $_POST['estado'],
            'cantidad_disponible' => $_POST['cantidad_disponible']
        ];
        $computersController->UpdateComputer($_POST['update_computer_id'], $computer_data);
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit();
    }

    // Llamar al método para listar las computadoras y almacenar los resultados en $computers
    $computers = $computersController->listComputer();
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
?>

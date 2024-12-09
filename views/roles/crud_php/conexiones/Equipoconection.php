<?php
require_once './models/Equipo.php'; 
require_once './controllers/Equipo.php';
try {
    $dbh = DataBase::connection();
    $equipoModel = new Equipo($dbh); 
    $equipoController = new Equipos($equipoModel); 

    $editEquipo = null;

    if (isset($_POST['delete_equipo_id'])) {
        $equipoController->deleteEquipo($_POST['delete_equipo_id']);
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit();
    }

    // Manejar la solicitud de creación de equipo
    if (isset($_POST['create_equipo'])) {
        $equipo_data = [
            'nombre' => $_POST['nombre'],
            'categoria' => $_POST['categoria'],
            'valor_renta' => $_POST['valor_renta'],
            'estado' => $_POST['estado'],
            'cantidad_disponible' => $_POST['cantidad_disponible']
        ];
        $equipoController->createEquipo($equipo_data);
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit();
    }

    // Llamar al método para listar los equipos y almacenar los resultados en $equipos
    $equipos = $equipoController->listEquipo();

} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
?>

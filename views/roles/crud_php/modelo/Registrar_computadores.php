<?php
require_once './views/roles/crud_php/conexiones/ComputerConexion.php'
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Equipos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e15f4b9604.js" crossorigin="anonymous"></script>
</head>

<body>
    <header class="bg-dark text-white text-center p-3">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Mi Aplicación</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">  
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="listar_usuarios.php">Lista de Usuarios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="listar_roles.php">Lista de Roles</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="listar_computers.php">Lista de Equipos</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <h1 class="text-center p-3">Lista de Equipos</h1>
    <div class="container-fluid row">
        <div class="col-4 p-3">
            <h3 class="text-center text-secondary">Registro de Equipos</h3>
            <!-- Formulario para registrar/modificar equipos -->
            <form method="POST" action="">
                <div class="mb-3"> <label for="nombre" class="form-label">Nombre del Equipo</label> <input type="text" class="form-control" name="nombre" required> </div>
                <div class="mb-3"> <label for="categoria" class="form-label">Categoría</label> <input type="text" class="form-control" name="categoria" required> </div>
                <div class="mb-3"> <label for="valor_renta" class="form-label">Valor de Renta</label> <input type="text" class="form-control" name="valor_renta" required> </div>
                <div class="mb-3"> <label for="estado" class="form-label">Estado</label> <input type="text" class="form-control" name="estado" required> </div>
                <div class="mb-3"> <label for="cantidad_disponible" class="form-label">Cantidad Disponible</label> <input type="number" class="form-control" name="cantidad_disponible" required min="0"> </div> <input type="hidden" name="update_computer_id" value="<?php echo isset($editComputer) ? $editComputer->getComputerId() : ''; ?>"> <?php if (isset($editComputer)): ?> <button type="submit" class="btn btn-primary" name="btnActualizar" value="ok">Actualizar</button> <?php else: ?> <button type="submit" class="btn btn-primary" name="create_computer" value="ok">Registrar</button> <?php endif; ?>
            </form>
        </div>
        <div class="col-8 p-4">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre del Equipo</th>
                        <th scope="col">Categoría</th>
                        <th scope="col">Valor de Renta</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Cantidad Disponible</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($computers)): ?>
                        <?php foreach ($computers as $computer): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($computer->getComputerId()); ?></td>
                                <td><?php echo htmlspecialchars($computer->getComputerName()); ?></td>
                                <td><?php echo htmlspecialchars($computer->getComputerCategory()); ?></td>
                                <td><?php echo htmlspecialchars($computer->getComputerPriceRent()); ?></td>
                                <td><?php echo htmlspecialchars($computer->getComputerStatus()); ?></td>
                                <td><?php echo htmlspecialchars($computer->getComputerAvailableQuantity()); ?></td>
                                <td>
                                    <!-- Botón para editar equipo -->
                                    <form method="POST" action="" style="display:inline;">
                                        <input type="hidden" name="edit_computer_id" value="<?php echo $computer->getComputerId(); ?>">
                                        <button type="submit" class="btn btn-small btn-warning">
                                            <i class="fa-regular fa-pen-to-square fa-shake" style="color: black;"></i>
                                        </button>
                                    </form>
                                    <!-- Botón para borrar equipo -->
                                    <form method="POST" action="" style="display:inline;">
                                        <input type="hidden" name="delete_computer_id" value="<?php echo $computer->getComputerId(); ?>">
                                        <button type="submit" class="btn btn-small btn-danger">
                                            <i class="fa-solid fa-trash-can fa-bounce" style="color: black;"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7">No hay equipos registrados.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../../../../assets/Landing/js/Equipos.js"></script>
</body>

</html>
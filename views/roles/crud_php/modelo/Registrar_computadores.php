<?php
require_once './views/roles/crud_php/conexiones/ComputerConexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipos - SIREE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e15f4b9604.js" crossorigin="anonymous"></script>
</head>

<body>
    <header class="bg-dark text-white">
        <nav class="navbar navbar-expand-lg navbar-dark container-fluid">
            <a class="navbar-brand" href="#">SIREE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="./views/roles/crud_php/modelo/Registrar_roles.php">Lista de Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="listar_roles.php">Lista de Roles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="listar_computers.php">Lista de Equipos</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main class="container mt-4">
        <div class="text-center">
            <h1 class="mb-4">Equipos Disponibles</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Categoría</th>
                                <th scope="col">Valor de Renta</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Cantidad</th>
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
                                            <div class="d-flex">
                                             
                                                <form method="POST" action="" class="me-2">
                                                    <input type="hidden" name="edit_computer_id" value="<?php echo $computer->getComputerId(); ?>">
                                                    <button type="submit" class="btn btn-warning btn-sm">
                                                        <i class="fa-regular fa-pen-to-square"></i>
                                                    </button>
                                                </form>
                                               
                                                <form method="POST" action="">
                                                    <input type="hidden" name="delete_computer_id" value="<?php echo $computer->getComputerId(); ?>">
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fa-solid fa-trash-can"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7" class="text-center">No hay equipos registrados.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="accordion mt-4" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Registrar o Editar Equipos
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <form method="POST" action="">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre del Equipo</label>
                                <input type="text" class="form-control" name="nombre" value="<?php echo isset($editComputer) ? htmlspecialchars($editComputer->getComputerName()) : ''; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="categoria" class="form-label">Categoría</label>
                                <input type="text" class="form-control" name="categoria" value="<?php echo isset($editComputer) ? htmlspecialchars($editComputer->getComputerCategory()) : ''; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="valor_renta" class="form-label">Valor de Renta</label>
                                <input type="text" class="form-control" name="valor_renta" value="<?php echo isset($editComputer) ? htmlspecialchars($editComputer->getComputerPriceRent()) : ''; ?>" required pattern="^\d+(\.\d{1,2})?$">
                            </div>
                            <div class="mb-3">
                                <label for="estado" class="form-label">Estado</label>
                                <input type="text" class="form-control" name="estado" value="<?php echo isset($editComputer) ? htmlspecialchars($editComputer->getComputerStatus()) : ''; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="cantidad_disponible" class="form-label">Cantidad Disponible</label>
                                <input type="number" class="form-control" name="cantidad_disponible" value="<?php echo isset($editComputer) ? htmlspecialchars($editComputer->getComputerAvailableQuantity()) : ''; ?>" required min="0">
                            </div>
                            <input type="hidden" name="update_computer_id" value="<?php echo isset($editComputer) ? $editComputer->getComputerId() : ''; ?>">
                            <button type="submit" class="btn btn-primary w-100" name="<?php echo isset($editComputer) ? 'btnActualizar' : 'create_computer'; ?>" value="ok">
                                <?php echo isset($editComputer) ? 'Actualizar' : 'Registrar'; ?>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-dark text-white text-center p-3 mt-4">
        <p class="mb-0">&copy; 2024 SIREE. Todos los derechos reservados.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
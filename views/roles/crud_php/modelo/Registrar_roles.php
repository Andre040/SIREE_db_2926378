<?php
require_once './views/roles/crud_php/conexiones/RolConection.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Roles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e15f4b9604.js" crossorigin="anonymous"></script>
</head>
<body>
    <h1 class="text-center p-3">Lista de Roles</h1>
    <div class="container-fluid row">
        <div class="col-4 p-3">
            <h3 class="text-center text-secondary">Registro de Roles</h3>
            <!-- Formulario para registrar/modificar roles -->
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre del Rol</label>
                    <input type="text" class="form-control" name="nombre" value="<?php echo isset($editRol) ? htmlspecialchars($editRol->getRolName()) : ''; ?>">
                </div>
                <input type="hidden" name="update_rol_id" value="<?php echo isset($editRol) ? $editRol->getRolId() : ''; ?>">
                <?php if (isset($editRol)): ?>
                    <button type="submit" class="btn btn-primary" name="btnActualizar" value="ok">Actualizar</button>
                <?php else: ?>
                    <button type="submit" class="btn btn-primary" name="create_rol" value="ok">Registrar</button>
                <?php endif; ?>
            </form>
        </div>
        <div class="col-8 p-4">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre del Rol</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($roles)): ?>
                        <?php foreach ($roles as $rol): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($rol->getRolId()); ?></td>
                                <td><?php echo htmlspecialchars($rol->getRolName()); ?></td>
                                <td>
                                    <!-- Botón para editar rol -->
                                    <form method="POST" action="" style="display:inline;">
                                        <input a="modificar_rol.php?id=<??>" type="hidden" name="edit_rol_id" value="<?php echo $rol->getRolId(); ?>">
                                        <button type="submit" class="btn btn-small btn-warning">
                                            <i class="fa-regular fa-pen-to-square fa-shake" style="color: black;"></i>
                                        </button>
                                    </form>
                                    <!-- Botón para borrar rol -->
                                    <form method="POST" action="" style="display:inline;">
                                        <input type="hidden" name="delete_rol_id" value="<?php echo $rol->getRolId(); ?>">
                                        <button type="submit" class="btn btn-small btn-danger">
                                            <i class="fa-solid fa-trash-can fa-bounce" style="color: black;"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3">No hay roles registrados.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

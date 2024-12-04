<?php
require_once './views/roles/crud_php/conexiones/UserConection.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e15f4b9604.js" crossorigin="anonymous"></script>
</head>
<body>
    <h1 class="text-center p-3">Lista de Usuarios</h1>
    <div class="container-fluid row">
        <div class="col-4 p-3">
            <h3 class="text-center text-secondary">Registro de Personas</h3>
            <!-- Formulario para registrar/modificar personas -->
            <form method="POST" action="">
    <div class="mb-3">
        <label for="name" class="form-label">Nombre de la Persona</label>
        <input type="text" class="form-control" name="name" value="<?php echo isset($editUser) ? htmlspecialchars($editUser->getUserName()) : ''; ?>">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Correo Electrónico</label>
        <input type="email" class="form-control" name="email" value="<?php echo isset($editUser) ? htmlspecialchars($editUser->getUserEmail()) : ''; ?>">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <input type="text" class="form-control" name="password" value="<?php echo isset($editUser) ? htmlspecialchars($editUser->getUserPassword()) : ''; ?>">
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Celular</label>
        <input type="text" class="form-control" name="phone" value="<?php echo isset($editUser) ? htmlspecialchars($editUser->getUserPhone()) : ''; ?>">
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Dirección</label>
        <input type="text" class="form-control" name="address" value="<?php echo isset($editUser) ? htmlspecialchars($editUser->getUserAddress()) : ''; ?>">
    </div>
    <input type="hidden" name="update_user_id" value="<?php echo isset($editUser) ? $editUser->getUserId() : ''; ?>">
    <?php if (isset($editUser)): ?>
        <button type="submit" class="btn btn-primary" name="btnActualizar" value="ok">Actualizar</button>
    <?php else: ?>
        <button type="submit" class="btn btn-primary" name="create_user" value="ok">Registrar</button>
    <?php endif; ?>
</form>

        </div>
        <div class="col-8 p-4">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Email</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Celular</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($users)): ?>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($user->getUserId()); ?></td>
                                <td><?php echo htmlspecialchars($user->getUserName()); ?></td>
                                <td><?php echo htmlspecialchars($user->getUserEmail()); ?></td>
                                <td><?php echo htmlspecialchars($user->getUserRol()); ?></td>
                                <td><?php echo htmlspecialchars($user->getUserPhone()); ?></td>
                                <td><?php echo htmlspecialchars($user->getUserAddress()); ?></td>
                                <td>
                                    <!-- Botón para editar usuario -->
                                    <form method="POST" action="" style="display:inline;">
                                        <input type="hidden" name="edit_user_id" value="<?php echo $user->getUserId(); ?>">
                                        <button type="submit" class="btn btn-small btn-warning">
                                            <i class="fa-regular fa-pen-to-square fa-shake" style="color: black;"></i>
                                        </button>
                                    </form>
                                    <!-- Botón para borrar usuario -->
                                    <form method="POST" action="" style="display:inline;">
                                        <input type="hidden" name="delete_user_id" value="<?php echo $user->getUserId(); ?>">
                                        <button type="submit" class="btn btn-small btn-danger">
                                            <i class="fa-solid fa-trash-can fa-bounce" style="color: black;"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7">No hay usuarios registrados.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<form method="POST" action="">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<h1 class="text-center p-3">Lista de Roles</h1>
    <div class="container-fluid row">
        <div class="col-4 p-3">
            <h3 class="text-center text-secondary">Modificar Roles</h3>
            <!-- Formulario para registrar/modificar roles -->
            <form class="col-4 p-3 m-auto" method="POST" action="">
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
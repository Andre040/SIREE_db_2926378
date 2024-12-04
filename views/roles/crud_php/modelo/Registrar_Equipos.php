<?php
// vista_registro_equipo.php
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Equipo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Registrar Nuevo Equipo</h2>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del Equipo</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>

            <div class="mb-3">
                <label for="categoria" class="form-label">Categoría</label>
                <input type="text" class="form-control" id="categoria" name="categoria" required>
            </div>

            <div class="mb-3">
                <label for="valor_renta" class="form-label">Valor de Renta</label>
                <input type="number" step="0.01" class="form-control" id="valor_renta" name="valor_renta" required>
            </div>

            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <input type="text" class="form-control" id="estado" name="estado" required>
            </div>

            <div class="mb-3">
                <label for="cantidad_disponible" class="form-label">Cantidad Disponible</label>
                <input type="number" class="form-control" id="cantidad_disponible" name="cantidad_disponible" required>
            </div>

            <button type="submit" class="btn btn-primary" name="create_equipo">Registrar Equipo</button>
        </form>

        <h3 class="mt-5">Lista de Equipos</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Categoría</th>
                    <th>Valor de Renta</th>
                    <th>Estado</th>
                    <th>Cantidad Disponible</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($equipos)) : ?>
                    <?php foreach ($equipos as $equipo) : ?>
                        <tr>
                            <td><?= $equipo['id_equipo'] ?></td>
                            <td><?= $equipo['nombre'] ?></td>
                            <td><?= $equipo['categoria'] ?></td>
                            <td><?= $equipo['valor_renta'] ?></td>
                            <td><?= $equipo['estado'] ?></td>
                            <td><?= $equipo['cantidad_disponible'] ?></td>
                            <td>
                                <form method="POST" action="">
                                    <button type="submit" class="btn btn-danger" name="delete_equipo_id" value="<?= $equipo['id_equipo'] ?>">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
require_once '../controllers/controltransporte.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Registro de transporte</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>

<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4 text-success">Registro de transporte</h1>

        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm p-4 bg-primary bg-gradient bg-opacity-75 text-white p-3">
                    <h4 class="card-title mb-3 bg-white text-success">Nuevo Registro de Transporte</h4>

                    <form action="index.php" method="POST">
                        <div class="mb-3">
                            <label for="" class="form-label">Nombre Completo:</label>
                            <input type="text" name="nombre" class="form-control" required placeholder="Ej. Geovany Ramirez">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Codigo de la maquinaria/camion:</label>
                            <input type="text" name="codigo" class="form-control" required placeholder="Ej. CA-23">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Peso:</label>
                            <input type="number" name="peso" class="form-control" required placeholder="Ej. 1000">
                        </div>
                        <button type="submit" name="btn_registrar" class="btn btn-success w-100">Guardar Registro</button>
                    </form>

                </div>
            </div>

            <div class="col-md-8">
                <div class="card shadow-sm p-4 bg-primary bg-gradient bg-opacity-75 text-white p-3">
                    <h4 class="card-title mb-3">Registro</h4>
                    <?php echo $mensaje; ?>
                    <table class="table table-striped table-hover align-middle">
                        <thead class="table-success">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Codigo</th>
                                <th>Peso(Kg)</th>
                                <th>Fecha Registro</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (count($lista_transporte) > 0): ?>
                                <?php foreach ($lista_transporte as $Registro): ?>
                                    <tr>
                                        <td><strong><?php echo $Registro['id']; ?></strong></td>
                                        <td><?php echo htmlspecialchars($Registro['nombre']); ?></td>
                                        <td><?php echo htmlspecialchars($Registro['codigo']); ?></td>
                                        <td><?php echo intval($Registro['peso']); ?></td>
                                        <td><?php echo $Registro['fecha_registro']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5" class="text-center text-muted">No hay camiones registrados aun.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</body>

</html>
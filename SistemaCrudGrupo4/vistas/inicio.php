<?php
$empleado = EmpleadoController::listar();
?>



<div class="container-fluid p-4">
    <h1 class="mb-4 text-success"><i class="bi bi-people-fill"></i> <strong>Lista de Empleados</strong></h1>

    <?php if (isset($_GET['mensaje'])): ?>
        <div class="alert alert-success alert-dismissible fade show">
            <?php echo htmlspecialchars($_GET['mensaje']); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Puesto</th>
                            <th>Salario</th>
                            <th>Fecha Ingreso</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $empleados = EmpleadoController::listar(); ?>
                        <?php if (is_array($empleados) && count($empleados) > 0): ?>
                            <?php foreach ($empleados as $emp): ?>
                                <tr>
                                    <td><strong><?php echo $emp['id']; ?></strong></td>
                                    <td><?php echo htmlspecialchars($emp['nombre']); ?></td>
                                    <td><?php echo htmlspecialchars($emp['puesto']); ?></td>
                                    <td>L. <?php echo number_format($emp['salario'], 2); ?></td>
                                    <td><?php echo $emp['fecha_ingreso']; ?></td>
                                    <td>
                                        <a href="index.php?action=editar&id=<?php echo $emp['id']; ?>"
                                            class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil"></i> Editar
                                        </a>
                                        <a href="index.php?action=eliminar&id=<?php echo $emp['id']; ?>"
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('Seguro que deseas eliminar a <?php echo htmlspecialchars($emp['nombre']); ?>?');">
                                            <i class="bi bi-trash"></i> Eliminar
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center text-muted">
                                    No hay empleados registrados aún.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
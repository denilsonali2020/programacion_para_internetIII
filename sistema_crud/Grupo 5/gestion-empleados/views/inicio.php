<?php
$empleados = EmpleadoController::listar();
?>

<div class="card shadow-sm">
    <div class="card-header">
        <h4 class="mb-0">Empleados registrados</h4>
    </div>
    <div class="card-body">
        <?php if (count($empleados) > 0): ?>
            <table class="table table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Puesto</th>
                        <th>Salario</th>
                        <th>Fecha ingreso</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($empleados as $empleado): ?>
                    <tr>
                        <td><strong><?php echo $empleado['id']; ?></strong></td>
                        <td><?php echo htmlspecialchars($empleado['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($empleado['puesto']); ?></td>
                        <td><?php echo number_format($empleado['salario'], 2); ?></td>
                        <td><?php echo $empleado['fecha_ingreso']; ?></td>
                        <td>
                            <a href="index.php?action=editar&id=<?php echo $empleado['id']; ?>"
                               class="btn btn-sm btn-primary">
                                Editar
                            </a>
                            <a href="index.php?action=eliminar&id=<?php echo $empleado['id']; ?>"
                               class="btn btn-sm btn-danger"
                               onclick="return confirm('¿Seguro que deseas eliminar este empleado?');">
                                Eliminar
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="text-muted mb-0">No hay empleados registrados aún.</p>
        <?php endif; ?>
    </div>
</div>

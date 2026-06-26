<?php 
    $empleados = EmpleadoController::listar();
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>LISTA DE LOS EMPLEADOS</h2>
    <a href="index.php?action=crear" class="btn btn-primary">NUEVO EMPLEADO</a>
</div>
<table class="table table-hover border">
    <thead class="table-success">
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>PUESTO</th>
            <th>SALARIO</th>
            <th>ACCIONES</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($empleados as $e): ?>
            <tr>
                <td><?php echo $e['id']; ?></td>
                <td><?php echo $e['nombre']; ?></td>
                <td><?php echo $e['puesto']; ?></td>
                <td><?php echo number_format($e['salario'],2); ?></td>
                <td>
                    <a href="index.php?action=editar&id=<?php echo $e['id']; ?>" class="btn btn-warning btn-sm">EDITAR</a>
                    <a href="index.php?action=eliminar&id=<?php echo $e['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar?')">ELIMINAR</a>
                </td>
                 
            </tr>
            <?php endforeach; ?>
    </tbody>
</table>
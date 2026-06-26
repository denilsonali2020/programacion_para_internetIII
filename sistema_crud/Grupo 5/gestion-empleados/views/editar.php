<?php
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$empleado = EmpleadoController::obtenerPorId($_GET['id']);
if (!$empleado) {
    header("Location: index.php");
    exit;
}
?>

<div class="card shadow-sm">
    <div class="card-header">
        <h4 class="mb-0">Editar empleado</h4>
    </div>
    <div class="card-body">
        <form action="index.php?action=actualizar" method="post">
            <input type="hidden" name="id" value="<?php echo $empleado['id']; ?>">
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control"
                       value="<?php echo htmlspecialchars($empleado['nombre']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Puesto</label>
                <input type="text" name="puesto" class="form-control"
                       value="<?php echo htmlspecialchars($empleado['puesto']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Salario</label>
                <input type="number" step="0.01" name="salario" class="form-control"
                       value="<?php echo htmlspecialchars($empleado['salario']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>

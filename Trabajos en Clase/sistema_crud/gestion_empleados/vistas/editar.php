<?php
$id = $_GET['id'];
$empleado = EmpleadoController::obtenerPorId($id);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    EmpleadoController::ACTUALIZAR($id, $_POST['nombre'], $_POST['puesto'], $_POST['salario']);
}
?>

<h2>EDITAR DATOS DE EMPLEADO</h2>
<div class="card p-4 shadow-sm mt-3" style="max-width: 600px;">
    <form method="POST">
        <div class="mb-3">
            <label class="form-label">NOMBRE DEL EMPLEADO</label>
            <input type="text" name="nombre" class="form-control" value="<?php echo $empleado['nombre']; ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">PUESTO DE EMPLEADO</label>
            <input type="text" name="puesto" class="form-control" value="<?php echo $empleado['puesto']; ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">SALARIO</label>
            <input type="number" step="0.01" name="salario" class="form-control" value="<?php echo $empleado['salario']; ?>" required>
        </div>
        
        <button type="submit" class="btn btn-warning">ACTUALIZAR</button>
        <a href="index.php" class="btn btn-secondary">CANCELAR</a>
    </form>
</div>
<div class="card shadow-sm">
    <div class="card-header">
        <h4 class="mb-0">Registrar nuevo empleado</h4>
    </div>
    <div class="card-body">
        <form action="index.php?action=guardar" method="post">
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Puesto</label>
                <input type="text" name="puesto" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Salario</label>
                <input type="number" step="0.01" name="salario" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>

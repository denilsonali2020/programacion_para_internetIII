<?php
require_once '../../config/conexion.php';
$pdo = (new Conexion())->getConexion();

// Cargar categorías para el <select>
$stmtCat = $pdo->prepare("SELECT id, nombre_categoria FROM categorias_repuesto");
$stmtCat->execute();
$categorias = $stmtCat->fetchAll(PDO::FETCH_ASSOC);

// Si viene id por GET, es edición
$id = $_GET['id'] ?? null;
$repuesto = null;

if ($id) {
    $stmt = $pdo->prepare("SELECT * FROM repuestos WHERE id = :id");
    $stmt->execute([':id' => $id]);
    $repuesto = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title><?php echo $id ? 'Editar repuesto' : 'Nuevo repuesto'; ?></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
  <h1><?php echo $id ? 'Editar repuesto' : 'Registrar repuesto'; ?></h1>

  <form method="POST" action="../../controllers/repuestosController.php">
    <input type="hidden" name="action" value="<?php echo $id ? 'update' : 'create'; ?>">
    <?php if ($id): ?>
      <input type="hidden" name="id" value="<?php echo $repuesto['id']; ?>">
    <?php endif; ?>

    <div class="mb-3">
      <label>Código de pieza</label>
      <input type="text" name="codigo_pieza" class="form-control"
             value="<?php echo htmlspecialchars($repuesto['codigo_pieza'] ?? ''); ?>" required>
    </div>

    <div class="mb-3">
      <label>Nombre</label>
      <input type="text" name="nombre" class="form-control"
             value="<?php echo htmlspecialchars($repuesto['nombre'] ?? ''); ?>" required>
    </div>

    <div class="mb-3">
      <label>Categoría</label>
      <select name="id_categoria" class="form-select" required>
        <option value="">Seleccione...</option>
        <?php foreach ($categorias as $c): ?>
          <option value="<?php echo $c['id']; ?>"
            <?php echo (isset($repuesto['id_categoria']) && $repuesto['id_categoria'] == $c['id']) ? 'selected' : ''; ?>>
            <?php echo htmlspecialchars($c['nombre_categoria']); ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="mb-3">
      <label>Stock</label>
      <input type="number" name="stock" class="form-control"
             value="<?php echo (int)($repuesto['stock'] ?? 0); ?>" min="0" required>
    </div>

    <div class="mb-3">
      <label>Precio</label>
      <input type="number" step="0.01" name="precio" class="form-control"
             value="<?php echo $repuesto['precio'] ?? ''; ?>" min="0" required>
    </div>

    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="index.php" class="btn btn-secondary">Volver</a>
  </form>
</div>
</body>
</html>

<?php
require_once '../../config/conexion.php';
$pdo = (new Conexion())->getConexion();

// Traer solo activos (borrado lógico)
$sql = "SELECT r.id, r.codigo_pieza, r.nombre, r.stock, r.precio,
               c.nombre_categoria
        FROM repuestos r
        INNER JOIN categorias_repuesto c ON r.id_categoria = c.id
        WHERE r.estado_activo = 1";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$repuestos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Repuestos - Taller</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">

  <?php if (isset($_GET['msg'])): ?>
    <div class="alert alert-<?php echo $_GET['type'] ?? 'info'; ?>">
      <?php echo htmlspecialchars($_GET['msg']); ?>
    </div>
  <?php endif; ?>

  <h1>Repuestos disponibles</h1>

  <a href="form.php" class="btn btn-primary mb-3">Registrar repuesto</a>

  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Código</th>
        <th>Nombre</th>
        <th>Categoría</th>
        <th>Stock</th>
        <th>Precio</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($repuestos as $r): ?>
        <?php
          // Reto: si stock < 5 → table-warning
          $rowClass = ($r['stock'] < 5) ? 'table-warning' : '';
        ?>
        <tr class="<?php echo $rowClass; ?>">
          <td><?php echo htmlspecialchars($r['codigo_pieza']); ?></td>
          <td><?php echo htmlspecialchars($r['nombre']); ?></td>
          <td><?php echo htmlspecialchars($r['nombre_categoria']); ?></td>
          <td><?php echo (int)$r['stock']; ?></td>
          <td><?php echo number_format($r['precio'], 2); ?></td>
          <td>
            <a href="form.php?id=<?php echo $r['id']; ?>" class="btn btn-sm btn-secondary">Editar</a>

            <!-- Soft delete -->
            <a href="../../controllers/repuestosController.php?action=soft_delete&id=<?php echo $r['id']; ?>"
               class="btn btn-sm btn-warning">
               Desactivar
            </a>

            <!-- Hard delete (solo si stock = 0, se valida en el controlador) -->
            <a href="../../controllers/repuestosController.php?action=hard_delete&id=<?php echo $r['id']; ?>"
               class="btn btn-sm btn-danger"
               onclick="return confirm('¿Eliminar definitivamente? Solo si stock = 0');">
               Eliminar
            </a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
</body>
</html>

<?php
require_once '../config/conexion.php';
$pdo = (new Conexion())->getConexion();

$action = $_POST['action'] ?? $_GET['action'] ?? null;

function redirect($msg, $type = 'success') {
    header("Location: ../views/repuestos/indexlista.php?msg=" . urlencode($msg) . "&type=" . $type);
    exit;
}

if ($action === 'create' || $action === 'update') {
    // VALIDACIÓN ESTRICTA
    $id = $_POST['id'] ?? null;
    $codigo_pieza = trim($_POST['codigo_pieza'] ?? '');
    $nombre = trim($_POST['nombre'] ?? '');
    $id_categoria = $_POST['id_categoria'] ?? '';
    $stock = $_POST['stock'] ?? '';
    $precio = $_POST['precio'] ?? '';

    // No permitir vacíos
    if ($codigo_pieza === '' || $nombre === '' || $id_categoria === '' || $stock === '' || $precio === '') {
        redirect("Campos obligatorios vacíos", "danger");
    }

    // Validar tipos de datos
    if (!filter_var($id_categoria, FILTER_VALIDATE_INT) ||
        !filter_var($stock, FILTER_VALIDATE_INT) ||
        !filter_var($precio, FILTER_VALIDATE_FLOAT)) {
        redirect("Tipos de datos inválidos", "danger");
    }

    if ($action === 'create') {
        $sql = "INSERT INTO repuestos (codigo_pieza, nombre, id_categoria, stock, precio)
                VALUES (:codigo_pieza, :nombre, :id_categoria, :stock, :precio)";
    } else {
        $sql = "UPDATE repuestos
                SET codigo_pieza = :codigo_pieza,
                    nombre = :nombre,
                    id_categoria = :id_categoria,
                    stock = :stock,
                    precio = :precio
                WHERE id = :id";
    }

    $stmt = $pdo->prepare($sql);
    $params = [
        ':codigo_pieza' => $codigo_pieza,
        ':nombre' => $nombre,
        ':id_categoria' => (int)$id_categoria,
        ':stock' => (int)$stock,
        ':precio' => (float)$precio
    ];
    if ($action === 'update') {
        $params[':id'] = (int)$id;
    }

    $stmt->execute($params);
    redirect($action === 'create' ? "Repuesto creado correctamente" : "Repuesto actualizado correctamente");

} elseif ($action === 'soft_delete') {
    // BORRADO LÓGICO: estado_activo = 0
    $id = $_GET['id'] ?? null;
    if (!filter_var($id, FILTER_VALIDATE_INT)) {
        redirect("ID inválido", "danger");
    }

    $stmt = $pdo->prepare("UPDATE repuestos SET estado_activo = 0 WHERE id = :id");
    $stmt->execute([':id' => (int)$id]);
    redirect("Repuesto desactivado (borrado lógico)");

} elseif ($action === 'hard_delete') {
    // BORRADO FÍSICO: solo si stock = 0
    $id = $_GET['id'] ?? null;
    if (!filter_var($id, FILTER_VALIDATE_INT)) {
        redirect("ID inválido", "danger");
    }

    // Verificar stock
    $stmt = $pdo->prepare("SELECT stock FROM repuestos WHERE id = :id");
    $stmt->execute([':id' => (int)$id]);
    $rep = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$rep) {
        redirect("Repuesto no encontrado", "danger");
    }

    if ((int)$rep['stock'] > 0) {
        redirect("No se puede borrar físicamente: stock debe ser 0", "danger");
    }

    $stmtDel = $pdo->prepare("DELETE FROM repuestos WHERE id = :id");
    $stmtDel->execute([':id' => (int)$id]);
    redirect("Repuesto eliminado físicamente (hard delete)");
} else {
    redirect("Acción no válida", "danger");
}

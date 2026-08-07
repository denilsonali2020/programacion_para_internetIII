<?php
require "includes/session.php";
require "config/db.php";

include "includes/header.php";

$id_ticket = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id_ticket > 0) {
    $sql = "SELECT t.*, u.nombre, u.email FROM tickets t INNER JOIN usuarios u ON u.id = t.id_usuario WHERE t.id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_ticket);
    $stmt->execute();
    $ticket = $stmt->get_result()->fetch_assoc();
    $stmt->close();

    if ($ticket && $_SESSION['rol'] !== 'tecnico' && $ticket['id_usuario'] != $_SESSION['id_usuario']) {
        $ticket = null;
    }
}
?>

<?php if (isset($ticket) && $ticket) { ?>
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <strong>Detalle del Ticket #<?php echo $ticket['id']; ?></strong>
        <a href="tickets.php" class="btn btn-outline-secondary btn-sm">
            <i class="fa-solid fa-arrow-left"></i>
            Regresar
        </a>
    </div>
    <div class="card-body">
        <div class="row">
            <?php
                $clasePrioridad = $ticket['prioridad'] === 'Alta' ? 'bg-danger' : ($ticket['prioridad'] === 'Media' ? 'bg-warning text-dark' : 'bg-success');
                $claseEstado = $ticket['estado'] === 'Pendiente' ? 'bg-warning text-dark' : ($ticket['estado'] === 'En Proceso' ? 'bg-info text-white' : 'bg-success');
            ?>
            <div class="col-md-6 mb-3">
                <strong>Título:</strong> <?php echo $ticket['titulo']; ?><br>
                <strong>Solicitante:</strong> <?php echo $ticket['nombre']; ?><br>
                <strong>Email:</strong> <?php echo $ticket['email']; ?><br>
                <strong>Departamento:</strong> <?php echo $ticket['departamento']; ?><br>
                <strong>Prioridad:</strong> <span class="badge <?php echo $clasePrioridad; ?>"><?php echo $ticket['prioridad']; ?></span>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Estado Actual:</strong> <span class="badge <?php echo $claseEstado; ?>"><?php echo $ticket['estado']; ?></span><br>
                <strong>Fecha:</strong> <?php echo date('d/m/Y H:i', strtotime($ticket['fecha_creacion'])); ?><br>
                <strong>Descripción:</strong><br>
                <p class="mt-2"><?php echo nl2br($ticket['descripcion']); ?></p>
            </div>
        </div>

        <?php if ($_SESSION['rol'] === 'tecnico') { ?>
        <form action="controllers/actualizarEstado.php" method="POST" class="mt-4">
            <input type="hidden" name="id_ticket" value="<?php echo $ticket['id']; ?>">
            <label class="form-label">Cambiar Estado</label>
            <select name="estado" class="form-select w-50" required>
                <option value="Pendiente" <?php echo $ticket['estado'] === 'Pendiente' ? 'selected' : ''; ?>>Pendiente</option>
                <option value="En Proceso" <?php echo $ticket['estado'] === 'En Proceso' ? 'selected' : ''; ?>>En Proceso</option>
                <option value="Resuelto" <?php echo $ticket['estado'] === 'Resuelto' ? 'selected' : ''; ?>>Resuelto</option>
            </select>
            <button type="submit" class="btn btn-success mt-3">
                <i class="fa-solid fa-floppy-disk"></i>
                Actualizar Estado
            </button>
        </form>
        <?php } ?>
    </div>
</div>
<?php } else { ?>
<div class="alert alert-danger">No se encontró el ticket.</div>
<?php } ?>

<?php include "includes/footer.php"; ?>

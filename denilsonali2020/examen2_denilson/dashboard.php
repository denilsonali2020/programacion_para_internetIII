<?php
require "includes/session.php";
require "config/db.php";

include "includes/header.php";

// dashboard

$sql_tickets = "SELECT COUNT(*) total FROM tickets";
if ($_SESSION['rol'] !== 'tecnico') {
    $sql_tickets = "SELECT COUNT(*) total FROM tickets WHERE id_usuario = " . (int)$_SESSION['id_usuario'];
}
$total_tickets = $conn->query($sql_tickets)->fetch_assoc()['total'];

$sql_pendientes = "SELECT COUNT(*) total FROM tickets WHERE estado = 'Pendiente'";
if ($_SESSION['rol'] !== 'tecnico') {
    $sql_pendientes = "SELECT COUNT(*) total FROM tickets WHERE estado = 'Pendiente' AND id_usuario = " . (int)$_SESSION['id_usuario'];
}
$total_pendientes = $conn->query($sql_pendientes)->fetch_assoc()['total'];

$sql_proceso = "SELECT COUNT(*) total FROM tickets WHERE estado = 'En Proceso'";
if ($_SESSION['rol'] !== 'tecnico') {
    $sql_proceso = "SELECT COUNT(*) total FROM tickets WHERE estado = 'En Proceso' AND id_usuario = " . (int)$_SESSION['id_usuario'];
}
$total_proceso = $conn->query($sql_proceso)->fetch_assoc()['total'];

$sql_resueltos = "SELECT COUNT(*) total FROM tickets WHERE estado = 'Resuelto'";
if ($_SESSION['rol'] !== 'tecnico') {
    $sql_resueltos = "SELECT COUNT(*) total FROM tickets WHERE estado = 'Resuelto' AND id_usuario = " . (int)$_SESSION['id_usuario'];
}
$total_resueltos = $conn->query($sql_resueltos)->fetch_assoc()['total'];

$sql_ultimos = "SELECT t.id, t.titulo, t.prioridad, t.estado, t.fecha_creacion, u.nombre
                FROM tickets t
                INNER JOIN usuarios u ON u.id = t.id_usuario
                ORDER BY t.id DESC
                LIMIT 8";
$ultimos_tickets = $conn->query($sql_ultimos);
?>

<div class="row">
    <div class="col-lg-3 col-md-6 mb-3">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted">Total Tickets</h6>
                        <h3><?php echo $total_tickets; ?></h3>
                    </div>
                    <i class="fa-solid fa-ticket fa-2x opacity-25 text-primary"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-3">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted">Pendientes</h6>
                        <h3><?php echo $total_pendientes; ?></h3>
                    </div>
                    <i class="fa-solid fa-hourglass-half fa-2x opacity-25 text-warning"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-3">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted">En Proceso</h6>
                        <h3><?php echo $total_proceso; ?></h3>
                    </div>
                    <i class="fa-solid fa-spinner fa-2x opacity-25 text-info"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-3">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted">Resueltos</h6>
                        <h3><?php echo $total_resueltos; ?></h3>
                    </div>
                    <i class="fa-solid fa-circle-check fa-2x opacity-25 text-success"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <strong>Últimos Tickets Registrados</strong>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Título</th>
                    <th>Solicitante</th>
                    <th>Prioridad</th>
                    <th>Estado</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($ultimos_tickets->num_rows > 0) { ?>
                    <?php while ($row = $ultimos_tickets->fetch_assoc()) { ?>
                        <?php
                            $clasePrioridad = $row['prioridad'] === 'Alta' ? 'bg-danger' : ($row['prioridad'] === 'Media' ? 'bg-warning text-dark' : 'bg-success');
                            $claseEstado = $row['estado'] === 'Pendiente' ? 'bg-warning text-dark' : ($row['estado'] === 'En Proceso' ? 'bg-info text-white' : 'bg-success');
                        ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['titulo']; ?></td>
                            <td><?php echo $row['nombre']; ?></td>
                            <td>
                                <span class="badge <?php echo $clasePrioridad; ?>">
                                    <?php echo $row['prioridad']; ?>
                                </span>
                            </td>
                            <td>
                                <span class="badge <?php echo $claseEstado; ?>">
                                    <?php echo $row['estado']; ?>
                                </span>
                            </td>
                            <td><?php echo date('d/m/Y H:i', strtotime($row['fecha_creacion'])); ?></td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="6" class="text-center">No hay tickets registrados.</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include "includes/footer.php"; ?>
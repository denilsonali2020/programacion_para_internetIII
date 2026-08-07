<?php
require "includes/session.php";
require "config/db.php";

include "includes/header.php";

// listado de ticekts

$sql = "SELECT t.id, t.titulo, t.descripcion, t.prioridad, t.estado, t.fecha_creacion, u.nombre
        FROM tickets t
        INNER JOIN usuarios u ON u.id = t.id_usuario";

if ($_SESSION['rol'] !== 'tecnico') {
    $sql .= " WHERE t.id_usuario = ?";
}

$sql .= " ORDER BY t.id DESC";

$stmt = $conn->prepare($sql);

if ($_SESSION['rol'] !== 'tecnico') {
    $stmt->bind_param("i", $_SESSION['id_usuario']);
}

$stmt->execute();
$resultado = $stmt->get_result();
$stmt->close();
?>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <strong>Listado de Tickets</strong>
        <?php if ($_SESSION['rol'] !== 'tecnico') { ?>
            <a href="nuevoTicket.php" class="btn btn-primary btn-sm">
                <i class="fa-solid fa-plus"></i>
                Nuevo Ticket
            </a>
        <?php } ?>
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
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($resultado->num_rows > 0) { ?>
                    <?php while ($row = $resultado->fetch_assoc()) { ?>
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
                            
                            <td><?php echo date('d/m/Y', strtotime($row['fecha_creacion'])); ?></td>
                            <td>
                                <?php if ($_SESSION['rol'] === 'tecnico') { ?>
                                    <a href="verTicket.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-outline-primary">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                <?php } else { ?>
                                    <a href="verTicket.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-outline-primary">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="7" class="text-center">No hay tickets registrados.</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include "includes/footer.php"; ?>
<?php
session_start();
require "../config/db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_ticket = $_POST['id_ticket'] ?? 0;
    $estado = trim($_POST['estado'] ?? '');

    if ($id_ticket > 0 && !empty($estado)) {
        $sql = "UPDATE tickets SET estado = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $estado, $id_ticket);

        if ($stmt->execute()) {
            $_SESSION['mensaje'] = "Estado actualizado correctamente";
            $_SESSION['tipo'] = "success";
        } else {
            $_SESSION['mensaje'] = "No se pudo actualizar el estado";
            $_SESSION['tipo'] = "danger";
        }
    }
}

header("Location: ../tickets.php");
exit;

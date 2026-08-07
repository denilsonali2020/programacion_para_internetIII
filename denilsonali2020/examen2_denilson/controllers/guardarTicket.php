<?php
session_start();
require "../config/db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = trim($_POST['titulo'] ?? '');
    $descripcion = trim($_POST['descripcion'] ?? '');
    $prioridad = trim($_POST['prioridad'] ?? '');
    $departamento = trim($_POST['departamento'] ?? '');
    $estado = 'Pendiente';

    if (empty($titulo) || empty($descripcion) || empty($prioridad) || empty($departamento)) {
        $_SESSION['mensaje'] = "Todos los campos son obligatorios";
        $_SESSION['tipo'] = "danger";
        header("Location: ../nuevoTicket.php");
        exit;
    }

    $sql = "INSERT INTO tickets (id_usuario, titulo, descripcion, prioridad, estado, departamento, fecha_creacion)
            VALUES (?, ?, ?, ?, ?, ?, NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isssss", $_SESSION['id_usuario'], $titulo, $descripcion, $prioridad, $estado, $departamento);

    if ($stmt->execute()) {
        $_SESSION['mensaje'] = "Ticket registrado correctamente";
        $_SESSION['tipo'] = "success";
        header("Location: ../tickets.php");
        exit;
    } else {
        $_SESSION['mensaje'] = "No se pudo guardar el ticket";
        $_SESSION['tipo'] = "danger";
        header("Location: ../nuevoTicket.php");
        exit;
    }
}

header("Location: ../nuevoTicket.php");
exit;

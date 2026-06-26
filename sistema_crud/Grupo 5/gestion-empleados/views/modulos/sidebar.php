<?php
$accion = isset($_GET['action']) ? $_GET['action'] : 'inicio';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Empleados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container-fluid">
    <div class="row">
        <aside class="col-md-3 col-lg-2 bg-dark text-white min-vh-100 p-3">
            <h4 class="mb-4">TechSolutions</h4>
            <nav class="nav flex-column">
                <a href="index.php"
                   class="nav-link text-white <?php echo $accion === 'inicio' ? 'fw-bold' : ''; ?>">
                    Lista de empleados
                </a>
                <a href="index.php?action=crear"
                   class="nav-link text-white <?php echo $accion === 'crear' ? 'fw-bold' : ''; ?>">
                    Registrar empleado
                </a>
            </nav>
        </aside>
        <main class="col-md-9 col-lg-10 p-4">

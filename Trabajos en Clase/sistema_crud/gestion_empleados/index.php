<?php
    //Requerimos el controlador para que este disponible en todo el flujo
    require_once "controladores/EmpleadoController.php";
    //Capturamos la accion actual por la URL (Por defecto carga ' inicio')
    $action = isset($_GET['action']) ? $_GET['action'] : 'inicio';

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechSolutions Sistema de Control de Empleados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex">
        <!-- INCLUIMOS EL SIDEBAR INDEPENDIENTE EL QUE ESTA EN vistas/modulos/sidebar.php-->
        <?php 
            include "vistas/modulos/sidebar.php";
        ?>
        <?php 
            switch ($action){
                case 'crear':
                    include "vistas/crear.php";
                    break;
                case 'editar':
                    include "vistas/editar.php";
                    break;
                case 'eliminar':
                    if (isset($_GET['id'])){
                        EmpleadoController::ELIMINAR($_GET['id']);
                    }
                    break;
                default:
                include "vistas/inicio.php";
                break;
            }
        
        ?>

        <?php
        // TRAEMOS EL FOOTER INDEPENDIENTE EL CUAL ESTA EN LA CARPETA vistas/modulos/footer.php

            include "vistas/modulos/footer.php";

        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
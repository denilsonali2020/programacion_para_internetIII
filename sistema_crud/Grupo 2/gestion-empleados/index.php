<?php
    require_once "config/conexion.php";
    require_once "controladores/EmpleadoController.php";
    $action = isset($_GET['action']) ? $_GET['action'] : 'inicio';
?>

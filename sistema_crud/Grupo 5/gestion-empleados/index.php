<?php
require_once __DIR__ . '/controllers/EmpleadoController.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'inicio';

// Cargar el sidebar
require_once __DIR__ . '/views/modulos/sidebar.php';

switch ($action) {

    case 'inicio':
        require_once __DIR__ . '/views/inicio.php';
        break;

    case 'crear':
        require_once __DIR__ . '/views/crear.php';
        break;

    case 'guardar':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre  = trim($_POST['nombre']);
            $puesto  = trim($_POST['puesto']);
            $salario = trim($_POST['salario']);
            EmpleadoController::guardar($nombre, $puesto, $salario);
        }
        break;

    case 'editar':
        require_once __DIR__ . '/views/editar.php';
        break;

    case 'actualizar':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id      = (int) $_POST['id'];
            $nombre  = trim($_POST['nombre']);
            $puesto  = trim($_POST['puesto']);
            $salario = trim($_POST['salario']);
            EmpleadoController::actualizar($id, $nombre, $puesto, $salario);
        }
        break;

    case 'eliminar':
        if (isset($_GET['id'])) {
            $id = (int) $_GET['id'];
            EmpleadoController::eliminar($id);
        }
        break;

    default:
        require_once __DIR__ . '/views/inicio.php';
        break;
}

// Cargar el footer
require_once __DIR__ . '/views/modulos/footer.php';

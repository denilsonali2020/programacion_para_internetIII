<?php

session_start();
require "../config/db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = trim($_POST['usuario'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (empty($usuario) || empty($password)) {
        $_SESSION['mensaje'] = "Por favor, complete todos los campos";
        $_SESSION['tipo'] = "danger";

        header("Location: ../login.php");
        exit;
    }

    $query = "SELECT id, nombre, email, password, rol FROM usuarios WHERE email = ? LIMIT 1";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $datos_usuario = $resultado->fetch_assoc();

        if (password_verify($password, $datos_usuario['password'])) {
            session_regenerate_id(true);
            $_SESSION['id_usuario'] = $datos_usuario['id'];
            $_SESSION['nombre'] = $datos_usuario['nombre'];
            $_SESSION['email'] = $datos_usuario['email'];
            $_SESSION['rol'] = $datos_usuario['rol'];
            $_SESSION['nombre_rol'] = $datos_usuario['rol'] === 'tecnico' ? 'Técnico' : 'Usuario';
            $_SESSION['logueado'] = true;

            header("Location: ../dashboard.php");
            exit;
        } else {
            $_SESSION['mensaje'] = "Usuario o clave incorrectos";
            $_SESSION['tipo'] = "danger";

            header("Location: ../login.php");
            exit;
        }
    } else {
        $_SESSION['mensaje'] = "Usuario o clave incorrectos";
        $_SESSION['tipo'] = "danger";

        header("Location: ../login.php");
        exit;
    }

    $stmt->close();
} else {
    header("Location: ../login.php");
    exit;
}

$conn->close();

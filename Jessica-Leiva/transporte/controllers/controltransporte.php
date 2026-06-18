<?php

require_once '../config/conexion.php';

$mensaje = "";
$lista_transporte = [];

if (isset($_POST['btn_registrar'])) {

    $nombre = trim($_POST['nombre']);
    $codigo = trim($_POST['codigo']);
    $peso = trim($_POST['peso']);

    if (!empty($nombre) && !empty($codigo) && !empty($peso)) {

        if ($peso > 5000) {

            $mensaje = "<div class='alert alert-danger'> Registro rechazado: El camión supera el límite permitido de 5000 kg.</div>";
        } else {

            try {

                $sql = "INSERT INTO Registro (nombre, codigo, peso)
                VALUES (:nombre, :codigo, :peso)";

                $stmt = $conexion->prepare($sql);
                $stmt->bindParam(':nombre', $nombre);
                $stmt->bindParam(':codigo', $codigo);
                $stmt->bindParam(':peso', $peso);

                $stmt->execute();

                $mensaje = "<div class='alert alert-success'> Registro ingresado con éxito.</div>";
            } catch (PDOException $e) {

                $mensaje = "<div class='alert alert-dark'> Error al guardar: {$e->getMessage()} </div>";
            }
        }
    } else {

        $mensaje = "<div> Por favor llene todos los campos.</div>";
    }
}

try {

    $sql_leer = "SELECT * FROM Registro ORDER BY id DESC";
    $stmt_leer = $conexion->prepare($sql_leer);
    $stmt_leer->execute();

    $lista_transporte = $stmt_leer->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {

    $mensaje .= "<div class='alert alert-dark'>Error al cargar registros: {$e->getMessage()}</div>";
}

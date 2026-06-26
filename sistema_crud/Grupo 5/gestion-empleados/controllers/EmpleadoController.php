<?php
require_once __DIR__ . '/../config/conexion.php';

class EmpleadoController
{
    public static function listar()
    {
        global $conexion;
        $sql = "SELECT * FROM empleados ORDER BY id DESC";
        $stmt = $conexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function guardar($nombre, $puesto, $salario)
    {
        global $conexion;
        $sql = "INSERT INTO empleados (nombre, puesto, salario)
                VALUES (:nombre, :puesto, :salario)";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':puesto', $puesto);
        $stmt->bindParam(':salario', $salario);
        $stmt->execute();
        header("Location: index.php");
        exit;
    }

    public static function obtenerPorId($id)
    {
        global $conexion;
        $sql = "SELECT * FROM empleados WHERE id = :id";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function actualizar($id, $nombre, $puesto, $salario)
    {
        global $conexion;
        $sql = "UPDATE empleados
                SET nombre = :nombre, puesto = :puesto, salario = :salario
                WHERE id = :id";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':puesto', $puesto);
        $stmt->bindParam(':salario', $salario);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        header("Location: index.php");
        exit;
    }

    public static function eliminar($id)
    {
        global $conexion;
        $sql = "DELETE FROM empleados WHERE id = :id";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        header("Location: index.php");
        exit;
    }
}

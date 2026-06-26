<?php
require_once "config/conexion.php";


class EmpleadoController {
    //ENLISTAREMOS LOS EMPLEADOS
    public static function listar(){
        global $conexion;
        $stmt = $conexion->prepare("SELECT * FROM empleados ORDER BY id DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //REGISTRAREMOS LOS EMPLEADOS
    public static function GUARDAR($nombre, $puesto, $salario){
        global $conexion;
        $stmt = $conexion->prepare("INSERT INTO empleados (nombre, puesto, salario) VALUES (:nombre, :puesto, :salario)");
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":puesto", $puesto);
        $stmt->bindParam(":salario", $salario);
        if($stmt->execute()){
            header("Location: index.php?msg=Empleado guardado con éxito");
        }
    }
    //OBTENDREMOS LOS EMPLEADOS POR MEDIO DE ID
    public static function obtenerPorId($id){
        global $conexion;
        $stmt = $conexion->prepare("SELECT * FROM empleados WHERE id = :id");
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //METODO PARA ACTUALIZAR LOS DATOS DE LOS EMPLEADOS
    public static function ACTUALIZAR($id,$nombre, $puesto, $salario){
        global $conexion;
         $stmt = $conexion->prepare("UPDATE empleados SET nombre = :nombre, puesto = :puesto, salario = :salario WHERE id = :id");
        $stmt->bindParam(":id",$id);
        $stmt->bindParam(":nombre",$nombre);
        $stmt->bindParam(":puesto",$puesto);
        $stmt->bindParam(":salario",$salario);
        if($stmt->execute()){
            header("Location: index.php?msg=Empleado actualizado con éxito");
        }
    }
    //METODO PARA ELIMINAR UN EMPLEADO
    public static function ELIMINAR($id){
        global $conexion;
        $stmt = $conexion->prepare("DELETE FROM empleados WHERE id = :id");
        $stmt->bindParam(":id",$id);
        if($stmt->execute()){
            header("Location: index.php?msg=Empleado eliminado con éxito");
        }
    }
}
?>

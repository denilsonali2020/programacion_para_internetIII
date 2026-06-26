<?php
class Conexion {
    private $pdo;

    public function __construct() {
        $dsn = "mysql:host=localhost;dbname=taller_repuestos;charset=utf8mb4";
        $usuario = "root"; // 
        $clave = "";       // 

        try {
            $this->pdo = new PDO($dsn, $usuario, $clave);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }

    public function getConexion() {
        return $this->pdo;
    }
}

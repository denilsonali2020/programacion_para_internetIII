<?php

$nombreProducto = "Laptop HP";
$precio = 15000;
$cantidadInventario = 20;
$disponibilidad = true;

$estado = $disponibilidad ? "Disponible" : "No disponible";

echo "<h2>Modulo de Inventarios para una Tienda de Tecnología</h2>";

echo "<ol>
    <li>Nombre del producto: $nombreProducto</li>
    <li>Precio: L. $precio</li>
    <li>Cantidad en inventario: $cantidadInventario</li>
    <li>Disponibilidad: $estado</li>
</ol>";
?>
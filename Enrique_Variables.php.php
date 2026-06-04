<?php
    $nombre = "Burger Clásica";
    $precio = 150.00;
    $cantidad = 25;
    $disponible = true;
?>

<h3>Detalle del Producto:</h3>
<ol>
    <li>Nombre: <?php echo $nombre; ?></li>
    <li>Precio: $<?php echo $precio; ?></li>
    <li>Cantidad: <?php echo $cantidad; ?></li>
    <li>Disponible: <?php echo $disponible ? "Sí" : "No"; ?></li>
</ol>

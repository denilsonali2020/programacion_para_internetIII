<?php

$Producto = "XP PEN Artist 15.6 Pro";
$Precio = 8800;
$Cantidad = 1;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de productos</title>
</head>
<body>

<h1>Listado de productos</h1>
    <ul>
        <li><strong>Producto:</strong> <?php echo $Producto; ?></li>
        <li><strong>Precio:</strong> <?php echo $Precio; ?></li>
        <li><strong>Cantidad:</strong> <?php echo $Cantidad; ?></li>
    </ul>
</body>
</html>

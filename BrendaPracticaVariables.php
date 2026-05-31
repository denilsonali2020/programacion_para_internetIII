<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aprendiendo variables en php</title>
</head>
<body>
    <h1>Detalle del Producto</h1>
<?php
$nombreProducto = "Iphone 15 Pro";

$precio = "20,000";

$disponibilidad ="10 Unidades";

?>

<ol>
<li><p><strong>Producto: </strong><?php echo $nombreProducto?></p></li>
<li><p><strong>Precio: </strong><?php echo $precio?></p></li>
<li><p><strong>Disponibilidad: </strong><?php echo $disponibilidad; ?></p> </li>

</ol>
</body>
</html>
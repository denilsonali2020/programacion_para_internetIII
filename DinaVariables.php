<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variables en PHP</title>
</head>
<body>
  <h1>Variables en PHP</h1>
  <h2>Ejemplo de variables para la clase Programacion de Internet III</h2>  

<?php
$nombre = "martillo";
$precio = 220;
$disponibilidad = 5;
?>

  <ol>
      <li>El producto es: <?php echo "$nombre"; ?></li>
      <li>El precio es: <?php echo "$precio"; ?></li>
      <li>Disponibilidad: <?php echo "$disponibilidad"; ?></li>
  </ol>

</body>
</html>

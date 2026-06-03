<!-- REALIZADO POR THAMY PACHECO - 121350040-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJERCICIO PRÁTICO DE VARIABLES</title>
</head>
<body>

    <?php 
    $NOMBRE_PRODUCTO="TABLET S11 ULTRA SAMSUNG";
    $PRECIO=38599;
    $CANTIDAD_EN_INVENTARIO=10;
    $DISPONIBILIDAD=true;
    ?>


<h2 style="text-align:center; color:blue;"> INVENTARIO DE PRODUCTO TECNOLÓGICO.</h2>    

<h3>DATOS DEL PRODUCTO</h3>

<ol>
<li><strong>NOMBRE DEL PRODUCTO: </strong><?php echo $NOMBRE_PRODUCTO; ?>  </li>
<li><strong>PRECIO DEL PRODUCTO: </strong> <?php echo $PRECIO; ?></li>
<li><strong>CANTIDAD EN INVETARIO: </strong> <?php echo $CANTIDAD_EN_INVENTARIO; ?></li>
<li><strong>DISPONIBILIDAD DEL PRODUCTO: </strong> <?php echo $DISPONIBILIDAD? 'SI' : 'NO';?></li>
</ol>

</body>
</html>
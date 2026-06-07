
<!-- "Sistema de Control de Envíos"
Instrucciones para el estudiante:
Una empresa de logística necesita una herramienta web interna para que los operarios registren la salida de los camiones de carga. Debes crear un archivo llamado transporte.php que contenga un formulario y su respectivo procesamiento backend.

El formulario debe solicitar 3 datos obligatorios:
Nombre del Conductor (Texto)
Código de la Maquinaria/Camión (Texto, ej: CAM-01)
Peso de la carga en Kilogramos (Número entero)
. -->

<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Control de Envíos</title>
</head>
<body>

    <style>
        body{
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            margin: 30px ;
        }
        
    </style>

<h1>Sistema de Control de Envíos</h1>

    <form action="transporte.php" method="post"> 
        <label><strong>Nombre del Conductor</strong></label>
        <input type="text" name="nombre" >

        <hr>

        <label><strong>Código de la Maquinaria</strong></label>
        <input type="text" name="codigo" >
        <hr>
        <label><strong> Peso (kg): </strong></label>
        <input type="number" name="peso">
        <hr>

        <button type="submit"> Registrar Salida</button>

    </form>

    <?php 
       


    if ($_POST) {

        $nombre = $_POST['nombre'];
        $codigo = $_POST['codigo'];
        $peso = $_POST['peso'];

        if ($peso > 5000) {
            $mensaje = "Alerta: El camión requiere un pago de impuesto por sobrepeso";
            $color = "red";
        } else {
            $mensaje = "Tránsito autorizado: Peso dentro del límite legal";
            $color = "green";
        }

    ?>
  
    <h2 style="color: <?php echo $color; ?>">
        <?php echo $mensaje; ?>
    </h2>

    <h3>Datos de el Conductor</h3>

    <ul>
        <li>
            <strong>Nombre:</strong>
            <?php echo $nombre; ?>
        </li>
            <li><strong> Código</strong>
            <span><?php echo $codigo; ?></span>
        </li>

        <li>
            <strong>Peso:</strong>
            <?php echo number_format($peso); ?> kg
        </li>
    </ul>
<?php 
    }
 ?>

</body>
</html>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    .aprovado {
        color: green;
    }

    .rechazado {
        color: red;
    }
</style>


<body>
    <h1>Sistema de Control de Envíos</h1>

    <form action="transporte.php" method="post">
        <label>Nombre del Conductor:</label>
        <input type="text" name="txtConductor">
        <label>Código de la Maquinaria/Camión:</label>
        <input type="text" name="txtCodigo">
        <label>Peso de la carga en Kilogramos:</label>
        <input type="text" name="txtPeso">
        <button type="submit">Registrar Salida</button>
    </form>
            <?php


        if ($_POST){

            $nombreConductor = $_POST['txtConductor'];

            $codigoMaquinaria = $_POST['txtCodigo'];

            $pesoCarga = $_POST['txtPeso'];

            $mensaje = '';


            if ($pesoCarga > 5000) {
                $mensaje = "Alerta: El camión requiere un pago de impuesto por sobrepeso";
                $alerta = "rechazado";
            } else {
                $mensaje = "Tránsito autorizado: Peso dentro del límite legal";
                $alerta = "aprovado";
            }
            ?>

    <ul>
        <li>Nombre del Conductor: <strong><?php echo $nombreConductor ?></strong></li>
        <li>Código de la Maquinaria/Camión: <strong><?php echo $codigoMaquinaria ?></strong></li>
        <li>Peso de la carga en Kilogramos: <strong><?php echo number_format($pesoCarga, 0) ?> kg</strong></li>
    </ul>


    <p>El estado de su credito es: <strong class="<?php echo $alerta; ?>"><?php echo $mensaje; ?></strong></p>
    <?php
        }
        ?>

</body>

</html>

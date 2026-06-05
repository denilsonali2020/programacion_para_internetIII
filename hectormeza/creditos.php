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
    <h1>Sistema de Aprovacion de Creditos Coorporativos</h1>

    <?php
    $montoSolicitado = 850000;

    $ingresosMensuales = 405000;

    $mensaje = '';


    if ($ingresosMensuales * 10 >= $montoSolicitado) {
        $mensaje = "APROVADO";
        $alerta = "aprovado";
    } else {
        $mensaje = "RECHAZADO";
        $alerta = "rechazado";
    }
    ?>
    <!-- INTEGRANTES
  DENILSON TROCHEZ
  HECTOR MESA
  WILSON PEREZ
  -->
    <ul>
        <li>Monto Solicitado: <strong><?php echo number_format($montoSolicitado, 2) ?></strong></li>
        <li>Ingresos Mensuales del Cliente: <strong><?php echo number_format($ingresosMensuales, 2) ?></strong></li>
    </ul>


    <p>El estado de su credito es: <strong class="<?php echo $alerta; ?>"><?php echo $mensaje; ?></strong></p>
</body>

</html>

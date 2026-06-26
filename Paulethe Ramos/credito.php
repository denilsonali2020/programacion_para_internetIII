<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Credito</title>
    <style>
        body {
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
margin: 30px;       
        }

        </style>
</head>
<body>
    <h1>Sistema de aprobación de Creditos corporativos</h1>
    <?php
    $montoSolicitado = 850000;
    $ingresosMensuales = 45000;
    
    //calcular
    if ($ingresosMensuales >= 10000) {
        $interesMensual = $montoSolicitado * 0.10;
        $totalPagar = $montoSolicitado + $interesMensual;
        echo "<p>¡Eres candidato para el préstamo! El total a pagar después de un mes será: L" . number_format($totalPagar, 2) . "</p>";
    } else {
        echo "<p>No eres candidato para el préstamo debido a ingresos insuficientes.</p>";
    }
     ?>
</body>
</html>
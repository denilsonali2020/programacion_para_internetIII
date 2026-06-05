<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Aprobación de Créditos</title>
</head>
<body>

    <h1>Evaluación de Crédito Corporativo</h1>

    <?php
    // 1. Definición de variables base
    $montoSolicitado = 850000;
    $ingresosMensuales = 45000;

    // 2. Aplicación de la regla de negocio (Cálculo de capacidad)
    $capacidadMaxima = $ingresosMensuales * 10;
    ?>

    <h3>Datos de la Solicitud:</h3>
    <ul>
        <li><strong>Monto Solicitado:</strong> L. <?php echo number_format($montoSolicitado, 2); ?></li>
        <li><strong>Ingresos Mensuales:</strong> L. <?php echo number_format($ingresosMensuales, 2); ?></li>
        <li><strong>Capacidad de Endeudamiento Máxima (Ingresos x 10):</strong> L. <?php echo number_format($capacidadMaxima, 2); ?></li>
    </ul>

    <hr>

    <h3>Resultado de la Evaluación:</h3>

    <?php
    // 3. Estructura IF / ELSE para decidir la aprobación
    if ($capacidadMaxima >= $montoSolicitado) {
        // Camino SI: Se cumple la condición (Verde)
        echo '<p style="color: green; font-weight: bold; font-size: 1.2em;">✔ El crédito ha sido APROBADO.</p>';
    } else {
        // Camino NO: No se cumple la condición (Rojo)
        echo '<p style="color: red; font-weight: bold; font-size: 1.2em;">❌ El crédito ha sido RECHAZADO por capacidad insuficiente.</p>';
    }
    ?>

</body>
</html>
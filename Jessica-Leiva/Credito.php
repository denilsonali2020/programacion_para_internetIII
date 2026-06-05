//Reto: "El Sistema de Aprobación de Créditos Coorporativos"

Una empresa financiera evalúa solicitudes de crédito para emprendedores. 
Crea un archivo llamado credito.php con las siguientes variables:

$montoSolicitado (Asigna un valor alto, por ejemplo: 850000).

$ingresosMensuales (Asigna un valor, por ejemplo: 45000).

La regla del negocio (IF/ELSE):

Si los $ingresosMensuales * 10 son mayores o iguales al $montoSolicitado, el crédito es APROBADO.

De lo contrario, el crédito es RECHAZADO.

Requisitos de visualización:

Debes mostrar el monto solicitado y los ingresos mensuales formateados con separación de miles y dos decimales.

Debes mostrar un mensaje en pantalla indicando si el cliente fue Aprobado o Rechazado 
(puedes usar colores: verde para aprobado, rojo para rechazado).

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Credito</title>

    <style>
        .APROBADO{
            color: green;
            font-weight: bold;
        }

        .RECHAZADO{
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>

<h1>Evaluación del crédito</h1>

<?php
$montoSolicitado = 850000;
$ingresosMensuales = 45000;

if ($ingresosMensuales * 10 >= $montoSolicitado){
    $mensaje = "APROBADO";
    $Alert = "APROBADO";
}else{
    $mensaje = "RECHAZADO";
    $Alert = "RECHAZADO";
}
?>

<div class="<?php echo $Alert; ?>">
    <p><strong>Estado:</strong> <?php echo $mensaje; ?></p>
</div>

<h3>Monto solicitado y los ingresos mensuales</h3>

<ul>
    <li>
        <strong>Monto solicitado:</strong>
        L. <?php echo number_format($montoSolicitado, 2); ?>
    </li>

    <li>
        <strong>Ingresos mensuales:</strong>
        L. <?php echo number_format($ingresosMensuales, 2); ?>
    </li>
</ul>

</body>
</html>

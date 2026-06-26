<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Control de Envios</title>
    <style>
        
        form {
            width: 500px;
            padding: 20px;
            border-radius: 8px;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 5px;
        }

        button {
            margin-top: 15px;
            padding: 10px 15px;
        }

        .alerta {
            background-color: #d39298;
            color: #ff0000;
            padding: 15px 25px;
            margin-top: 10px;
        }

        .autorizado {
            background-color: #9ce4ac;
            color: #0c571d;
            padding: 15px 25px;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <h1>Sistema de Control de Envios</h1>

    <form method="POST">
        <label for="conductor">Nombre del Conductor:</label>
        <input type="text" id="conductor" name="conductor" required>

        <label for="camion">Codigo del Camion:</label>
        <input type="text" id="camion" name="camion" placeholder="Ej: CAM-01" required>

        <label for="peso">Peso de la Carga en Kilogramos:</label>
        <input type="number" id="peso" name="peso" min="1" required>

        <button type="submit" name="registrar">Registrar Salida</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $conductor = $_POST["conductor"];
        $camion = $_POST["camion"];
        $peso = $_POST["peso"];

        if ($peso > 5000) {
            $mensaje = "<strong>Alerta:</strong> El camión requiere un pago de impuesto por sobrepeso.";
            $claseCss = "alerta";
        } else {
            $mensaje = "<strong>Tránsito autorizado:</strong> Peso dentro del límite legal.";
            $claseCss = "autorizado";
        }
    ?>

        <div class="<?php echo $claseCss; ?>">
            <p><?php echo $mensaje; ?></p>
        </div>

        <ul>
            <h2>Resumen del Envío</h2>
            <li><strong>Conductor:</strong> <?php echo $conductor; ?></li>
            <li><strong>Código del Camión:</strong> <?php echo $camion; ?></li>
            <li><strong>Peso de la Carga:</strong> <?php echo number_format($peso, 0, '.', ','); ?> kg</li>
        </ul>

    <?php } ?>

</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Control de Envíos</title>
</head>
<body>
    <form method="POST">
        <label>Nombre del Conductor:</label>
        <input type="text" name="txtConductor" required><br><br>
        <label>Código del Camión:</label>
        <input type="text" name="txtCamion" required><br><br>
        <label>Peso de la carga (Kg):</label>
        <input type="number" name="txtPeso" required><br><br>
        <button type="submit">Registrar Salida</button>
    </form>
    <hr>
    <?php
    if (isset($_POST['txtConductor'])) {
        $conductor = $_POST['txtConductor'];
        $camion = $_POST['txtCamion'];
        $peso = $_POST['txtPeso'];
        echo "<h3>Resultado del Procesamiento:</h3>";
        if ($peso > 5000) {
            echo "<p style='color:red'>
                    Alerta: El camión requiere un pago de impuesto por sobrepeso
                  </p>";
        } else {
            echo "<p style='color:green'>
                    Tránsito autorizado: Peso dentro del límite legal
                  </p>";
        }
        echo "<h3>Resumen del Envío</h3>";
        echo "Conductor: $conductor <br>";
        echo "Código del Camión: $camion <br>";
        echo "Peso de la carga: " . number_format($peso) . " kg";
    }
    ?>
</body>
</html>

<!-- "Sistema de Control de Envíos"
Instrucciones para el estudiante:
Una empresa de logística necesita una herramienta web interna para 
que los operarios registren la salida de los camiones de carga. 
Debes crear un archivo llamado transporte.php
que contenga un formulario y su respectivo procesamiento backend.

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
    <title>Sistema de Control de Envios</title>
</head>
<body>
    
    <!-- nombre del conductor -->
    <h1>Sistema de Control de Envíos</h1>
      
    <form method="POST" action="">
        <label for="conductor">Nombre del Conductor:</label>
        <input type="text" id="conductor" name="conductor" required><br><br>

        <label for="camion">Código de la Maquinaria/Camión:</label>
        <input type="text" id="camion" name="camion" required><br><br>

        <label for="peso">Peso de la carga en Kilogramos:</label>
        <input type="number" id="peso" name="peso" required><br><br>

        <input type="submit" value="Registrar Salida">
    </form>

    <!-- procesamiento backend -->
    <?php   
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $conductor = $_POST['conductor'];
        $camion = $_POST['camion'];
        $peso = $_POST['peso'];

        // Validar que el peso sea un número entero positivo
        if (filter_var($peso, FILTER_VALIDATE_INT) && $peso > 0) {
            echo "<p>Salida registrada exitosamente:</p>";
            echo "<ul>";
            echo "<li>Conductor: " . htmlspecialchars($conductor) . "</li>";
            echo "<li>Código del Camión: " . htmlspecialchars($camion) . "</li>";
            echo "<li>Peso de la Carga: " . htmlspecialchars($peso) . " kg</li>";
            echo "</ul>";
        } else {
            echo "<p>Error: El peso debe ser un número entero positivo.</p>";
        }
    }
     ?>
 

</body>
</html>
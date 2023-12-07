<?php
// Conectar a la base de datos (reemplaza con tus propias credenciales)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "papelarte";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para obtener los productos vendidos
$sqlVentas = "SELECT * FROM movimientos WHERE tipo_movimiento = 'venta'";
$resultVentas = $conn->query($sqlVentas);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos Vendidos - Papel-Arte</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <h2>Productos Vendidos</h2>

    <?php
    // Mostrar los resultados en una tabla
    if ($resultVentas->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID Producto</th><th>Cantidad Vendida</th></tr>";
        while ($rowVenta = $resultVentas->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $rowVenta["id_producto"] . "</td>";
            echo "<td>" . $rowVenta["cantidad"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No hay productos vendidos registrados.";
    }

    // Cerrar la conexión
    $conn->close();
    ?>
    <a href="informes.html" class="back-link">Regresar a los informes.</a>

</body>
</html>

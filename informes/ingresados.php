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

// Consulta SQL para obtener los productos ingresados
$sqlIngresos = "SELECT * FROM movimientos WHERE tipo_movimiento = 'ingreso'";
$resultIngresos = $conn->query($sqlIngresos);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe de Productos Ingresados - Papel-Arte</title>
    <link rel="stylesheet" href="css/estilo.css"> <!-- Reemplaza con tu ruta correcta de estilos -->
</head>
<body>

    <div class="container">
        <h2>Informe de Productos Ingresados</h2>

        <!-- Tabla para mostrar los productos ingresados -->
        <table>
            <tr>
                <th>ID Producto</th>
                <th>Cantidad Ingresada</th>
            </tr>

            <?php
            if ($resultIngresos->num_rows > 0) {
                while ($rowIngreso = $resultIngresos->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $rowIngreso["id_producto"] . "</td>";
                    echo "<td>" . $rowIngreso["cantidad"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='2'>No hay productos ingresados registrados.</td></tr>";
            }
            ?>

        </table>

        <a href="./informes.html" class="back-link">Regresar</a>
    </div>

</body>
</html>

<?php
// Cerrar la conexión
$conn->close();
?>

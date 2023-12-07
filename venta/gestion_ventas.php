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

// Consulta SQL para obtener todas las ventas
$sql = "SELECT * FROM ventas";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Ventas - Papel-Arte</title>
    <link rel="stylesheet" href="styles.css"> <!-- Vincula tu archivo de estilos aquí -->
</head>
<body>

    <h2>Gestión de Ventas</h2>

    <!-- Tabla de ventas -->
    <table>
        <tr>
            <th>ID</th>
            <th>ID Producto</th>
            <th>Cantidad Vendida</th>
            <th>Precio Unitario</th>
            <th>Descuento Aplicado</th>
            <th>Total Venta</th>
            <th>Fecha Venta</th>
            <th>Acciones</th>
        </tr>

        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["id_producto"] . "</td>";
                echo "<td>" . $row["cantidad_vendida"] . "</td>";
                echo "<td>" . $row["precio_unitario"] . "</td>";
                echo "<td>" . $row["descuento_aplicado"] . "</td>";
                echo "<td>" . $row["total_venta"] . "</td>";
                echo "<td>" . $row["fecha_venta"] . "</td>";
                echo "<td><a href='crud/editar_venta.php?id=" . $row["id"] . "'>Editar</a> | <a href='crud/eliminar_venta.php?id=" . $row["id"] . "'>Eliminar</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No hay ventas registradas.</td></tr>";
        }
        ?>

    </table>

    <a href="../principal/papeleria.html" class="back-link">Regresar</a>

</body>
</html>

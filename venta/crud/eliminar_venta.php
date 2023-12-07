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

// Verificar si se envió un ID válido
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consultar la base de datos para obtener información de la venta
    $sql = "SELECT * FROM ventas WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Puedes usar los datos para mostrar detalles de la venta antes de confirmar la eliminación
        $row = $result->fetch_assoc();
        $idProducto = $row['id_producto'];
        $cantidadVendida = $row['cantidad_vendida'];
        $precioUnitario = $row['precio_unitario'];
        $descuentoAplicado = $row['descuento_aplicado'];
        $totalVenta = $row['total_venta'];
        $fechaVenta = $row['fecha_venta'];
    } else {
        // Mostrar mensaje de error si no se encuentra la venta
        echo "Venta no encontrada.";
    }
} else {
    // Mostrar mensaje de error si no se proporciona un ID
    echo "ID de venta no proporcionado.";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Venta - Papel-Arte</title>
    <link rel="stylesheet" href="styles.css"> <!-- Vincula tu archivo de estilos aquí -->
</head>
<body>

    <h2>Eliminar Venta</h2>

    <?php
    if (isset($idProducto)) {
        echo "<p>ID Producto: $idProducto</p>";
        echo "<p>Cantidad Vendida: $cantidadVendida</p>";
        echo "<p>Precio Unitario: $precioUnitario</p>";
        echo "<p>Descuento Aplicado: $descuentoAplicado</p>";
        echo "<p>Total Venta: $totalVenta</p>";
        echo "<p>Fecha Venta: $fechaVenta</p>";
    }
    ?>

    <p>¿Estás seguro de que deseas eliminar esta venta?</p>

    <form action="eliminar_venta_confirmacion.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <button type="submit">Confirmar Eliminación</button>
    </form>

    <a href="gestion_ventas.php" class="back-link">Regresar</a>

</body>
</html>
 
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
        $row = $result->fetch_assoc();
        // Puedes usar los datos para prellenar un formulario de edición
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
    <title>Editar Venta - Papel-Arte</title>
    <link rel="stylesheet" href="styles.css"> <!-- Vincula tu archivo de estilos aquí -->
</head>
<body>

    <h2>Editar Venta</h2>

    <form action="actualizar_venta.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <label for="id_producto">ID Producto:</label>
        <input type="text" name="id_producto" value="<?php echo $idProducto; ?>" required>

        <label for="cantidad_vendida">Cantidad Vendida:</label>
        <input type="number" name="cantidad_vendida" value="<?php echo $cantidadVendida; ?>" required>

        <label for="precio_unitario">Precio Unitario:</label>
        <input type="number" step="0.01" name="precio_unitario" value="<?php echo $precioUnitario; ?>" required>

        <label for="descuento_aplicado">Descuento Aplicado:</label>
        <input type="number" step="0.01" name="descuento_aplicado" value="<?php echo $descuentoAplicado; ?>">

        <button type="submit">Actualizar Venta</button>
    </form>

    <a href="../gestion_ventas.php" class="back-link">Regresar</a>

</body>
</html>

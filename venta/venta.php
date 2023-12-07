<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realizar Venta - Papel-Arte</title>
    <link rel="stylesheet" href="estilos.css"> 
</head>
<body>

    <div class="container">
        <h2>Realizar Venta</h2>

        <?php
        // Manejo del formulario después de enviar
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Conectar a la base de datos
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "papelarte";

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Verificar la conexión
            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            // Obtener datos del formulario
            $id = $_POST["id"];
            $cantidadVenta = $_POST["cantidad"];

            // Consultar la base de datos para obtener información del producto
            $sql = "SELECT id, nombre, cantidad, tipo, precio, descuento FROM productoss WHERE id = $id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Producto encontrado, verificar stock y realizar venta
                $row = $result->fetch_assoc();
                $nombre = $row["nombre"];
                $stockDisponible = $row["cantidad"];
                $tipo = $row["tipo"];
                $precio = $row["precio"];
                $descuento = $row["descuento"];

                // Verificar el descuento y aplicar si es numérico
                if (is_numeric($descuento)) {
                    $precio -= ($precio * $descuento / 100);
                }

                // Insertar la venta en la tabla de ventas
                $descuentoAplicado = is_numeric($descuento) ? $descuento : 0;
                $totalVenta = $cantidadVenta * $precio - ($cantidadVenta * $precio * $descuentoAplicado / 100);

                $insertSql = "INSERT INTO ventas (id_producto, cantidad_vendida, precio_unitario, descuento_aplicado, total_venta) VALUES ($id, $cantidadVenta, $precio, $descuentoAplicado, $totalVenta)";
                $conn->query($insertSql);

                $sqlVenta = "INSERT INTO movimientos (id_producto, cantidad, tipo_movimiento) VALUES ($id, $cantidadVenta, 'venta')";
                $resultVenta = $conn->query($sqlVenta);
                
                // Verificar el stock antes de realizar la venta
                if ($cantidadVenta <= $stockDisponible) {
                    // Actualizar el stock en la base de datos
                    $nuevoStock = $stockDisponible - $cantidadVenta;
                    $updateSql = "UPDATE productoss SET cantidad = $nuevoStock WHERE id = $id";
                    $conn->query($updateSql);

                    // Mostrar mensaje de venta exitosa
                    echo "<p>Venta realizada con éxito:</p>";
                    echo "<ul>";
                    echo "<li>ID: $id</li>";
                    echo "<li>Nombre: $nombre</li>";
                    echo "<li>Cantidad Vendida: $cantidadVenta</li>";
                    echo "<li>Tipo: $tipo</li>";
                    echo "<li>Precio Unitario: $precio</li>";
                    echo "<li>Descuento Aplicado: $descuento%</li>";
                    echo "</ul>";
                } else {
                    // Mostrar mensaje de error por falta de stock
                    echo "<p class='error-message'>Error: No hay suficiente stock disponible para realizar la venta.</p>";
                }
            } else {
                // Mostrar mensaje de error por producto no encontrado
                echo "<p class='error-message'>Error: Producto no encontrado.</p>";
            }

            // Cerrar la conexión a la base de datos
            $conn->close();
        }
        ?>

        <!-- Formulario de venta -->
        <form action="venta.php" method="post">
            <label for="id">ID del Producto:</label>
            <input type="text" name="id" required>

            <label for="cantidad">Cantidad a Vender:</label>
            <input type="number" name="cantidad" required>

            <button type="submit">Realizar Venta</button>
        </form>

        <a href="../principal/papeleria.html" class="back-link">Regresar</a>
    </div>

</body>
</html>

<?php
// Verificar si se ha enviado el formulario de creación
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Obtener datos del formulario
    $nombre = $_POST['nombre'];
    $cantidad = $_POST['cantidad'];
    $tipo = $_POST['tipo'];
    $precio = $_POST['precio'];
    $descuento = $_POST['descuento'];
    $descripcion = $_POST['descripcion'];

    // Preparar la consulta SQL de inserción
    $sql = "INSERT INTO productos (nombre, cantidad, tipo, precio, descuento, descripcion)
            VALUES ('$nombre', $cantidad, '$tipo', $precio, $descuento, '$descripcion')";

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        // Registro exitoso
        $response = array('success' => true, 'message' => 'Producto agregado con éxito.');

        echo json_encode($response);
        ?>
        <!-- Espera 5 segundos y luego redirige -->
        <script>
            setTimeout(function() {
                window.location.href = 'crud.php';
            }, 4000); // 4000 milisegundos = 4 segundos
        </script>
        <?php
    } else {
        // Error en el registro
        $response = array('success' => false, 'message' => 'Error al insertar datos: ' . $conn->error);
        echo json_encode($response);
    }

    // Cerrar la conexión
    $conn->close();
}
?>
<link rel="stylesheet" href="css/crud.css">
<form action="create.php" method="post">
    <h2>Agregar Producto</h2>
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" required>
    <label for="cantidad">Cantidad:</label>
    <input type="number" name="cantidad" required>
    <label for="tipo">Tipo:</label>
    <input type="text" name="tipo">
    <label for="precio">Precio:</label>
    <input type="number" step="0.01" name="precio" required>
    <label for="descuento">Descuento:</label>
    <input type="text" step="0.01" name="descuento">
    <label for="descripcion">Descripción:</label>
    <textarea name="descripcion"></textarea>
    <button type="submit">Agregar Producto</button>
    <a href="../principal/papeleria.html" class="back-link">Regresar</a>
</form>
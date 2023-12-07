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
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $cantidad = $_POST['cantidad'];
    $tipo = $_POST['tipo'];
    $precio = $_POST['precio'];
    $descuento = $_POST['descuento'];
    $descripcion = $_POST['descripcion'];

    // Preparar la consulta SQL de inserción
    $sql = "INSERT INTO productoss (id nombre, cantidad, tipo, precio, descuento, descripcion)
            VALUES ('$codigo','$nombre', '$cantidad', '$tipo', $precio, $descuento, '$descripcion')";

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        // Registro exitoso
        $response = array('success' => true, 'message' => 'Producto agregado con éxito.');

        echo json_encode($response);
        ?>
        <!-- Espera 5 segundos y luego redirige -->
        <script>
            setTimeout(function() {
                window.location.href = 'gestion_inventario.php';
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
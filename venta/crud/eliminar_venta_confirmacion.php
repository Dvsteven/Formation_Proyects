<?php
// Verificar si se ha enviado el formulario de confirmación
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

    // Obtener el ID de la venta a eliminar
    $idVenta = $_POST['id'];

    // Consultar la base de datos para obtener información de la venta
    $sql = "SELECT * FROM ventas WHERE id = $idVenta";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Venta encontrada, proceder con la eliminación
        $deleteSql = "DELETE FROM ventas WHERE id = $idVenta";

        if ($conn->query($deleteSql) === TRUE) {
            // Eliminación exitosa
            $response = array('Producto agregado con exito.');
            echo json_encode($response);
        } else {
            // Error en la eliminación
            echo "<p class='error-message'>Error al eliminar la venta: " . $conn->error . "</p>";
        }
    } else {
        // Venta no encontrada
        echo "<p class='error-message'>Error: Venta no encontrada.</p>";
    }

    // Cerrar la conexión
    $conn->close();
} else {
    // Si el formulario no se ha enviado correctamente, redirigir a la página de gestión de ventas
    header("Location: gestion_ventas.php");
    exit();
}
?>

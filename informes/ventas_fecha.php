<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Ventas por Fecha - Papel-Arte</title>
    <link rel="stylesheet" href="css/styles.css"> <!-- Reemplaza con tu ruta correcta de estilos -->
</head>
<body>

    <div class="container">
        <h2>Consulta de Ventas por Fecha</h2>

        <!-- Formulario para ingresar la fecha deseada -->
        <form action="" method="post">
            <label for="fecha_deseada">Fecha Deseada:</label>
            <input type="date" name="fecha_deseada" required>
            <button type="submit">Consultar Ventas</button>
        </form>

        <!-- Aquí puedes mostrar los resultados si lo prefieres -->

        <a href="../principal/papeleria.html" class="back-link">Regresar</a>
    </div>

</body>
</html>
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

// Inicializar la variable de fecha
$fechaDeseada = "";

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener la fecha desde el formulario (asegúrate de validar y limpiar los datos)
    $fechaDeseada = $_POST["fecha_deseada"];

    // Consulta SQL para obtener las ventas realizadas en la fecha específica
    $sqlVentasFecha = "SELECT * FROM ventas WHERE DATE(fecha_venta) = '$fechaDeseada'";
    $resultVentasFecha = $conn->query($sqlVentasFecha);

    // Mostrar los resultados (puedes adaptar esto a tus necesidades)
    if ($resultVentasFecha->num_rows > 0) {
        while ($rowVenta = $resultVentasFecha->fetch_assoc()) {
            // Aquí puedes mostrar los detalles de cada venta
            echo "ID Venta: " . $rowVenta["id"] . ", Cantidad Vendida: " . $rowVenta["cantidad_vendida"] . "<br>";
        }
    } else {
        echo "No hay ventas registradas en la fecha especificada.";
    }
}

// Cerrar la conexión
$conn->close();
?>
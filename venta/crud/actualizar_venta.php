<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "papelarte";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Manejar el formulario después de enviar
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $id = $_POST["id"];
    $idProducto = $_POST["id_producto"];
    $cantidadVendida = $_POST["cantidad_vendida"];
    $precioUnitario = $_POST["precio_unitario"];
    $descuentoAplicado = $_POST["descuento_aplicado"];

    // Actualizar la venta en la base de datos
    $sql = "UPDATE ventas SET id_producto = '$idProducto', cantidad_vendida = '$cantidadVendida', 
            precio_unitario = '$precioUnitario', descuento_aplicado = '$descuentoAplicado' WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Venta actualizada con éxito.";
    } else {
        echo "Error al actualizar la venta: " . $conn->error;
    }
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
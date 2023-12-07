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

// Obtener datos del formulario en venta.php
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$cantidadVenta = $_POST['cantidadVenta'];
$tipo = $_POST['tipo'];
$precio = $_POST['precio'];
$descuento = $_POST['descuento'];

// Calcular precio total y aplicar descuento si es el caso
$precioTotal = $cantidadVenta * $precio;

if (is_numeric($descuento)) {
    $descuentoAplicado = ($precioTotal * $descuento) / 100;
    $precioTotal -= $descuentoAplicado;
} else {
    $descuentoAplicado = 0;
}

// Insertar datos en la tabla "ventas"
$sql = "INSERT INTO ventas (id, nombre, cantidad, tipo, precio, descuento, precio_total) 
        VALUES ('$id', '$nombre', '$cantidadVenta', '$tipo', '$precio', '$descuento', '$precioTotal')";

if ($conn->query($sql) === TRUE) {
    echo "Venta registrada exitosamente.";
} else {
    echo "Error al registrar la venta: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
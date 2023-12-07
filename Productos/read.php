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

// Consulta SQL para obtener todos los productos
$sql = "SELECT id, nombre, cantidad, tipo, precio, descuento, descripcion FROM productos";
$result = $conn->query($sql);

// Mostrar tabla de productos
if ($result->num_rows > 0) {
    echo "<h2>Listado de Productos</h2>";
    echo "<table>";
    echo "<tr><th>ID</th><th>Nombre</th><th>Cantidad</th><th>Tipo</th><th>Precio</th><th>Descuento</th><th>Descripción</th></tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["nombre"] . "</td>";
        echo "<td>" . $row["cantidad"] . "</td>";
        echo "<td>" . $row["tipo"] . "</td>";
        echo "<td>" . $row["precio"] . "</td>";
        echo "<td>" . $row["descuento"] . "</td>";
        echo "<td>" . $row["descripcion"] . "</td>";
        echo "<td><a href='update.php?id=" . $row["id"] . "'>Modificar</a> | <a href='delete.php?id=" . $row["id"] . "'>Eliminar</a></td>";
        echo "</tr>";
    }
    
    echo "</table>";
} else {
    echo "<center>No hay productos disponibles.</center>";
}

// Cerrar la conexión
$conn->close();
?>
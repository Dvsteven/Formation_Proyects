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

// Consulta SQL para obtener todos los productos en el inventario
$sql = "SELECT * FROM productoss";
$result = $conn->query($sql);
?>

<!-- Tabla de productos en el inventario -->
<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Cantidad</th>
        <th>Tipo</th>
        <th>Precio</th>
        <th>Descuento</th>
        <th>Descripción</th>
        <th>Acciones</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["nombre"] . "</td>";
            echo "<td>" . $row["cantidad"] . "</td>";
            echo "<td>" . $row["tipo"] . "</td>";
            echo "<td>" . $row["precio"] . "</td>";
            echo "<td>" . $row["descuento"] . "</td>";
            echo "<td>" . $row["descripcion"] . "</td>";
            echo "<td><a href='editar_producto.php?id=" . $row["id"] . "'>Editar</a> | <a href='eliminar_producto.php?id=" . $row["id"] . "'>Eliminar</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='8'>No hay productos en el inventario.</td></tr>";
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
    ?>
</table>

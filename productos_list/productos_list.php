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

// Consulta SQL para obtener los productos
$sql = "SELECT id, nombre, cantidad, tipo, precio FROM productoss";
$result = $conn->query($sql);

// Cerrar la conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
    <link rel="stylesheet" href="css/productos.css">
</head>
<body>

    <h2>Lista de Productos</h2>

    <!-- Botones de búsqueda y acciones -->
    <form action="productos_list.php" method="post">
        <label for="buscarNombre">Buscar por Nombre:</label>
        <input type="text" name="buscarNombre">
        <button type="submit" name="buscar">Buscar</button>
    </form>

    <form action="productos_list.php" method="post">
        <label for="buscarId">Buscar por ID:</label>
        <input type="number" name="buscarId">
        <button type="submit" name="buscar">Buscar</button>
    </form>

    <!-- Tabla de productos -->
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Tipo</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>

        <?php
        // Mostrar los productos en la tabla
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["nombre"] . "</td>";
            echo "<td>" . $row["cantidad"] . "</td>";
            echo "<td>" . $row["tipo"] . "</td>";
            echo "<td>" . $row["precio"] . "</td>";
            echo "<td><a href='modificar.php?id=" . $row["id"] . "'>Modificar</a> | <a href='eliminar.php?id=" . $row["id"] . "'>Eliminar</a></td>";
            echo "</tr>";
        }
        ?>
    </table>

    <a href="../principal/papeleria.html">Regresar</a>

</body>
</html>

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

// Obtener el ID del producto desde la URL
$id = $_GET["id"];

// Consulta SQL para obtener los datos del producto
$sql = "SELECT id, nombre, cantidad, tipo, precio FROM productoss WHERE id = $id";
$result = $conn->query($sql);

// Cerrar la conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Producto</title>
    <link rel="stylesheet" href="/css/estilos.css">
</head>
<body>

    <h2>Modificar Producto</h2>

    <?php
    // Mostrar el formulario prellenado con la información del producto
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    ?>
        <form action="actualizar.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>" required>
            <label for="cantidad">Cantidad:</label>
            <input type="number" name="cantidad" value="<?php echo $row['cantidad']; ?>" required>
            <label for="tipo">Tipo:</label>
            <input type="text" name="tipo" value="<?php echo $row['tipo']; ?>">
            <label for="precio">Precio:</label>
            <input type="number" step="0.01" name="precio" value="<?php echo $row['precio']; ?>" required>
            <button type="submit">Guardar Cambios</button>
        </form>
    <?php
    } else {
        echo "Producto no encontrado.";
    }
    ?>

    <a href="productos_list.php">Regresar</a>

</body>
</html>

<?php
// Verificar si se ha enviado el formulario de actualización
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
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $cantidad = $_POST['cantidad'];
    $tipo = $_POST['tipo'];
    $precio = $_POST['precio'];
    $descuento = $_POST['descuento'];
    $descripcion = $_POST['descripcion'];

    // Preparar la consulta SQL de actualización
    $sql = "UPDATE productos SET 
            nombre='$nombre', 
            cantidad=$cantidad, 
            tipo='$tipo', 
            precio=$precio, 
            descuento=$descuento, 
            descripcion='$descripcion'
            WHERE id=$id";

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        echo "<p>Producto modificado con éxito.</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
}

// Obtener el ID del producto de la URL
$id = $_GET['id'];

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

// Obtener los datos del producto para prellenar el formulario
$sql = "SELECT * FROM productos WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

// Cerrar la conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Producto</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
    <link rel="stylesheet" href="css/update.css">
        <h2>Modificar Producto</h2>

        <!-- Formulario de actualización -->
        <form action="" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>" required>
            <label for="cantidad">Cantidad:</label>
            <input type="number" name="cantidad" value="<?php echo $row['cantidad']; ?>" required>
            <label for="tipo">Tipo:</label>
            <input type="text" name="tipo" value="<?php echo $row['tipo']; ?>"  required>
            <label for="precio">Precio:</label>
            <input type="number" step="0.01" name="precio" value="<?php echo $row['precio']; ?>" required>
            <label for="descuento">Descuento:</label>
            <input type="number" step="0.01" name="descuento" value="<?php echo $row['descuento']; ?>" required>
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion"><?php echo $row['descripcion']; ?></textarea>
            <button type="submit">Guardar Cambios</button>
        </form>
    </div>
</body>
</html>
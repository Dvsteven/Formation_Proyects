<?php
// Verificar si se ha enviado el formulario de eliminación
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

    // Obtener el ID del producto a eliminar
    $id = $_POST['id'];

    // Preparar la consulta SQL de eliminación
    $sql = "DELETE FROM productos WHERE id=$id";

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        //Eliminacion exitosa
        $response = array('success' => true, 'message' => 'Producto eliminado con éxito.');

        echo json_encode($response);
        ?>
        <!-- Espera 5 segundos y luego redirige -->
        <script>
            setTimeout(function() {
                window.location.href = 'crud.php';
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

// Obtener los datos del producto para mostrar en el mensaje de confirmación
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
    <title>Eliminar Producto</title>
    <link rel="stylesheet" href="css/delete.css">
</head>
<body>
    <div class="container">
        <h2>Confirmar Eliminación</h2>
        <p>¿Estás seguro de que deseas eliminar el producto "<?php echo $row['nombre']; ?>"?</p>

        <form action="" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <button type="submit">Eliminar Producto</button>
        </form>
    </div>
</body>
</html>

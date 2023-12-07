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

    // Eliminar el producto de la base de datos
    $sql = "DELETE FROM productoss WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Producto eliminado con éxito.";
    } else {
        echo "Error al eliminar el producto: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
?>

<a href="productos_list.php">Regresar</a>

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

    // Obtener los datos del formulario
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $cantidad = $_POST["cantidad"];
    $tipo = $_POST["tipo"];
    $precio = $_POST["precio"];

    // Actualizar los datos del producto en la base de datos
    $sql = "UPDATE productoss SET nombre='$nombre', cantidad=$cantidad, tipo='$tipo', precio=$precio WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Producto actualizado con éxito.";
    } else {
        echo "Error al actualizar el producto: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
?>

<a href="productos_list.php">Regresar</a>

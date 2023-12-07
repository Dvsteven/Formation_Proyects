<?php
// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Realiza la conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "papelarte";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica la conexión a la base de datos
    if ($conn->connect_error) {
        die("Error en la conexión a la base de datos: " . $conn->connect_error);
    }

    // Obtiene los datos del formulario
    $tdocumento = $_POST['tdocumento'];
    $documento = $_POST['documento'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['email'];
    $usuario = $_POST['username'];
    $contrasena = $_POST['password'];

    // Prepara la consulta SQL para insertar los datos en la tabla "users"
    $sql = "INSERT INTO usuarios (tdocumento, documento, nombre, apellido, correo, username, contrasena)
            VALUES ('$tdocumento','$documento','$nombre', '$apellido', '$correo', '$usuario', '$contrasena')";

    // Ejecuta la consulta SQL
    if ($conn->query($sql) === TRUE) {
        // Registro exitoso
        $response = array('success' => true, 'message' => 'Registro exitoso.');

        echo json_encode($response);
        ?>
        <!-- Espera 5 segundos y luego redirige -->
        <script>
            setTimeout(function() {
                window.location.href = '../logueo/index-log.html';
            }, 4000); // 4000 milisegundos = 4 segundos
        </script>
        <?php
    } else {
        // Error en el registro
        $response = array('success' => false, 'message' => 'Error al insertar datos: ' . $conn->error);
        echo json_encode($response);
    }

    // Cierra la conexión a la base de datos
    $conn->close();
}
?>

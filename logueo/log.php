<?php
include("conexion.php"); // Conectamos con el archivo "conexion.php"
$con = connection();

$sql = "SELECT * FROM usuarios";
$query = mysqli_query($con, $sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["username"];
    $contrasena = $_POST["password"];

    // Validación básica: validacion de que los campos no estén vacíos
    if (empty($usuario) || $contrasena === "") {
        echo "Por favor, complete todos los campos.";
    } else {
        // Consulta la base de datos para verificar las credenciales
        $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$contrasena'";
        $query = mysqli_query($con, $sql);

        if (mysqli_num_rows($query) === 1) {

            // Las credenciales son correctas

            // Redirige al usuario a la pagina de papeleria
            header("Location: ../principal/papeleria.html");
            exit;   
        } else {
            // Las credenciales son incorrectas
            echo "Credenciales incorrectas. Intente de nuevo.";
        }
    }
}
?>
            <!-- // echo "<pre>";
            // var_dump(mysqli_fetch_assoc($query));
            // echo "</pre>"; -->
<?php
include("conexion.php"); /* Conectamos con el archivo "conexion.php" */
$con = connection();

$sql = "SELECT * FROM usuarios";
$query = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Registro usuarios papeleria">
    <meta name="keywords" content="html, css, bases de datos, php">
    <meta name="author" content="Jeison Estiven Jaramillo">
    <meta name="copyright" content="DAW PHP 2868657">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            font-size: 14px;
            margin-bottom: 6px;
            color: #555;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 12px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
    <title>Formulario de Registro</title>
</head>
<body>
<!-- Formulario de Registro -->
<form action="insertar.php" method="post">
    <!-- Campos del formulario -->
    <label for="tdocumento">Tipo de documento</label>
    <select name="tdocumento" id="tdocumento" required>
        <option value="selecciona">Seleccione su documento</option>
        <option value="cc">Cedula de Ciudadania</option>    
        <option value="ti">Tarjeta de Identidad</option>
        <option value="ce">Cedula de Extranjeria</option>
        <option value="pasaporte">Pasaporte</option>
        <option value="permiso">Permiso de Permanencia</option>
    </select>

    <label for="documento">No Documento:</label>
    <input type="number" name="documento" id="documento" required>

    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" required>
    
    <label for="apellido">Apellido:</label>
    <input type="text" name="apellido" id="apellido" required>

    <label for="email">Correo electrónico:</label>
    <input type="email" name="email" id="email" required>
    
    <label for="username">Nombre de usuario:</label>
    <input type="text" name="username" id="username" required>

    <label for="password">Contraseña:</label>
    <input type="password" name="password" id="password" required>

    <button type="submit">Registrarse</button>
</form>
</body>
</html>
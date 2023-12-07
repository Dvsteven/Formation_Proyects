<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Productos</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Ingreso de productos</h1>
        
        <!-- Formulario para agregar productos -->
        <?php include 'create.php'; ?>

        <!-- Listado de productos -->
        <?php include 'read.php'; ?>
    </div>
</body>
</html>
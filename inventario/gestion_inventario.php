<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Inventario - Papel-Arte</title>
    <link rel="stylesheet" href="estilos_generales.css">
</head>
<body>

    <div class="container">
        <h2>Gestión de Inventario</h2>

        <!-- Formulario para agregar productos al inventario -->
        <form action="agregar_producto.php" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" required>

            <label for="cantidad">Cantidad:</label>
            <input type="number" name="cantidad" required>

            <label for="tipo">Tipo:</label>
            <input type="text" name="tipo">

            <label for="precio">Precio:</label>
            <input type="number" step="0.01" name="precio" required>

            <label for="descuento">Descuento:</label>
            <input type="number" step="0.01" name="descuento">

            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion"></textarea>

            <button type="submit">Agregar Producto al Inventario</button>
        </form>

        <!-- Listado de productos en el inventario -->
        <?php include("listado_inventario.php"); ?>


        <a href="../principal/papeleria.html" class="back-link">Regresar</a>
    </div>

</body>
</html>

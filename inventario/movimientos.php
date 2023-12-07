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

// Consulta SQL para obtener todos los movimientos
$sqlMovimientos = "SELECT * FROM movimientos";
$resultMovimientos = $conn->query($sqlMovimientos);
?>

<!-- Tabla de movimientos -->
<table>
    <tr>
        <th>ID Movimiento</th>
        <th>ID Producto</th>
        <th>Cantidad</th>
        <th>Tipo de Movimiento</th>
        <th>Fecha del Movimiento</th>
    </tr>

    <?php
    if ($resultMovimientos->num_rows > 0) {
        while ($rowMovimiento = $resultMovimientos->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $rowMovimiento["id"] . "</td>";
            echo "<td>" . $rowMovimiento["id_producto"] . "</td>";
            echo "<td>" . $rowMovimiento["cantidad"] . "</td>";
            echo "<td>" . $rowMovimiento["tipo_movimiento"] . "</td>";
            echo "<td>" . $rowMovimiento["fecha_movimiento"] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No hay movimientos registrados.</td></tr>";
    }
    ?>

</table>

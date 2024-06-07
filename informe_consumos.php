<?php
include 'vistas/parte_superior.php';


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "saborydelicia"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Consulta para obtener los consumos de los clientes
$sql = "SELECT c.id_cliente, c.nombre, c.apellido, co.descripcion, co.cantidad, co.fecha_consumo
        FROM cliente c
        JOIN consumos co ON c.id_cliente = co.cliente_id";

$result = $conn->query($sql);
?>

<div class="container mt-5">
    <h1>Informe de Consumos</h1>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID Cliente</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Descripción Consumo</th>
                    <th>Cantidad</th>
                    <th>Fecha Consumo</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id_cliente"] . "</td>";
                        echo "<td>" . $row["nombre"] . "</td>";
                        echo "<td>" . $row["apellido"] . "</td>";
                        echo "<td>" . $row["descripcion"] . "</td>";
                        echo "<td>" . $row["cantidad"] . "</td>";
                        echo "<td>" . $row["fecha_consumo"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No se encontraron consumos</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php
$conn->close();
include 'vistas/parte_inferior.php';
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "saborydelicia";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$searchTerm = isset($_POST['search']) ? $_POST['search'] : '';

$sql = "SELECT * FROM cliente WHERE nombre LIKE '%$searchTerm%' OR apellido LIKE '%$searchTerm%' OR correo LIKE '%$searchTerm%'";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Clientes</title>
    <link rel="stylesheet" href="path_to_your_css">
    <style>
        .btn-group {
            display: flex;
            gap: 10px; /* Espaciado entre botones */
        }
    </style>
</head>
<body>
    <?php include 'vistas/parte_superior.php'; ?>
    
    <div class="container mt-5">
        <h1>Consultar Clientes</h1>
        <form method="post" action="consultar_clientes.php">
            <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Buscar clientes">
            </div>
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo</th>
                        <th>Fecha de Registro</th>
                        <th>Teléfono</th>
                        <th>Cédula</th>
                        <th>Área</th>
                        <th>Empleado ID</th>
                        <th>Acciones</th>
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
                            echo "<td>" . $row["correo"] . "</td>";
                            echo "<td>" . $row["fecha_registro"] . "</td>";
                            echo "<td>" . $row["telefono"] . "</td>";
                            echo "<td>" . $row["cedula"] . "</td>";
                            echo "<td>" . $row["area"] . "</td>";
                            echo "<td>" . $row["empleado_id_empleado"] . "</td>";
                            echo "<td class='btn-group'>";
                            echo "<a href='editar_cliente.php?id=" . $row['id_cliente'] . "' class='btn btn-primary btn-sm'>Editar</a>";
                            echo "<a href='borrar_cliente.php?id=" . $row['id_cliente'] . "' class='btn btn-danger btn-sm'>Borrar</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='10'>No se encontraron resultados</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php include 'vistas/parte_inferior.php'; ?>
</body>
</html>

<?php
$conn->close();
?>




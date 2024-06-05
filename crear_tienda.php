<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "saborydelicia";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $nombre = $_POST["nombre"];
    $direccion = $_POST["direccion"];
    $telefono = $_POST["telefono"];

    // Validar datos antes de insertar
    if (!empty($nombre) && !empty($direccion) && !empty($telefono) ) {
        $sql = "INSERT INTO tienda (nombre, direccion, telefono) VALUES ('$nombre', '$direccion', '$telefono')";

        if ($conn->query($sql) === TRUE) {
            echo "Creacion de tienda de manera exitosa!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Todos los campos son obligatorios.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Tienda</title>
</head>
<body>
    <?php include('vistas/parte_superior.php'); ?>
    <div class="container">
        <h2>Crear Tienda</h2>
        <form method="POST" action="crear_tienda.php">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="apellido">Direccion:</label>
                <input type="text" class="form-control" id="direccion" name="direccion" required>
            </div>
            <div class="form-group">
                <label for="correo">Telefono:</label>
                <input type="text" class="form-control" id="telefono" name="telefono" required>
            </div>
            <button type="submit" class="btn btn-primary">Registrar Tienda</button>
        </form>
    </div>
    <?php include('vistas/parte_inferior.php'); ?>
</body>
</html>
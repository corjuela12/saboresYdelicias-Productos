<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Datos de conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "saboresydelicias";

    // Crear conexión a la base de datos
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Comprobar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Obtener datos del formulario
    $nombre = limpiarDatos($_POST["nombre"]);
    $apellido = limpiarDatos($_POST["apellido"]);
    $telefono = limpiarDatos($_POST["telefono"]);
    $correo = limpiarDatos($_POST["email"]);
    $rol = limpiarDatos($_POST["rol"]);
    $tienda = limpiarDatos($_POST["tienda_id"]);



    // Validar datos
    if (empty($nombre) || empty($direccion) || empty($telefono)) {
        echo "Todos los campos son obligatorios.";
    } else {
        // Preparar la consulta SQL
        $sql = "INSERT INTO empleado (nombre,apellido,telefono,email,rol,tienda) VALUES (?, ?, ?, ?, ?, ?, ?)";

        // Preparar la consulta
        $stmt = $conn->prepare($sql);

        // Vincular parámetros
        $stmt->bind_param("sss", $nombre, $apellido, $telefono,$correo,$rol,$tienda);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "Empleado creado de manera exitosa!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Cerrar la consulta preparada
        $stmt->close();
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
}

// Función para limpiar datos de entrada
function limpiarDatos($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Empleado</title>
    </head>
<body>
    <?php include('vistas/parte_superior.php'); ?>

    <div class="container">
        <h2>Crear Empleado</h2>

        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>"> <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" class="form-control" id="apellido" name="apellido" required>
            </div>
            <div class="form-group">
                <label for="telefono">Telefono:</label>
                <input type="text" class="form-control" id="telefono" name="telefono" required>
            </div>
            <div class="form-group">
                <label for="email">Correo:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="rol">Rol:</label>
                <input type="text" class="form-control" id="rol" name="rol" required>
            </div>
            <div class="form-group">
                <label for="tienda_id">Id Tienda:</label>
                <input type="text" class="form-control" id="tienda_id" name="tienda_id" required>
            </div>

            <button type="submit" class="btn btn-primary">Registrar Empleado</button>
        </form>
    </div>

    <?php include('vistas/parte_inferior.php'); ?>

    </body>
</html>
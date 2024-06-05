<?php
// Datos de conexión a la base de datos
// Definimos las variables necesarias para conectarnos a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "saboresydelicias";

// Crear conexión a la base de datos
// Utilizamos las variables anteriores para crear una nueva conexión a la base de datos MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar conexión
// Verificamos si la conexión a la base de datos fue exitosa
if ($conn->connect_error) {
    // Si la conexión falló, mostramos un mensaje de error y detenemos la ejecución del script
    die("Conexión fallida: " . $conn->connect_error);
}

// Inicializar el array de tiendas
// Creamos un array vacío que se utilizará para almacenar los datos de las tiendas
$tiendas = [];

// Obtener todas las tiendas
// Definimos la consulta SQL para obtener todas las filas de la tabla 'tienda'
$sql = "SELECT * FROM tienda";
$result = $conn->query($sql);

// Verificamos si la consulta devolvió resultados y si hay filas en el resultado
if ($result && $result->num_rows > 0) {
    // Recorremos todas las filas del resultado de la consulta
    while ($row = $result->fetch_assoc()) {
        // Agregamos cada fila (una tienda) al array $tiendas
        $tiendas[] = $row;
    }
}

// Cerrar la conexión a la base de datos
// Cerramos la conexión a la base de datos para liberar recursos
$conn->close();
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Tiendas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <?php include('vistas/parte_superior.php'); ?>

    <div class="container">
        <h2>Consultar Tiendas</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id Tienda</th>
                    <th>Nombre</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tiendas as $tienda) { ?>
                    <tr>
                        <td><?php echo $tienda['id_tienda']; ?></td>
                        <td><?php echo $tienda['nombre']; ?></td>
                        <td><?php echo $tienda['direccion']; ?></td>
                        <td><?php echo $tienda['telefono']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <?php include('vistas/parte_inferior.php'); ?>
</body>
</html>
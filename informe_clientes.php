<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "saborydelicia";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para obtener los datos de los clientes
$sql = "SELECT * FROM cliente";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Crear un archivo CSV y agregar los datos
    $filename = "clientes_informe.csv";
    $file = fopen($filename, "w");

    // Agregar los encabezados
    $headers = array("id_cliente", "nombre", "apellido", "correo", "fecha_registro", "telefono", "cedula", "area", "empleado_id_empleado1");
    fputcsv($file, $headers);

    // Agregar los datos de los clientes
    while($row = $result->fetch_assoc()) {
        fputcsv($file, $row);
    }

    fclose($file);

    // Descargar el archivo CSV
    header('Content-Type: application/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');
    readfile($filename);

    // Eliminar el archivo del servidor después de la descarga
    unlink($filename);
} else {
    echo "No se encontraron registros de clientes.";
}

$conn->close();
?>
<?php

$host = 'localhost';
$dbnombre = 'proyecto';
$usuario = 'root@localhost';
$contraseña = '';

$enlace = new mysqli($host, $usuario, $contraseña, $dbnombre);

if ($enlace->connect_error) {
    die("Error al conectar a la base de datos: " . $enlace->connect_error);
}

$mensaje = "";
?>
<?php
// Datos de conexión
$servidor = "localhost";
$usuario = "root";
$password = "";
$base_datos = "catalogo_clientes";

// Crear conexión
$conn = new mysqli($servidor, $usuario, $password, $base_datos);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
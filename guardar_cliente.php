<?php
// guardar_cliente.php

include 'conexion.php';

// Verificar que el formulario se haya enviado correctamente
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = $_POST['nombre'];
    $sector = $_POST['sector'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $foto = '';

    // Subir la foto si se seleccionó una
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $nombre_foto = basename($_FILES['foto']['name']);
        $ruta_destino = 'uploads/' . $nombre_foto;

        // Crear la carpeta "uploads" si no existe
        if (!is_dir('uploads')) {
            mkdir('uploads', 0777, true);
        }

        // Mover la foto subida
        if (move_uploaded_file($_FILES['foto']['tmp_name'], $ruta_destino)) {
            $foto = $ruta_destino;
        }
    }

    // Insertar en la base de datos
    $sql = "INSERT INTO cliente (nombre, sector, correo, telefono, foto, estadistica1, estadistica2, fecha_registro) 
            VALUES ('$nombre', '$sector', '$correo', '$telefono', '$foto', 0, 0, NOW())";

    if ($conn->query($sql) === TRUE) {
        echo "¡Clienta registrada exitosamente!<br>";
        echo "<a href='index.php'>Ver catálogo</a>";
    } else {
        echo "Error al registrar: " . $conn->error;
    }

    $conn->close();
}
?>


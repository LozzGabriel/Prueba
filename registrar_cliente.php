<?php
// registrar_cliente.php
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Nueva Clienta</title>
</head>
<body>

    <h1>Registrar Nueva Clienta</h1>

    <form action="guardar_cliente.php" method="POST" enctype="multipart/form-data">
        <label>Nombre:</label><br>
        <input type="text" name="nombre" required><br><br>

        <label>Sector Económico:</label><br>
        <input type="text" name="sector" required><br><br>

        <label>Correo Electrónico:</label><br>
        <input type="email" name="correo" required><br><br>

        <label>Teléfono:</label><br>
        <input type="text" name="telefono" required><br><br>

        <label>Foto de Perfil (opcional):</label><br>
        <input type="file" name="foto"><br><br>

        <button type="submit">Registrar Clienta</button>
    </form>

    <br>
    <a href="index.php">Volver al catálogo</a>

</body>
</html>


<?php
// perfil.php
include 'conexion.php';

// Verificar si se proporcionó un ID válido en la URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "ID de clienta no proporcionado.";
    exit;
}

$id = intval($_GET['id']); // Asegura que sea un número entero

// Consulta para obtener la información de la clienta
$sql = "SELECT * FROM cliente WHERE id = $id";
$resultado = $conn->query($sql);

if ($resultado->num_rows == 0) {
    echo "Clienta no encontrada.";
    exit;
}

$cliente = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Perfil de <?php echo htmlspecialchars($cliente['nombre']); ?></title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 0;
        }
        .contenedor {
            max-width: 800px;
            margin: 50px auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            overflow: hidden;
            padding: 30px;
        }
        .foto-perfil {
            width: 100%;
            max-height: 400px;
            object-fit: cover;
            border-radius: 10px;
        }
        h1 {
            text-align: center;
            margin-top: 20px;
            color: #333;
        }
        .info {
            margin-top: 20px;
        }
        .info p {
            font-size: 1.1em;
            margin: 10px 0;
            color: #555;
        }
        a.boton-regresar {
            display: inline-block;
            margin-top: 30px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        a.boton-regresar:hover {
            background-color: #45a049;
        }
        .boton-container {
            text-align: center;
        }
    </style>
</head>
<body>

<div class="contenedor">
    <?php if (!empty($cliente['foto'])): ?>
        <img class="foto-perfil" src="<?php echo htmlspecialchars($cliente['foto']); ?>" alt="Foto de <?php echo htmlspecialchars($cliente['nombre']); ?>">
    <?php else: ?>
        <img class="foto-perfil" src="https://via.placeholder.com/800x400?text=Sin+Foto" alt="Sin Foto">
    <?php endif; ?>

    <h1><?php echo htmlspecialchars($cliente['nombre']); ?></h1>

    <div class="info">
        <p><strong>Sector:</strong> <?php echo htmlspecialchars($cliente['sector']); ?></p>
        <p><strong>Correo:</strong> <?php echo htmlspecialchars($cliente['correo']); ?></p>
        <p><strong>Teléfono:</strong> <?php echo htmlspecialchars($cliente['telefono']); ?></p>
        <p><strong>Dirección:</strong> <?php echo htmlspecialchars($cliente['direccion']); ?></p>
        <p><strong>Fecha de registro:</strong> <?php echo htmlspecialchars($cliente['fecha_registro']); ?></p>
    </div>

    <div class="boton-container">
        <a href="index.php" class="boton-regresar">← Volver al Catálogo</a>
    </div>
</div>

</body>
</html>

<?php
$conn->close();
?>

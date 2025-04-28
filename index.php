<?php
// index.php
include 'conexion.php';

// Consulta para obtener todas las clientas
$sql = "SELECT * FROM cliente ORDER BY fecha_registro DESC";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Catálogo de Mujeres Emprendedoras</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f6f8;
        }
        header {
            background-color: #4CAF50;
            padding: 20px;
            text-align: center;
            color: white;
        }
        .boton-registrar {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            background-color: #ff9800;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        .boton-registrar:hover {
            background-color: #e68900;
        }
        .contenedor-clientes {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }
        .cliente-card {
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .cliente-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.25);
        }
        .cliente-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            transition: transform 0.3s;
        }
        .cliente-card:hover img {
            transform: scale(1.05);
        }
        .cliente-card h3 {
            margin: 15px 0 5px 0;
        }
        .cliente-card p {
            margin: 5px 10px;
            color: #555;
            font-size: 0.9em;
        }
        .fecha {
            font-size: 0.8em;
            color: #888;
            margin-bottom: 15px;
        }
        a {
            text-decoration: none;
            color: inherit;
        }
    </style>
</head>
<body>

<header>
    <h1>Catálogo de Mujeres Emprendedoras</h1>
    <a href="registrar_cliente.php" class="boton-registrar">Registrar Nueva Clienta</a>
</header>

<section class="contenedor-clientes">
<?php
if ($resultado->num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        echo '<a href="perfil.php?id=' . $row['id'] . '">';
        echo '<div class="cliente-card">';
        
        if (!empty($row['foto'])) {
            echo '<img src="' . htmlspecialchars($row['foto']) . '" alt="Foto de ' . htmlspecialchars($row['nombre']) . '">';
        } else {
            echo '<img src="https://via.placeholder.com/300x180?text=Sin+Foto" alt="Sin Foto">';
        }

        echo '<h3>' . htmlspecialchars($row['nombre']) . '</h3>';
        echo '<p><strong>Sector:</strong> ' . htmlspecialchars($row['sector']) . '</p>';
        echo '<p><strong>Correo:</strong> ' . htmlspecialchars($row['correo']) . '</p>';
        echo '<p><strong>Teléfono:</strong> ' . htmlspecialchars($row['telefono']) . '</p>';
        echo '<p class="fecha">Registrada el: ' . htmlspecialchars($row['fecha_registro']) . '</p>';
        
        echo '</div>';
        echo '</a>';
    }
} else {
    echo '<p>No hay clientas registradas.</p>';
}
?>
</section>

</body>
</html>

<?php
$conn->close();
?>


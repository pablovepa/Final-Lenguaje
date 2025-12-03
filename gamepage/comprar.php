<head><?php
include 'db.php'; // conexión a la base de datos

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("SELECT v.id, v.nombre, v.precio, v.stock, p.nombreplataforma, i.imagen 
                            FROM videojuegos v
                            LEFT JOIN plataforma p ON v.id_plataforma = p.id_plataforma
                            LEFT JOIN imagenes i ON v.id_imagenes = i.id_imagenes
                            WHERE v.id = ?");
    $stmt->bind_param("i", $id);

} elseif (isset($_GET['nombre'])) {
    $nombre = urldecode($_GET['nombre']);
    echo "<pre>Ya casi es tuyo '$nombre'</pre>"; // 🧪 Depuración

    // Búsqueda flexible con LIKE
    $nombre = "%" . $nombre . "%";
    $stmt = $conn->prepare("SELECT v.id, v.nombre, v.precio, v.stock, p.nombreplataforma, i.imagen 
                            FROM videojuegos v
                            LEFT JOIN plataforma p ON v.id_plataforma = p.id_plataforma
                            LEFT JOIN imagenes i ON v.id_imagenes = i.id_imagenes
                            WHERE v.nombre LIKE ?");
    $stmt->bind_param("s", $nombre);

} else {
    echo "<p>No se proporcionó ningún identificador de juego.</p>";
    exit;
}

$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    $juego = $resultado->fetch_assoc();
} else {
    echo "<p>No se encontró el juego seleccionado.</p>";
    exit;
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <title>Game Warrior</title>
    <meta charset="UTF-8">
    <meta name="description" content="Game Warrior">
    <meta name="keywords" content="warrior, game, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="img/favicon.ico" rel="shortcut icon"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/font-awesome.min.css"/>
    <link rel="stylesheet" href="css/owl.carousel.css"/>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/animate.css"/>
    <style>
        body {
            background: url('img/fondo-compra.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
            font-family: 'Roboto', sans-serif;
        }
        .contenedor {
            background-color: rgba(0, 0, 0, 0.85);
            max-width: 600px;
            margin: 80px auto;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(255,255,255,0.3);
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
        }
        label {
            font-weight: bold;
        }
        .imagen-juego {
            max-height: 300px;
            border-radius: 10px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="contenedor">
        <h1>Compra de <?php echo htmlspecialchars($juego['nombre']); ?></h1>

        <div class="text-center mb-4">
            <?php
            if (!empty($juego['imagen'])) {
                echo "<img src='data:image/jpeg;base64," . base64_encode($juego['imagen']) . "' class='img-fluid imagen-juego' alt='Imagen del juego'>";
            } else {
                echo "<img src='img/default-game.jpg' class='img-fluid imagen-juego' alt='Imagen por defecto'>";
            }
            ?>
            <p><strong>Plataforma:</strong> <?php echo htmlspecialchars($juego['nombreplataforma'] ?? 'Sin especificar'); ?></p>
        </div>

        <p><strong>Precio:</strong> $<?php echo htmlspecialchars($juego['precio']); ?></p>
        <p><strong>Stock disponible:</strong> <?php echo htmlspecialchars($juego['stock']); ?></p>

        <form action="confirmar_compra.php" method="POST" onsubmit="return validarFormulario()">
            <input type="hidden" name="id" value="<?php echo $juego['id']; ?>">

            <div class="mb-3">
                <label for="cantidad" class="form-label">Cantidad:</label>
                <input type="number" id="cantidad" name="cantidad" class="form-control" min="1" max="<?php echo $juego['stock']; ?>" value="1" required>
            </div>

            <div class="mb-3">
                <label>Total a pagar:</label>
                <p id="total">$<?php echo htmlspecialchars($juego['precio']); ?></p>
            </div>

            <hr>

            <div class="mb-3">
                <label for="tarjeta" class="form-label">Número de tarjeta:</label>
                <input type="text" id="tarjeta" name="tarjeta" class="form-control" maxlength="16" placeholder="Ej: 1234567812345678" required>
            </div>

            <div class="mb-3">
                <label for="codigo" class="form-label">Código de seguridad:</label>
                <input type="text" id="codigo" name="codigo" class="form-control" maxlength="3" placeholder="Ej: 123" required>
            </div>

            <div class="mb-3">
                <label for="nombreapellido" class="form-label">Nombre y Apellido:</label>
                <input type="text" id="nombreapellido" name="nombreapellido" class="form-control" placeholder="Ej: Lionel Messi" required>
            </div>

            <div class="mb-3">
                <label for="domicilio" class="form-label">Domicilio:</label>
                <input type="text" id="domicilio" name="domicilio" class="form-control" placeholder="Ej: Av. Siempre Viva 123" required>
            </div>

            <button type="submit" class="btn btn-success w-100 mt-3">Confirmar compra</button>
        </form>
    </div>

    <script>
        const precio = <?php echo $juego['precio']; ?>;
        const cantidadInput = document.getElementById('cantidad');
        const totalElement = document.getElementById('total');

        cantidadInput.addEventListener('input', () => {
            const cantidad = parseInt(cantidadInput.value) || 1;
            totalElement.textContent = '$' + (cantidad * precio);
        });

        function validarFormulario() {
            const tarjeta = document.getElementById('tarjeta').value;
            if (tarjeta.length < 13 || tarjeta.length > 16 || isNaN(tarjeta)) {
                alert("Por favor, ingresa un número de tarjeta válido.");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>



<?php
include 'db.php'; // conexión a la base de datos

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $stmt = $conn->prepare("SELECT id_vinos, nombrevino, precio, stock, imagen 
                            FROM vinos 
                            WHERE id_vinos = ?");
    $stmt->bind_param("i", $id);

} elseif (isset($_GET['nombre'])) {
    $nombre = urldecode($_GET['nombre']);
    echo "<pre>Ya casi es tuyo '$nombre'</pre>"; // 🧪 Depuración

    $nombre = "%" . $nombre . "%";
    $stmt = $conn->prepare("SELECT id_vinos, nombrevino, precio, stock, imagen 
                            FROM vinos 
                            WHERE nombrevino LIKE ?");
    $stmt->bind_param("s", $nombre);

} else {
    echo "<p>No se proporcionó ningún identificador de vino.</p>";
    exit;
}

$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    $vino = $resultado->fetch_assoc();
} else {
    echo "<p>No se encontró el vino seleccionado.</p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Compra de Vino</title>
    <meta charset="UTF-8">
    <meta name="description" content="Compra de vino">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
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
    </style>
</head>
<body>
    <?php include 'header_cli.php'; ?>


    


    <div class="contenedor">
        <h1>Compra de <?php echo htmlspecialchars($vino['nombrevino']); ?></h1>

        <div class="text-center mb-4">
            <?php
            // Si querés mostrar imagen desde carpeta:
            // echo "<img src='img_vinos/" . htmlspecialchars($vino['imagen']) . "' class='img-fluid' alt='Imagen del vino'>";
            ?>
        </div>
        
        <p><strong>Precio:</strong> $<?php echo htmlspecialchars($vino['precio']); ?></p>
        <p><strong>Stock disponible:</strong> <?php echo htmlspecialchars($vino['stock']); ?></p>

        <form action="confirmar_compra.php" method="POST" onsubmit="return validarFormulario()">
            <input type="hidden" name="id" value="<?php echo $vino['id_vinos']; ?>">

            <div class="mb-3">
                <label for="cantidad" class="form-label">Cantidad:</label>
                <input type="number" id="cantidad" name="cantidad" class="form-control" 
                       min="1" max="<?php echo $vino['stock']; ?>" value="1" required>
            </div>

            <div class="mb-3">
                <label>Total a pagar:</label>
                <p id="total">$<?php echo htmlspecialchars($vino['precio']); ?></p>
            </div>

            <hr>

            <div class="mb-3">
                <label for="tarjeta" class="form-label">Número de tarjeta:</label>
                <input type="text" id="tarjeta" name="tarjeta" class="form-control" maxlength="16" 
                       placeholder="Ej: 1234567812345678" required>
            </div>

            <div class="mb-3">
                <label for="codigo" class="form-label">Código de seguridad:</label>
                <input type="text" id="codigo" name="codigo" class="form-control" maxlength="3" 
                       placeholder="Ej: 123" required>
            </div>

            <div class="mb-3">
                <label for="nombreapellido" class="form-label">Nombre y Apellido:</label>
                <input type="text" id="nombreapellido" name="nombreapellido" class="form-control" 
                       placeholder="Ej: Lea Paredes" required>
            </div>

            <div class="mb-3">
                <label for="domicilio" class="form-label">Domicilio:</label>
                <input type="text" id="domicilio" name="domicilio" class="form-control" 
                       placeholder="Ej: Av. ricota" required>
            </div>

            <button type="submit" class="btn btn-success w-100 mt-3">Confirmar compra</button>
        </form>
    </div>

    <script>
        const precio = <?php echo $vino['precio']; ?>;
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
holiwis

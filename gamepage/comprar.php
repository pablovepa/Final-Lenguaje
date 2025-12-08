<?php
session_start(); // Iniciar sesión antes de cualquier salida
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
            background: url('img/compravino.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
            font-family: 'Roboto', sans-serif;
        }
        .contenedor {
            background-color: rgba(0, 0, 0, 0.92);
            max-width: 700px;
            margin: 80px auto;
            padding: 40px 50px;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.8);
            border: 1px solid rgba(255, 179, 32, 0.3);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #ffb320;
            font-size: 32px;
            font-weight: 700;
            letter-spacing: 1px;
            border-bottom: 2px solid #ffb320;
            padding-bottom: 15px;
        }
        .subtitle {
            text-align: center;
            color: #ccc;
            font-size: 14px;
            margin-bottom: 30px;
            font-style: italic;
        }
        .info-section {
            background: rgba(255, 179, 32, 0.1);
            padding: 20px;
            border-radius: 10px;
            border-left: 4px solid #ffb320;
            margin-bottom: 30px;
        }
        .info-section p {
            margin: 8px 0;
            font-size: 16px;
        }
        .info-section strong {
            color: #ffb320;
            font-weight: 600;
        }
        label {
            font-weight: 600;
            color: #ffb320;
            margin-bottom: 8px;
            display: block;
            font-size: 14px;
            letter-spacing: 0.5px;
        }
        .form-control {
            background: rgba(255, 255, 255, 0.95);
            border: 1px solid #ddd;
            padding: 12px 15px;
            font-size: 15px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            background: #fff;
            border-color: #ffb320;
            box-shadow: 0 0 10px rgba(255, 179, 32, 0.3);
            outline: none;
        }
        .form-section-title {
            color: #ffb320;
            font-size: 18px;
            font-weight: 600;
            margin: 25px 0 15px 0;
            padding-left: 10px;
            border-left: 3px solid #ffb320;
        }
        hr {
            border-color: rgba(255, 179, 32, 0.3);
            margin: 30px 0;
        }
        .btn-success {
            background: linear-gradient(135deg, #ffb320, #ff9800);
            border: none;
            padding: 15px;
            font-size: 18px;
            font-weight: 700;
            letter-spacing: 1px;
            border-radius: 50px;
            transition: all 0.3s ease;
            box-shadow: 0 5px 20px rgba(255, 179, 32, 0.4);
        }
        .btn-success:hover {
            background: linear-gradient(135deg, #ff9800, #ffb320);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255, 179, 32, 0.6);
        }
        .total-display {
            background: rgba(255, 179, 32, 0.15);
            padding: 15px;
            border-radius: 8px;
            font-size: 24px;
            font-weight: 700;
            color: #ffb320;
            text-align: center;
            border: 2px solid #ffb320;
        }
        .form-row {
            display: flex;
            gap: 15px;
        }
        .form-row .mb-3 {
            flex: 1;
        }
    </style>
</head>
<body>
    <?php include 'header_cli.php'; ?>


    


    <div class="contenedor">
        <h1>Finalizar Compra</h1>
        <p class="subtitle">Complete los datos para confirmar su pedido</p>

        <div class="info-section">
            <h5 style="margin: 0 0 15px 0; color: #fff; font-size: 18px;">📦 Producto Seleccionado</h5>
            <p><strong>Vino:</strong> <?php echo htmlspecialchars($vino['nombrevino']); ?></p>
            <p><strong>Precio unitario:</strong> $<?php echo number_format($vino['precio'], 0, ',', '.'); ?></p>
            <p><strong>Stock disponible:</strong> <?php echo htmlspecialchars($vino['stock']); ?> unidades</p>
        </div>

        <form action="confirmar_compra.php" method="POST" onsubmit="return validarFormulario()">
            <input type="hidden" name="id" value="<?php echo $vino['id_vinos']; ?>">

            <div class="mb-3">
                <label for="cantidad">Cantidad a comprar</label>
                <input type="number" id="cantidad" name="cantidad" class="form-control" 
                       min="1" max="<?php echo $vino['stock']; ?>" value="1" required>
            </div>

            <div class="mb-3">
                <label>Total a pagar</label>
                <div class="total-display" id="total">$<?php echo number_format($vino['precio'], 0, ',', '.'); ?></div>
            </div>

            <hr>

            <h5 class="form-section-title">💳 Datos de Pago</h5>

            <div class="mb-3">
                <label for="tarjeta">Número de tarjeta</label>
                <input type="text" id="tarjeta" name="tarjeta" class="form-control" maxlength="16" 
                       placeholder="1234 5678 9012 3456" required>
            </div>

            <div class="form-row">
                <div class="mb-3">
                    <label for="vencimiento">Fecha de vencimiento</label>
                    <input type="text" id="vencimiento" name="vencimiento" class="form-control" 
                           placeholder="MM/AA" maxlength="5" required>
                </div>
                <div class="mb-3">
                    <label for="codigo">Código de seguridad (CVV)</label>
                    <input type="text" id="codigo" name="codigo" class="form-control" maxlength="3" 
                           placeholder="123" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="nombreapellido">Titular de la tarjeta</label>
                <input type="text" id="nombreapellido" name="nombreapellido" class="form-control" 
                       placeholder="Nombre completo como aparece en la tarjeta" required>
            </div>

            <hr>

            <h5 class="form-section-title">📍 Datos de Envío</h5>

            <div class="mb-3">
                <label for="domicilio">Dirección de entrega</label>
                <input type="text" id="domicilio" name="domicilio" class="form-control" 
                       placeholder="Calle, número, departamento" required>
            </div>

            <div class="form-row">
                <div class="mb-3">
                    <label for="ciudad">Ciudad</label>
                    <input type="text" id="ciudad" name="ciudad" class="form-control" 
                           placeholder="Ej: Mendoza" required>
                </div>
                <div class="mb-3">
                    <label for="codigo_postal">Código Postal</label>
                    <input type="text" id="codigo_postal" name="codigo_postal" class="form-control" 
                           placeholder="Ej: 5500" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="telefono">Teléfono de contacto</label>
                <input type="tel" id="telefono" name="telefono" class="form-control" 
                       placeholder="Ej: +54 261 123 4567" required>
            </div>

            <button type="submit" class="btn btn-success w-100 mt-4">CONFIRMAR COMPRA</button>
        </form>
    </div>

    <script>
        const precio = <?php echo $vino['precio']; ?>;
        const cantidadInput = document.getElementById('cantidad');
        const totalElement = document.getElementById('total');

        // Formatear números con separador de miles
        function formatearPrecio(numero) {
            return '$' + numero.toLocaleString('es-AR');
        }

        cantidadInput.addEventListener('input', () => {
            const cantidad = parseInt(cantidadInput.value) || 1;
            totalElement.textContent = formatearPrecio(cantidad * precio);
        });

        // Formatear entrada de tarjeta con espacios
        const tarjetaInput = document.getElementById('tarjeta');
        tarjetaInput.addEventListener('input', (e) => {
            let valor = e.target.value.replace(/\s/g, '');
            if (!isNaN(valor)) {
                e.target.value = valor.replace(/(\d{4})/g, '$1 ').trim();
            }
        });

        // Formatear fecha de vencimiento
        const vencimientoInput = document.getElementById('vencimiento');
        vencimientoInput.addEventListener('input', (e) => {
            let valor = e.target.value.replace(/\D/g, '');
            if (valor.length >= 2) {
                valor = valor.substring(0, 2) + '/' + valor.substring(2, 4);
            }
            e.target.value = valor;
        });

        // Solo números en CVV
        const codigoInput = document.getElementById('codigo');
        codigoInput.addEventListener('input', (e) => {
            e.target.value = e.target.value.replace(/\D/g, '');
        });

        function validarFormulario() {
            const tarjeta = document.getElementById('tarjeta').value.replace(/\s/g, '');
            if (tarjeta.length < 13 || tarjeta.length > 16 || isNaN(tarjeta)) {
                alert("⚠️ Por favor, ingresa un número de tarjeta válido (13-16 dígitos).");
                return false;
            }

            const codigo = document.getElementById('codigo').value;
            if (codigo.length !== 3 || isNaN(codigo)) {
                alert("⚠️ El código de seguridad debe tener 3 dígitos.");
                return false;
            }

            const vencimiento = document.getElementById('vencimiento').value;
            if (!/^\d{2}\/\d{2}$/.test(vencimiento)) {
                alert("⚠️ Formato de fecha inválido. Use MM/AA.");
                return false;
            }

            const telefono = document.getElementById('telefono').value;
            if (telefono.length < 8) {
                alert("⚠️ Por favor, ingresa un número de teléfono válido.");
                return false;
            }

            return confirm("¿Confirmar la compra por " + totalElement.textContent + "?");
        }
    </script>
</body>
</html>
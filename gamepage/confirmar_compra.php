<?php
include 'db.php'; // conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_vinos = intval($_POST['id']);
    $cantidad = intval($_POST['cantidad']);

    // Verificar stock actual
    $stmt = $conn->prepare("SELECT nombrevino, precio, stock FROM vinos WHERE id_vinos = ?");
    $stmt->bind_param("i", $id_vinos);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $vino = $resultado->fetch_assoc();

        if ($cantidad <= $vino['stock']) {
            // Restar stock
            $nuevo_stock = $vino['stock'] - $cantidad;
            $update = $conn->prepare("UPDATE vinos SET stock = ? WHERE id_vinos = ?");
            $update->bind_param("ii", $nuevo_stock, $id_vinos);
            $update->execute();

            // Calcular total
            $total = $cantidad * $vino['precio'];

            echo "<div style='text-align:center; font-family:Arial; margin-top:50px;'>
                    <h2 style='color:green;'>✅ Compra realizada con éxito</h2>
                    <p>Has comprado <strong>$cantidad</strong> unidad(es) de <strong>" . htmlspecialchars($vino['nombrevino']) . "</strong>.</p>
                    <p>Total pagado: <strong>$$total</strong></p>
                    <p>Gracias por tu compra 🍷</p>
                  </div>";

            // Redirigir después de unos segundos
            echo "<script>
                    setTimeout(function() {
                        window.location.href = 'indexadm.php'; // página principal de la vinoteca
                    }, 4000);
                  </script>";

        } else {
            echo "<p style='color:red; text-align:center;'>❌ No hay suficiente stock disponible.</p>";
        }
    } else {
        echo "<p style='color:red; text-align:center;'>❌ Vino no encontrado.</p>";
    }
} else {
    echo "<p style='color:red; text-align:center;'>❌ Método de acceso inválido.</p>";
}
?>

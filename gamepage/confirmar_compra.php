<?php
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id']);
    $cantidad = intval($_POST['cantidad']);

    // Obtener el stock actual
    $query = "SELECT stock FROM videojuegos WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $juego = mysqli_fetch_assoc($result);
        $stock_actual = $juego['stock'];

        // Verificar si hay stock suficiente
        if ($stock_actual >= $cantidad) {
            $nuevo_stock = $stock_actual - $cantidad;

            // Actualizar el stock en la base de datos
            $update = "UPDATE videojuegos SET stock = $nuevo_stock WHERE id = $id";
            mysqli_query($conn, $update);

            // Mostrar mensaje de éxito
            echo "<!DOCTYPE html>
            <html lang='es'>
            <head>
                <meta charset='UTF-8'>
                <title>Compra confirmada</title>
                <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet'>
                <style>
                    body {
                        background: linear-gradient(135deg, #0a0a0a, #1a1a1a);
                        color: #fff;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        height: 100vh;
                        text-align: center;
                    }
                    .mensaje {
                        background: rgba(0, 0, 0, 0.8);
                        padding: 40px;
                        border-radius: 15px;
                        box-shadow: 0 0 10px rgba(0,0,0,0.5);
                    }
                </style>
            </head>
            <body>
                <div class='mensaje'>
                    <h1>✅ ¡Compra realizada con éxito!</h1>
                    <p>En <strong>3 días</strong> llegará tu pedido 🕒</p>
                    <p><strong>📨 SE ENVIO EL RECIBO DE COMPRA A TU CORREO 📨</p>
                    <a href='index.php' class='btn btn-success mt-3'>Volver al inicio</a>
                </div>
            </body>
            </html>";
        } else {
            echo "<script>alert('Lo sentimos , nos quedamos sin stock :('); window.location.href='index.php';</script>";
        }
    } else {
        echo "<script>alert('Juego no encontrado.'); window.location.href='index.php';</script>";
    }
} else {
    header("Location: index.php");
    exit;
}
?>
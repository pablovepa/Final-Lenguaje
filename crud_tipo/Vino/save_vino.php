<?php
include __DIR__ . '/../db.php';

if (isset($_POST['guardar_registro'])) {
    $nombrevino     = $_POST['nombrevino'];
    $precio         = $_POST['precio'];
    $stock          = $_POST['stock'];
    $id_tipos       = $_POST['id_tipos'];
    $id_bodegas     = $_POST['id_bodegas'];
    $id_proveedores = $_POST['id_proveedores'];
    $id_origen      = $_POST['id_origen'];
    $posible_proveedor = $_POST['posible_proveedor'];
    $id_envase      = $_POST['id_envase'];

    // Procesar imagen
    $imagen_nombre = $_FILES['imagen']['name'];
    $imagen_temp   = $_FILES['imagen']['tmp_name'];
    $imagen_tipo   = $_FILES['imagen']['type'];
    $imagen_size   = $_FILES['imagen']['size'];

    // Carpeta destino (en gamepage/img_vinos)
    $ruta_destino = __DIR__ . '/../../gamepage/img_vinos/' . $imagen_nombre;

    // Validaciones básicas
    $allowed = ['image/jpeg', 'image/png', 'image/jpg'];
    if (!in_array($imagen_tipo, $allowed)) {
        die("<p style='color:red; text-align:center;'>❌ Formato de imagen no permitido. Solo JPG o PNG.</p>");
    }
    if ($imagen_size > 2 * 1024 * 1024) { // 2 MB
        die("<p style='color:red; text-align:center;'>❌ La imagen supera el tamaño máximo de 2MB.</p>");
    }

    // Mover imagen a carpeta
    if (move_uploaded_file($imagen_temp, $ruta_destino)) {
        // Insertar en la base de datos
        $query = "INSERT INTO vinos (nombrevino, precio, stock, id_tipos, id_bodegas, id_proveedores, id_origen, posible_proveedor, imagen, id_envase) 
                  VALUES ('$nombrevino', '$precio', '$stock', '$id_tipos', '$id_bodegas', '$id_proveedores', '$id_origen', '$posible_proveedor', '$imagen_nombre', '$id_envase')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "<div style='text-align:center; font-family:Arial; margin-top:50px;'>
                    <h2 style='color:green;'>✅ Vino guardado correctamente</h2>
                    <p>Serás redirigido en 3 segundos...</p>
                  </div>";
            echo "<script>
                    setTimeout(function() {
                        window.location.href = '../indexvinos.php';
                    }, 3000);
                  </script>";
            exit;
        } else {
            echo "<p style='color:red; text-align:center;'>❌ Error al guardar el vino: " . mysqli_error($conn) . "</p>";
        }
    } else {
        echo "<p style='color:red; text-align:center;'>❌ Error al subir la imagen.</p>";
    }
}
?>

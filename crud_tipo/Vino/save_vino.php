<?php
include("db.php");

if (isset($_POST['guardar_registro'])) {
    $nombrevino = $_POST['nombrevino'];
    $precio = $_POST['precio'];
    $tipo_de_vino = $_POST['tipo_de_vino'];
    $id_tipos = $_POST['id_tipos'];
    $id_bodegas = $_POST['id_bodegas'];
    $id_proveedores = $_POST['id_proveedores'];
    

    // Procesar imagen
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $nombre_imagen = $_FILES['imagen']['name'];
        $imagen_binaria = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

        // Guardar imagen en la tabla 'imagenes'
        $query_imagen = "INSERT INTO imagenes (nombre, imagen) VALUES ('$nombre_imagen', '$imagen_binaria')";
        $result_imagen = mysqli_query($conn, $query_imagen);

        if ($result_imagen) {
            $id_imagenes = mysqli_insert_id($conn); // Obtener el ID de la imagen recién insertada
        } else {
            echo "Error al guardar la imagen: " . mysqli_error($conn);
            exit;
        }
    } else {
        echo "No se pudo subir la imagen.";
        exit;
    }

    // Guardar videojuego en la tabla 'videojuegos' con referencia a la imagen
    $query_videojuego = "INSERT INTO videojuegos (nombre, precio, tipo_de_vino, id_proveedor, id_imagenes ,id_bodega) 
                         VALUES ('$nombre', '$precio', '$tipo_de_vino', '$id_proveedor', '$id_imagenes','$id_bodega')";
    $result_videojuegos = mysqli_query($conn, $query_videojuego);

    if ($result_videojuegos) {
        header("Location: games.php");
        exit;
    } else {
        echo "Error al guardar el videojuego: " . mysqli_error($conn);
    }
}
?>

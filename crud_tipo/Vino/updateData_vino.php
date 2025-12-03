<?php include("includes/header_vino.php") ?>
<?php include("db.php") ?>

<?php
if (isset($_GET['id'])) {
    $codigo = $_GET['id'];
    $query = "SELECT v.*, i.nombre AS nombre_imagen FROM videojuegos v 
              LEFT JOIN imagenes i ON v.id_imagenes = i.id_imagenes 
              WHERE v.id = $codigo";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $nombre = $row['nombre'];
        $precio = $row['precio'];
        $tipo_de_vino = $row['tipo_de_vino'];
        $id_proveedor = $row['id_proveedor'];
        $id_bodega = $row['id_bodega'];
        $id_imagenes = $row['id_imagenes'];
        $nombre_imagen = $row['nombre_imagen'];
       
    }
}

if (isset($_POST['update2'])) {
    $codigo = $_GET['id'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $tipo_de_vino = $_POST['tipo_de_vino'];
    $id_proveedor = $_POST['id_proveedor'];
    $id_bodega = $_POST['id_bodega'];
    $id_imagenes = $_POST['id_imagenes_actual'];
    $id_genero = $_POST['id_genero'];

    // Procesar nueva imagen si se sube
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $nombre_imagen_nueva = $_FILES['imagen']['name'];
        $imagen_binaria_nueva = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
        $fecha_subida = date("Y-m-d H:i:s");

        $query_imagen = "INSERT INTO imagenes (nombre, imagen, fecha_subida) 
                         VALUES ('$nombre_imagen_nueva', '$imagen_binaria_nueva', '$fecha_subida')";
        $result_imagen = mysqli_query($conn, $query_imagen);

        if ($result_imagen) {
            $id_imagenes = mysqli_insert_id($conn); // Nuevo ID de imagen
        } else {
            echo "Error al guardar la nueva imagen: " . mysqli_error($conn);
            exit;
        }
    }

    // Actualizar videojuego
    $query = "UPDATE videojuegos
              SET nombre = '$nombre', precio = '$precio', stock = '$stock', id_plataforma = '$id_plataforma', id_imagenes = '$id_imagenes' , id_genero = '$id_genero'
              WHERE id = $codigo";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        echo "El query de actualizar falló: " . mysqli_error($conn);
    } else {
        echo '<script>alert("Registro actualizado");</script>';
        echo '<script>window.location = "games.php";</script>';
    }
}
?>

<div class="card text-center">
    <div class="card-body">
        <h1 class="card-title">ACTUALIZAR DATOS</h1>
        <p class="card-text">Los siguientes son los datos seleccionados para actualizar:</p>

        <form action="updateData_vino.php?id=<?php echo $_GET['id']; ?>" method="POST" enctype="multipart/form-data" style="max-width: 500px; margin: 0 auto; text-align: left;">
            <div class="form-group mb-3">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" class="form-control" value="<?php echo $nombre; ?>">
            </div>

            <div class="form-group mb-3">
                <label for="precio">Precio:</label>
                <input type="text" name="precio" class="form-control" value="<?php echo $precio; ?>">
            </div>

            <div class="form-group mb-4">
                <label for="tipo_de_vino">Tipo de Vino:</label>
                <input type="text" name="tipo_de_vino" class="form-control" value="<?php echo $tipo_de_vino; ?>">
            </div>

            <?php if (!empty($nombre_imagen)): ?>
                <div class="mb-3 text-center">
                    <label>Imagen actual:</label><br>
                    <img src="mostrar_imagen.php?id=<?php echo $id_imagenes; ?>" alt="Imagen del juego" style="max-width: 100%; height: auto; border: 1px solid #ccc; padding: 5px;">
                </div>
            <?php endif; ?>

            <div class="form-group mb-4">
                <label for="imagen" class="form-label">Subir nueva imagen del juego:</label>
                <input type="file" name="imagen" id="imagen" class="form-control mb-3" accept="image/*">
                <input type="hidden" name="id_imagenes_actual" value="<?php echo $id_imagenes; ?>">
            </div>

            <div class="form-group mb-4">
                <label for="proveedor">Seleccione el proveedor:</label>
                <select name="id_proveedor" id="id_proveedor" class="form-control" required>
                    <option value="">-- Seleccione un tipo --</option>
                    <?php
                    $query_tipos = "SELECT id_plataforma, nombreplataforma FROM plataforma";
                    $result_tipos = mysqli_query($conn, $query_tipos);

                    if ($result_tipos && mysqli_num_rows($result_tipos) > 0) {
                        while ($row_tipo = mysqli_fetch_assoc($result_tipos)) {
                            $selected = ($row_tipo['id_plataforma'] == $id_plataforma) ? 'selected' : '';
                            echo "<option value='{$row_tipo['id_plataforma']}' $selected>{$row_tipo['nombreplataforma']}</option>";
                        }
                    } else {
                        echo "<option value=''>No hay tipos de plataforma disponibles</option>";
                    }
                    ?>
                </select>
            </div>
            
            <div class="form-group mb-4">
                <label for="bodega">Seleccione la bodega:</label>
                <select name="id_bodega" id="id_bodega" class="form-control" required>
                    <option value="">-- Seleccione un tipo --</option>
                    <?php
                    $query_tipos = "SELECT id_genero, nombre_genero FROM generos";
                    $result_tipos = mysqli_query($conn, $query_tipos);

                    if ($result_tipos && mysqli_num_rows($result_tipos) > 0) {
                        while ($row_tipo = mysqli_fetch_assoc($result_tipos)) {
                            $selected = ($row_tipo['id_genero'] == $id_genero) ? 'selected' : '';
                            echo "<option value='{$row_tipo['id_genero']}' $selected>{$row_tipo['nombre_genero']}</option>";
                        }
                    } else {
                        echo "<option value=''>No hay tipos de generos disponibles</option>";
                    }
                    ?>
                </select>
            </div>

            <button class="btn btn-success" name="update2">Actualizar</button>
        </form>
    </div>
</div>

<?php include("includes/footer.php") ?>


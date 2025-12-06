<?php include __DIR__ . '/../includes/headervino.php'; ?>
<?php include __DIR__ . '/../db.php'; ?>

<?php
if (isset($_GET['id_vinos'])) {
    $id_vinos = intval($_GET['id_vinos']);

    $query = "SELECT * FROM vinos WHERE id_vinos = $id_vinos";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        $nombrevino     = $row['nombrevino'];
        $precio         = $row['precio'];
        $stock          = $row['stock'];
        $id_tipos       = $row['id_tipos'];
        $id_bodegas     = $row['id_bodegas'];
        $id_proveedores = $row['id_proveedores'];
        $imagen_actual  = $row['imagen'];
    }
}

if (isset($_POST['update2'])) {
    $id_vinos       = intval($_GET['id_vinos']);
    $nombrevino     = $_POST['nombrevino'];
    $precio         = $_POST['precio'];
    $stock          = $_POST['stock'];
    $id_tipos       = $_POST['id_tipos'];
    $id_bodegas     = $_POST['id_bodegas'];
    $id_proveedores = $_POST['id_proveedores'];

    // Procesar nueva imagen si se sube
    if (!empty($_FILES['imagen']['name'])) {
        $imagen_nombre = $_FILES['imagen']['name'];
        $imagen_temp   = $_FILES['imagen']['tmp_name'];
        $ruta_destino  = __DIR__ . '/../../gamepage/img_vinos/' . $imagen_nombre;

        // Borrar imagen anterior si existe
        $ruta_anterior = __DIR__ . '/../../gamepage/img_vinos/' . $imagen_actual;
        if (file_exists($ruta_anterior)) {
            unlink($ruta_anterior);
        }

        // Subir nueva imagen
        move_uploaded_file($imagen_temp, $ruta_destino);

        // Actualizar con nueva imagen
        $query = "UPDATE vinos SET
                    nombrevino = '$nombrevino',
                    precio = '$precio',
                    stock = '$stock',
                    id_tipos = '$id_tipos',
                    id_bodegas = '$id_bodegas',
                    id_proveedores = '$id_proveedores',
                    imagen = '$imagen_nombre'
                  WHERE id_vinos = $id_vinos";
    } else {
        // Actualizar sin cambiar imagen
        $query = "UPDATE vinos SET
                    nombrevino = '$nombrevino',
                    precio = '$precio',
                    stock = '$stock',
                    id_tipos = '$id_tipos',
                    id_bodegas = '$id_bodegas',
                    id_proveedores = '$id_proveedores'
                  WHERE id_vinos = $id_vinos";
    }

    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Error al actualizar: " . mysqli_error($conn));
    }

    header("Location: read_vino.php?mensaje=Vino actualizado correctamente");
    exit;
}
?>

<div class="card text-center">
    <div class="card-body">
        <h1 class="card-title">ACTUALIZAR DATOS</h1>
        <p class="card-text">Los siguientes son los datos seleccionados para actualizar:</p>

        <form action="updateData_vino.php?id_vinos=<?= htmlspecialchars($_GET['id_vinos']) ?>" method="POST" enctype="multipart/form-data" style="max-width: 500px; margin: 0 auto; text-align: left;">
            <div class="form-group mb-3">
                <label>Nombre del vino</label>
                <input type="text" name="nombrevino" class="form-control" value="<?= htmlspecialchars($nombrevino) ?>" required>
            </div>

            <div class="form-group mb-3">
                <label>Precio</label>
                <input type="number" step="0.01" name="precio" class="form-control" value="<?= htmlspecialchars($precio) ?>" required>
            </div>

            <div class="form-group mb-3">
                <label>Stock</label>
                <input type="number" name="stock" class="form-control" value="<?= htmlspecialchars($stock) ?>" required>
            </div>

            <div class="form-group mb-3">
                <label>Tipo</label>
                <select name="id_tipos" class="form-control" required>
                    <?php
                    $tipos = mysqli_query($conn, "SELECT id_tipos, nombre FROM tipos");
                    while ($t = mysqli_fetch_assoc($tipos)) {
                        $selected = ($t['id_tipos'] == $id_tipos) ? 'selected' : '';
                        echo "<option value='{$t['id_tipos']}' $selected>" . htmlspecialchars($t['nombre']) . "</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group mb-3">
                <label>Bodega</label>
                <select name="id_bodegas" class="form-control" required>
                    <?php
                    $bodegas = mysqli_query($conn, "SELECT id_bodegas, nombre_bodega FROM bodegas");
                    while ($b = mysqli_fetch_assoc($bodegas)) {
                        $selected = ($b['id_bodegas'] == $id_bodegas) ? 'selected' : '';
                        echo "<option value='{$b['id_bodegas']}' $selected>" . htmlspecialchars($b['nombre_bodega']) . "</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group mb-3">
                <label>Proveedor</label>
                <select name="id_proveedores" class="form-control" required>
                    <?php
                    $prov = mysqli_query($conn, "SELECT id_proveedores, nombre FROM proveedores");
                    while ($p = mysqli_fetch_assoc($prov)) {
                        $selected = ($p['id_proveedores'] == $id_proveedores) ? 'selected' : '';
                        echo "<option value='{$p['id_proveedores']}' $selected>" . htmlspecialchars($p['nombre']) . "</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group mb-3">
                <label>Imagen actual</label><br>
                <?php if (!empty($imagen_actual)): ?>
                    <img src="../gamepage/img_vinos/<?= htmlspecialchars($imagen_actual) ?>" width="150" alt="Imagen del vino">
                <?php else: ?>
                    <p>No hay imagen cargada</p>
                <?php endif; ?>
            </div>

            <div class="form-group mb-4">
                <label>Nueva imagen (opcional)</label>
                <input type="file" name="imagen" class="form-control" accept="image/*">
            </div>

            <button class="btn btn-success" name="update2">Actualizar</button>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>

<?php include __DIR__ . '/../includes/header_vino.php'; ?>
<?php include __DIR__ . '/../db.php'; ?>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card text-center w-50 shadow">
        <div class="card-body">
            <h1 class="card-title">Registrar Vino</h1>
            <p class="card-text">Ingrese los datos a continuación</p>

            <form action="save_vino.php" method="POST">
                <div class="form-group text-start">

                
                    <input type="text" name="nombrevino" class="form-control mb-3"
                        placeholder="Nombre del vino" required>

                    <input type="text" name="precio" class="form-control mb-3"
                        placeholder="Precio" required>

                    <input type="text" name="stock" class="form-control mb-3"
                        placeholder="Cantidad en stock" required>

                    <!-- TIPOS -->
                    <label class="form-label">Tipo de vino</label>
                    <select name="id_tipos" class="form-control mb-3" required>
                        <option value="">-- Seleccione tipo --</option>
                        <?php
                        $tipos = mysqli_query($conn, "SELECT id_tipos, nombre FROM tipos");
                        while ($row = mysqli_fetch_assoc($tipos)) {
                            echo "<option value='{$row['id_tipos']}'>{$row['nombre']}</option>";
                        }
                        ?>
                    </select>

                    <!-- PROVEEDORES -->
                    <label class="form-label">Proveedor</label>
                    <select name="id_proveedores" class="form-control mb-3" required>
                        <option value="">-- Seleccione proveedor --</option>
                        <?php
                        $proveedores = mysqli_query($conn, "SELECT id_proveedores, nombre FROM proveedores");
                        while ($row = mysqli_fetch_assoc($proveedores)) {
                            echo "<option value='{$row['id_proveedores']}'>{$row['nombre']}</option>";
                        }
                        ?>
                    </select>

                    <!-- BODEGAS -->
                    <label class="form-label">Bodega</label>
                    <select name="id_bodegas" class="form-control mb-4" required>
                        <option value="">-- Seleccione bodega --</option>
                        <?php
                        $bodegas = mysqli_query($conn, "SELECT id_bodegas, nombre_bodega FROM bodegas");
                        while ($row = mysqli_fetch_assoc($bodegas)) {
                            echo "<option value='{$row['id_bodegas']}'>{$row['nombre_bodega']}</option>";
                        }
                        ?>
                    </select>

                </div>

                <input type="submit" class="btn btn-success w-100"
                    name="guardar_registro" value="Guardar">
            </form>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>



<?php include("includes/header_games.php"); ?>
<?php include("db.php"); ?>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card text-center w-50 shadow">
        <div class="card-body">
            <h1 class="card-title">Registrar Juego</h1>
            <p class="card-text">Ingrese los datos a continuación</p>

            <form action="save_game.php" method="POST" enctype="multipart/form-data">
                <div class="form-group text-start">
                    <input type="text" name="nombre" class="form-control mb-3" placeholder="Ingrese nombre" required>

                    <input type="number" name="precio" class="form-control mb-3" placeholder="Ingrese precio" required>

                    <input type="number" name="stock" class="form-control mb-3" placeholder="Ingrese cantidad en stock" required>

                    <label for="imagen" class="form-label">Subir imagen del juego:</label>
                    <input type="hidden" name="MAX_FILE_SIZE" value="2097152"> 
                    <input type="file" name="imagen" id="imagen" class="form-control mb-3" accept="image/*" required>

                    <label for="plataforma" class="form-label">Seleccione la plataforma:</label>
                    <select name="id_plataforma" id="id_plataforma" class="form-control mb-4" required>
                        <option value="">-- Seleccione un tipo --</option>
                        <?php
                        $query_tipos = "SELECT id_plataforma, nombreplataforma FROM plataforma";
                        $result_tipos = mysqli_query($conn, $query_tipos);
                        if ($result_tipos && mysqli_num_rows($result_tipos) > 0) {
                            while ($row_tipo = mysqli_fetch_assoc($result_tipos)) {
                                echo "<option value='{$row_tipo['id_plataforma']}'>{$row_tipo['nombreplataforma']}</option>";
                            }
                        } else {
                            echo "<option value=''>No hay tipos de plataforma disponibles</option>";
                        }
                        ?>
                    </select>
                    <label for="genero" class="form-label">Seleccione el genero:</label>
                    <select name="id_genero" id="id_genero" class="form-control mb-4" required>
                        <option value="">-- Seleccione un tipo --</option>
                        <?php
                        $query_tipos = "SELECT id_genero, nombre_genero FROM generos";
                        $result_tipos = mysqli_query($conn, $query_tipos);
                        if ($result_tipos && mysqli_num_rows($result_tipos) > 0) {
                            while ($row_tipo = mysqli_fetch_assoc($result_tipos)) {
                                echo "<option value='{$row_tipo['id_genero']}'>{$row_tipo['nombre_genero']}</option>";
                            }
                        } else {
                            echo "<option value=''>No hay tipos de plataforma disponibles</option>";
                        }
                        ?>
                    </select>
                </div>
                <input type="submit" class="btn btn-success w-100" name="guardar_registro" value="Guardar">
            </form>
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>


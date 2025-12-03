<?php include("includes/headeru.php")?>
<?php include("db.php")?>

<div class ="card text-center">
    <div class="card-body">
        <h1 class="card-title">CREAR REGISTRO</h1>
        <p class="card-text">Ingrese los datos a continuación</p>

        <form action="saveu.php" method="POST">
            <div class="form-group">
            <input type="text" name="usuario"  placeholder="Ingrese Usuario" autofocus>
            <hr>
            <input type="text" name="password"  placeholder="Ingrese Contraseña" autofocus>
            <hr>
             <label for="tipo_usuario">Tipo de Usuario:</label>
                <select name="tipo_usuario" id="tipo_usuario"  required>
                    <option value="">-- Seleccione un tipo --</option>
                    <?php
                    // Consulta para traer los tipos de usuario
                    $query_tipos = "SELECT id, nombre FROM tbl_tipos_usuarios";
                    $result_tipos = mysqli_query($conn, $query_tipos);

                    if ($result_tipos && mysqli_num_rows($result_tipos) > 0) {
                        while ($row_tipo = mysqli_fetch_assoc($result_tipos)) {
                            echo "<option value='{$row_tipo['id']}'>{$row_tipo['nombre']}</option>";
                        }
                    } else {
                        echo "<option value=''>No hay tipos de usuario disponibles</option>";
                    }
                    ?>
                </select>
            </div>
            <hr>
            <input type="text" name="nombre_usuario"  placeholder="Ingrese Nombre" autofocus>
            <hr>
            <input type="text" name="email"  placeholder="Ingrese Correo" autofocus>
            <hr>
            <input type="number" name="telefono"  placeholder="Ingrese nro de Telefono" autofocus>
            </div> 
            <div class="form-group">
            <input type="submit" class="btn btn-success" name="guardar_registro" value="Guardar"> </div>
            </div>
        </form>
    </div>
</div>

<?php include("includes/footer.php")?>

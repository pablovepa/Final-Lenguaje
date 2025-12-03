<?php include("includes/headeru.php")?>
<?php include("db.php")?>

<?php
if(isset($_GET['id'])){
$codigo = $_GET['id'];
$query = "SELECT * FROM tbl_usuarios WHERE id = $codigo";
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) ==1) {
    $row = mysqli_fetch_array($result);
    $usuario = $row['usuario'];
    $password = $row['password'];
    $tipo_usuario = $row['tipo_usuario'];
    $nombre_usuario = $row['nombre_usuario'];
    $email = $row['email'];
    $telefono = $row['telefono'];
    }
}
if (isset($_POST['update2'])){
    $codigo = $_GET['id'];
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $tipo_usuario = $_POST['tipo_usuario'];
    $nombre_usuario = $_POST['nombre_usuario'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    $query = "UPDATE tbl_usuarios
        SET usuario = '$usuario', password = '$password', tipo_usuario = '$tipo_usuario',
        nombre_usuario = '$nombre_usuario' , email = '$email' , telefono = '$telefono'                           
            WHERE id = $codigo";
                        // die( $query);
    $result = mysqli_query($conn,$query);
    if (!$result){
        echo "El query de actualizar falló";
    }else{
        ?>
        <script>alert("Registro actualizado");</script>
        <script>
        window.location = "indexu.php";
        </script>
        <?php 
    }
}
?>
<div class="card text-center">
    <div class="card-body">
        <h1 class="card-title">ACTUALIZAR DATOS</h1>
        <p class="card-text">Los siguientes son los datos seleccionados para actualizar:</p>
     
        <form action="updateDatau.php?id=<?php echo $_GET['id']; ?>" method="POST" style="max-width: 500px; margin: 0 auto; text-align: left;">
            
            <div class="form-group mb-3">
                <label for="usuario">Usuario:</label>
                <input type="text" name="usuario" class="form-control" value="<?php echo $usuario; ?>">
            </div>

            <div class="form-group mb-3">
                <label for="password">Contraseña:</label>
                <input type="text" name="password" class="form-control" value="<?php echo $password; ?>">
            </div>

            <div class="form-group mb-3">
                <label for="tipo_usuario">Tipo Usuario:</label>
                <select name="tipo_usuario" id="tipo_usuario" class="form-control">
                    <?php
                    $query_tipos = "SELECT id, nombre FROM tbl_tipos_usuarios";
                    $result_tipos = mysqli_query($conn, $query_tipos);
                    while ($row_tipo = mysqli_fetch_assoc($result_tipos)) {
                        $selected = ($row_tipo['id'] == $tipo_usuario) ? 'selected' : '';
                        echo "<option value='{$row_tipo['id']}' $selected>{$row_tipo['nombre']}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre_usuario" class="form-control" value="<?php echo $nombre_usuario; ?>">
            </div>

            <div class="form-group mb-3">
                <label for="email">Email:</label>
                <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
            </div>

            <div class="form-group mb-4">
                <label for="telefono">Teléfono:</label>
                <input type="text" name="telefono" class="form-control" value="<?php echo $telefono; ?>">
            </div>
            <button class="btn btn-success w-100" name="update2">Actualizar</button>
        </form>
    </div>
</div>
   

<?php include("includes/footer.php")?>
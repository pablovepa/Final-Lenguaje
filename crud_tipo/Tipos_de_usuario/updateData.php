<?php include __DIR__ . '/../includes/header.php'; ?>
<?php include __DIR__ . '/../db.php'; ?>

<?php
if(isset($_GET['id'])){
$codigo = $_GET['id'];
$query = "SELECT * FROM tbl_tipos_usuarios WHERE id = $codigo";
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) ==1) {
    $row = mysqli_fetch_array($result);
    $nombres = $row['nombre'];   
    
    }
}
if (isset($_POST['update2'])){
    $codigo = $_GET['id'];
    $nombres = $_POST['nombres'];
    
    $query = "UPDATE tbl_tipos_usuarios 
                     SET nombre = '$nombres'                       
                         WHERE id = $codigo";
                        // die( $query);
    $result = mysqli_query($conn,$query);
    if (!$result){
        echo "El query de actualizar falló";
    }else{
        ?>
        <script>alert("Registro actualizado");</script>
        <script>
        window.location = "update.php";
        </script>
        <?php 
    }
}
?>
<div class ="card text-center">
        <div class="card-body">
            <h1 class="card-title">ACTUALIZAR DATOS</h1>
            <p class="card-text">Los siguientes son los datos seleccionados para actualizar:</p>
         
            <form action="updateData.php?id=<?php echo $_GET['id']; ?>" method="POST">
            
            <div class="form-group"  for="name">Nombre: 
            <input type="text" name="nombres" clas="form-control" placeholder="Actualizar Nombre" value="<?php print $nombres;?>">
            </div>
            
            
            <button class="btn btn-success" name="update2">Actualizar</button>
            </form>
        </div>
    </div>    

           
<?php include __DIR__ . '/../includes/footer.php'; ?>
    
    
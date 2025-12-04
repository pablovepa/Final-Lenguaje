<?php include __DIR__ . '/../db.php'; ?>

<?php
if(isset($_GET['id'])){
        $codigo = $_GET['id'];
        $query = "DELETE FROM vinos WHERE id_vinos = $codigo";
        $result = mysqli_query($conn, $query);
        if(!$result)
        {
            die("El query para eliminar falló");
        }
        else{
            ?>
            <script>alert("Registro Eliminado");</script>
            <?php 
        }
    }
    //si quisiera redireccionar a index directamente: ?>
    <script>
    window.location = "games.php";
    </script>
<?php include("includes/header_vino.php")?>
<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
?>

<div class="container p-12">
    <div class = "row">
        <div class="col-md-12">
            <div class ="card text-center">
                <div class="card-body">
                    <h1 class="card-title">Gestion de Vinos</h5>                   
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Añadir vino</h5>
                                    <a href="create_vino.php" class="btn btn-primary">Crear</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Ver vinos</h5>
                                    <a href="read_vino.php" class="btn btn-primary">Leer</a>
                                </div>
                            </div>

                        <div class="col-sm-6"> <br> </div>
                    
                    </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Actualizar vino</h5>
                                    <a href="update_vino.php" class="btn btn-primary">Actualizar</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Eliminar vino</h5>
                                    <a href="delete_vino.php" class="btn btn-primary">Borrar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("includes/footer.php")?>

<?php include("includes/headervino.php")?>
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
                    <h1 class="card-title">Sistema Gestion de Vinos</h5>  
                    <p class="card-text">Este sistema permite gestionar los Vinos registrados en nuestra pagina.</p>
                    <p class="card-text">Seleccione la operación en el menú de navegación o en las siguientes cards:</p>                 
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">AÑADIR VINO</h5>
                                    <p class="card-text">Esta opción permite Añadir un nuevo vino</p>
                                    <a href="vino/create_vino.php" class="btn btn-primary">Añadir</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">VER VINOS</h5>
                                    <p class="card-text">Esta opción permite ver la lista de vinos registrados</p>
                                    <a href="vino/read_vino.php" class="btn btn-primary">Leer</a>
                                </div>
                            </div>

                        <div class="col-sm-6"> <br> </div>
                    
                    </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">ACTUALIZAR VINO</h5>
                                    <p class="card-text">Esta opción permite ACTUALIZAR los datos de los vinos.</p>
                                    <a href="vino/update_vino.php" class="btn btn-primary">Actualizar</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">ELIMINAR VINO</h5>
                                    <p class="card-text">Esta opción permite BORRAR los vinos de la BDD</p>
                                    <a href="vino/delete_vino.php" class="btn btn-primary">Borrar</a>
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

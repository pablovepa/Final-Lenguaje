<?php include("includes/headerindexu.php")?>
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
                    <h1 class="card-title">Sistema Gestion de Usuarios</h5>
                    <p class="card-text">Este sistema permite gestionar a los usuarios registrados en nuestra pagina.</p>
                    <p class="card-text">Seleccione la operación en el menú de navegación o en las siguientes cards:</p>                    
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">CREAR NUEVO USUARIO</h5>
                                    <p class="card-text">Esta opción permite CREAR un nuevo usuario</p>
                                    <a href="Usuarios/createu.php" class="btn btn-primary">Crear</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">LEER</h5>
                                    <p class="card-text">Esta opción permite ver la lista de usuarios registrados</p>
                                    <a href="Usuarios/readu.php" class="btn btn-primary">Leer</a>
                                </div>
                            </div>

                        <div class="col-sm-6"> <br> </div>
                    
                    </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">ACTUALIZAR</h5>
                                    <p class="card-text">Esta opción permite ACTUALIZAR los datos de un usuario.</p>
                                    <a href="Usuarios/updateu.php" class="btn btn-primary">Actualizar</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">ELIMINAR</h5>
                                    <p class="card-text">Esta opción permite BORRAR un usuario de la BDD</p>
                                    <a href="Usuarios/deleteu.php" class="btn btn-primary">Borrar</a>
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

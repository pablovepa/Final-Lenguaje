<?php include("includes/header.php")?>
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
                    <h1 class="card-title">Sistema CRUD Tipos Usuarios</h5>
                    <p class="card-text">Un sistema CRUD permite ejecutar las operaciones básicas de trabajo en PHP y MySQL</p>
                    <p class="card-text">Seleccione la operación en el menú de navegación ó en las siguientes cards:</p>                    
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">CREAR</h5>
                                    <p class="card-text">Esta opción permite CREAR un registro en la BDD</p>
                                    <a href="Tipos de Usuario/create.php" class="btn btn-primary">Crear</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">LEER</h5>
                                    <p class="card-text">Esta opción permite LEER un registro de la BDD</p>
                                    <a href="Tipos de Usuario/read.php" class="btn btn-primary">Leer</a>
                                </div>
                            </div>

                        <div class="col-sm-6"> <br> </div>
                    
                    </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">ACTUALIZAR</h5>
                                    <p class="card-text">Esta opción permite ACTUALIZAR un registro de la BDD</p>
                                    <a href="Tipos de Usuario/update.php" class="btn btn-primary">Actualizar</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">ELIMINAR</h5>
                                    <p class="card-text">Esta opción permite BORRAR un registro de la BDD</p>
                                    <a href="Tipos de Usuario/delete.php" class="btn btn-primary">Borrar</a>
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

<?php include("includes/headervino.php")?>
<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
?>

<style>
    body {
        background: url('../gamepage/img/pruebalogin.jpg') no-repeat center center fixed;
        background-size: cover;
        min-height: 100vh;
    }
    .content-wrapper {
        padding-top: 120px;
        padding-bottom: 50px;
    }
    .crud-card {
        background: rgba(255, 255, 255, 0.05);
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        backdrop-filter: blur(4px);
        border: 1px solid rgba(255, 255, 255, 0.18);
        margin-bottom: 30px;
    }
    .crud-card h1 {
        color: #ffb320;
        font-weight: 700;
        letter-spacing: 2px;
        margin-bottom: 20px;
        text-transform: uppercase;
    }
    .crud-card p {
        color: #fff;
        margin-bottom: 30px;
    }
    .operation-card {
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255, 179, 32, 0.3);
        border-radius: 10px;
        padding: 25px;
        margin-bottom: 20px;
        transition: all 0.3s ease;
    }
    .operation-card:hover {
        background: rgba(255, 255, 255, 0.12);
        border-color: rgba(255, 179, 32, 0.6);
        transform: translateY(-3px);
    }
    .operation-card h5 {
        color: #ffb320;
        font-weight: 600;
        margin-bottom: 15px;
    }
    .operation-card p {
        color: rgba(255, 255, 255, 0.8);
        font-size: 14px;
        margin-bottom: 15px;
    }
    .site-btn {
        background: linear-gradient(135deg, #ffb320 0%, #ff9800 100%);
        color: #fff;
        font-weight: 700;
        border-radius: 50px;
        padding: 10px 30px;
        border: none;
        transition: all 0.3s ease;
    }
    .site-btn:hover {
        background: linear-gradient(135deg, #ff9800 0%, #ffb320 100%);
        box-shadow: 0 5px 20px rgba(255, 179, 32, 0.4);
        transform: translateY(-2px);
        color: #fff;
    }
</style>

<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="crud-card text-center">
                    <h1>Sistema Gestión de Vinos</h1>
                    <p>Este sistema permite gestionar los vinos registrados en nuestra página.</p>
                    <p>Seleccione la operación en el menú de navegación o en las siguientes opciones:</p>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="operation-card">
                                <h5>AÑADIR VINO</h5>
                                <p>Esta opción permite añadir un nuevo vino</p>
                                <a href="vino/create_vino.php" class="btn site-btn">Añadir</a>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="operation-card">
                                <h5>VER VINOS</h5>
                                <p>Esta opción permite ver la lista de vinos registrados</p>
                                <a href="vino/read_vino.php" class="btn site-btn">Leer</a>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="operation-card">
                                <h5>ACTUALIZAR VINO</h5>
                                <p>Esta opción permite actualizar los datos de los vinos</p>
                                <a href="vino/update_vino.php" class="btn site-btn">Actualizar</a>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="operation-card">
                                <h5>ELIMINAR VINO</h5>
                                <p>Esta opción permite borrar los vinos de la BDD</p>
                                <a href="vino/delete_vino.php" class="btn site-btn">Borrar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("includes/footer.php")?>

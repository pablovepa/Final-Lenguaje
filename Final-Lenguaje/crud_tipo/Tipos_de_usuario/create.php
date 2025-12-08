<?php include __DIR__ . '/../includes/header.php'; ?>
<?php include __DIR__ . '/../db.php'; ?>

<div class="container mt-5">
    <div class="card text-center w-50 mx-auto shadow">
        <div class="card-body">
            <h1 class="card-title">CREAR REGISTRO</h1>
            <p class="card-text">Ingrese los datos a continuación</p>

            <form action="save.php" method="POST">
                <div class="form-group">
                    <input type="text" name="nombres" class="form-control" placeholder="Ingrese su Rol" autofocus>
                </div>            
                <input type="submit" class="btn btn-success mt-3" name="guardar_registro" value="Guardar">
            </form>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>

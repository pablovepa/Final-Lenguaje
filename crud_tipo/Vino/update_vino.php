<?php include __DIR__ . '/../includes/header_vino.php'; ?>
<?php include __DIR__ . '/../db.php'; ?>

    <div class ="card text-center">
        <div class="card-body">
            <h1 class="card-title">Actualizar datos de Vinos</h1>
            <p class="card-text">Datos de Vinos guardados</p>
            
            <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                <a href="create_vino.php" class="btn btn-primary" name="create">Agregar</a>
            </div>

            <div class="table-responsive-sm">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Tipo_de_vino</th>
                            <th>Proveedor</th>
                            <th>Bodega</th>
                    <tbody>
                        <?php
                        $query = "SELECT v.id, v.nombre, v.precio, v.stock, p.nombreplataforma AS plataforma , g.nombre_genero AS generos
                              FROM videojuegos v
                              LEFT JOIN plataforma p ON v.id_plataforma = p.id_plataforma
                              LEFT JOIN generos g ON v.id_genero = g.id_genero
                              ORDER BY v.nombre ASC;";
                        $result_alumnos = mysqli_query($conn, $query);

                        while($row = mysqli_fetch_array($result_alumnos)){?>

                                <tr>    
                                <td><?php echo $row['nombre']?></td>
                                <td><?php echo $row['precio']?></td>
                                <td><?php echo $row['stock']?></td>
                                <td><?php echo $row['tipo_de_vino']?></td>
                                <td><?php echo $row['proveedor']?></td>
                                <td><?php echo $row['bodega']?></td>
                                <td>
                                    <a href="updateData_vino.php?id=<?php echo $row['id']?>">
                                    <button type="button" class="btn btn-warning" name="update">Modificar</button>
                                    </a>
                                    <a href="deleteData_vino.php?id=<?php echo $row['id']?>">
                                    <button type="button" class="btn btn-danger">Eliminar</button>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div> 

<?php include __DIR__ . '/../includes/footer.php'; ?>


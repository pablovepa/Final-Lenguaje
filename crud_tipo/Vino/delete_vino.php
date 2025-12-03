<?php include __DIR__ . '/../includes/header_vino.php'; ?>
<?php include __DIR__ . '/../db.php'; ?>
    <div class ="card text-center">
        <div class="card-body">
            <h1 class="card-title">Eliminar Vinos</h1>
            <p class="card-text">Los siguientes vinos estan guardados hasta el momento:</p>
         
            <div class="table-responsive-sm">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Tipo_de_vino</th>
                            <th>Proveedor</th>
                            <th>Bodega</th>
                            <th>Genero</th>
                        </tr>
                    </thead>
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
                                <td><?php echo $row['Nombre']?></td>
                                <td><?php echo $row['Precio']?></td>
                                <td><?php echo $row['Tipo_de_vino']?></td>
                                <td><?php echo $row['Proveedor']?></td>
                                <td><?php echo $row['Bodega']?></td>
                                <td><?php echo $row['Genero']?></td>                               
                                <td>
                                    <a href="deleteData_vino.php?id=<?php echo $row['id']?>">
                                    <button type="button" class="btn btn-danger">Eliminar</button>
                                    </a>
                                    <a href="updateData_vino.php?id=<?php echo $row['id']?>">
                                    <button type="button" class="btn btn-warning" name="update">Modificar</button>
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
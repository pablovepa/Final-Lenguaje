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
                            <th>Stock</th>
                            <th>Tipo</th>
                            <th>Bodega</th>
                            <th>Proveedor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = " SELECT 
                                        v.id_vinos,
                                        v.nombrevino,
                                        v.precio,
                                        v.stock,
                                        t.nombre    AS tipo,
                                        b.nombre_bodega  AS bodega,
                                        p.nombre AS proveedor
                                    FROM vinos v
                                    LEFT JOIN tipos t 
                                        ON v.id_tipos = t.id_tipos
                                    LEFT JOIN bodegas b 
                                        ON v.id_bodegas = b.id_bodegas
                                    LEFT JOIN proveedores p 
                                        ON v.id_proveedores = p.id_proveedores
                                        ORDER BY v.nombrevino ASC
                                    ";

                               $result_alumnos = mysqli_query($conn, $query);

                        while($row = mysqli_fetch_array($result_alumnos)){?>
                            <tr>
                                <td><?= $row['nombrevino'] ?></td>
                                <td>$<?= $row['precio'] ?></td>
                                <td><?= $row['stock'] ?></td>
                                <td><?= $row['tipo'] ?></td>
                                <td><?= $row['proveedor'] ?></td>
                                <td><?= $row['bodega'] ?></td>                               
                                <td>
                                    <a href="deleteData_vino.php?id=<?php echo $row['id_vinos']?>">
                                    <button type="button" class="btn btn-danger">Eliminar</button>
                                    </a>
                                    <a href="updateData_vino.php?id=<?php echo $row['id_vinos']?>">
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
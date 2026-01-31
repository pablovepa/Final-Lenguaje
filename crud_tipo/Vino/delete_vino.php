<?php include __DIR__ . '/../includes/headervino.php'; ?>
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
                            <th>origen</th>
                            <th>posible_proveedor</th>
                            <th>envase</th>
                            <th>tamaño</th>

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
                                        p.nombre AS proveedor,
                                        o.nombre AS origen,
                                        v.posible_proveedor,
                                        e.nombre AS envase,
                                        e.tamaño AS tamano

                                    FROM vinos v
                                    LEFT JOIN tipos t 
                                        ON v.id_tipos = t.id_tipos
                                    LEFT JOIN bodegas b 
                                        ON v.id_bodegas = b.id_bodegas
                                    LEFT JOIN proveedores p 
                                        ON v.id_proveedores = p.id_proveedores
                                         left JOIN origen o
                                        ON v.id_origen = o.id_origen
                                    LEFT JOIN envase e
                                        ON v.id_envase = e.id_envase
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
                                <td><?= $row['origen'] ?></td>
                                <td><?= $row['posible_proveedor'] ?></td> 
                                <td><?= $row['envase'] ?></td>   
                                <td><?= $row['tamano'] ?></td>   
                                <td>
                                    <a href="deleteData_vino.php?id=<?php echo $row['id_vinos']?>">
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
    <div class="card-body">
    <form action="../indexvinos.php" method="POST">
<input type="submit" class="btn btn-success" value="Volver"> </div>
            </div>
<?php include __DIR__ . '/../includes/footer.php'; ?>
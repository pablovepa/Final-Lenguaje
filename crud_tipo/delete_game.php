<?php include("includes/header_games.php")?>
<?php include("db.php")?>

    <div class ="card text-center">
        <div class="card-body">
            <h1 class="card-title">Eliminar Juegos</h1>
            <p class="card-text">Los siguientes juegos estan guardados hasta el momento:</p>
         
            <div class="table-responsive-sm">
                <table class="table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Plataforma</th>
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
                                <td><?php echo $row['id']?></td>
                                <td><?php echo $row['nombre']?></td>
                                <td><?php echo $row['precio']?></td>
                                <td><?php echo $row['stock']?></td>
                                <td><?php echo $row['plataforma']?></td>
                                <td><?php echo $row['generos']?></td>                               
                                <td>
                                    <a href="deleteData_game.php?id=<?php echo $row['id']?>">
                                    <button type="button" class="btn btn-danger">Eliminar</button>
                                    </a>
                                    <a href="updateData_game.php?id=<?php echo $row['id']?>">
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

<?php include("includes/footer.php")?>
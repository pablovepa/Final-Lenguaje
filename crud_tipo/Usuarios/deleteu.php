<?php include("includes/headeru.php")?>
<?php include("db.php")?>

    <div class ="card text-center">
        <div class="card-body">
            <h1 class="card-title">ELIMINAR DATOS</h1>
            <p class="card-text">Los siguientes son los datos guardados hasta el momento:</p>
         
            <div class="table-responsive-sm">
                <table class="table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Usuario</th>
                            <th>Contraseña</th>
                            <th>Tipo Usuario</th>
                            <th>Nombre Usuario</th>
                            <th>Email</th>
                            <th>Telefono</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT u.id, u.usuario, u.password, 
                        t.nombre AS tipo_usuario,
                         u.nombre_usuario, u.email, u.telefono
                        FROM tbl_usuarios u
                        INNER JOIN tbl_tipos_usuarios t 
                        ON u.tipo_usuario = t.id";
                        $result_alumnos = mysqli_query($conn, $query);

                        while($row = mysqli_fetch_array($result_alumnos)){?>
                            <tr>
                                <td><?php echo $row['id']?></td>
                                <td><?php echo $row['usuario']?></td>
                                <td><?php echo $row['password']?></td>
                                <td><?php echo $row['tipo_usuario']?></td>
                                <td><?php echo $row['nombre_usuario']?></td>
                                <td><?php echo $row['email']?></td>
                                <td><?php echo $row['telefono']?></td>                           
                                <td>
                                    <a href="deleteDatau.php?id=<?php echo $row['id']?>">
                                    <button type="button" class="btn btn-danger">Eliminar</button>
                                    </a>
                                    <a href="updateDatau.php?id=<?php echo $row['id']?>">
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
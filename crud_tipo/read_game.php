<?php include("includes/header_games.php")?>
<?php include("db.php")?>

    <div class ="card text-center">
        <div class="card-body">
            <h1 class="card-title">LEER DATOS</h1>
            <p class="card-text">Los siguientes son los datos guardados hasta el momento:</p>
        </div>
    </div>
        
    <div class="container p-4">
        <?php
            if (isset($_GET['mensaje'])) {
        echo "<div class='alert alert-success text-center'>" . htmlspecialchars($_GET['mensaje']) . "</div>";
    }
    ?>

    <h2 class="text-center mb-4">Lista de videojuegos registrados</h2>

    <div class="row">
        <?php
       $query = "SELECT v.nombre, v.precio, v.stock, p.nombreplataforma, i.imagen , g.nombre_genero
          FROM videojuegos v
          JOIN plataforma p ON v.id_plataforma = p.id_plataforma
          JOIN generos g on v.id_genero = g.id_genero
          JOIN imagenes i ON v.id_imagenes = i.id_imagenes";


        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='col-md-4 mb-4'>";
            echo "<div class='card'>";
            echo "<img src='data:image/jpeg;base64," . base64_encode($row['imagen']) . "' class='card-img-top' alt='Imagen del juego'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>" . $row['nombre'] . "</h5>";
            echo "<p class='card-text'>Precio: $" . $row['precio'] . "<br>Stock: " . $row['stock'] . "<br>Plataforma: " . $row['nombreplataforma'] ."<br>Genero: " . $row['nombre_genero'] . "</p>";
            echo "</div></div></div>";
        }
        ?>
    </div>


<?php include("includes/footer.php"); ?>
 <?php include("db.php"); ?>
 
  <style>
        .btn-primary {
            background-color: #fcb23b;
            border-color: #fcb23b;
            color: #fff;
        }
        .btn-primary:hover,
        .btn-primary:focus {
            background-color: #e6a100;
            border-color: #e6a100;
            color: #fff;
        }
    </style>
 
 
 
 <section class="container my-5">
        <h2 class="text-center mb-4">Vinos Disponibles</h2>
        <div class="row justify-content-center">
            <?php
            $query = "SELECT v.nombre, v.precio, v.stock, p.nombreplataforma, i.imagen , g.nombre_genero
                      FROM videojuegos v
                      JOIN plataforma p ON v.id_plataforma = p.id_plataforma
                      JOIN generos g ON v.id_genero = g.id_genero
                      JOIN imagenes i ON v.id_imagenes = i.id_imagenes";

            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='col-md-4 mb-4'>";
                echo "<div class='card h-100 shadow'>";
                echo "<img src='data:image/jpeg;base64," . base64_encode($row['imagen']) . "' class='card-img-top' alt='Imagen del juego'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>" . htmlspecialchars($row['nombre']) . "</h5>";
                echo "<p class='card-text'>Precio: $" . $row['precio'] . "<br>Stock: " . $row['stock'] . "<br>Plataforma: " . $row['nombreplataforma'] ."<br>Genero: " . $row['nombre_genero'] . "</p>";
                echo "<a href='comprar.php?nombre=" . urlencode($row['nombre']) . "' class='btn btn-primary w-100 mt-2'>Comprar</a>";
                echo "</div></div></div>";
            }
            ?>
        </div>
    </section>
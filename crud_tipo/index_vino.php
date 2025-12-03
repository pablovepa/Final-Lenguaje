<?php include("includes/header_games.php"); ?>
<?php include("db.php"); ?>

<div class="container p-4">
    <?php
    if (isset($_GET['mensaje'])) {
        echo "<div class='alert alert-success text-center'>" . htmlspecialchars($_GET['mensaje']) . "</div>";
    }
    ?>

    <h2 class="text-center mb-4">Lista de vinos registrados</h2>

    <div class="row">
        <?php
       $query = "SELECT v.nombre, v.precio, v.stock, p.nombreplataforma, i.imagen 
          FROM videojuegos v
          JOIN plataforma p ON v.id_plataforma = p.id_plataforma
          JOIN imagenes i ON v.id_imagenes = i.id_imagenes";


        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='col-md-4 mb-4'>";
            echo "<div class='card'>";
            echo "<img src='data:image/jpeg;base64," . base64_encode($row['imagen']) . "' class='card-img-top' alt='Imagen del juego'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>" . $row['nombre'] . "</h5>";
            echo "<p class='card-text'>Precio: $" . $row['precio'] . "<br>Stock: " . $row['stock'] . "<br>Plataforma: " . $row['nombreplataforma'] . "</p>";
            echo "</div></div></div>";
        }
        ?>
    </div>
</div>

<?php include("includes/footer.php"); ?>

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

    .card {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;
    }

    .card-body {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .card-text {
        margin-bottom: 0.5rem;
    }

    .card .btn {
        margin-top: auto;
    }

    .col-md-4 {
        display: flex;
    }
</style>




<section class="container my-5">
    <h2 class="text-center mb-4">Vinos Disponibles</h2>
    <div class="row justify-content-center">
        <?php
        // Consulta ampliada con JOINs para traer tipo, proveedor y bodega
      $query = "SELECT v.id_vinos, v.nombrevino, v.precio, v.stock, v.imagen,
                 t.nombre AS tipo,
                 p.nombre AS proveedor,
                 b.nombre_bodega AS bodega
          FROM vinos v
          LEFT JOIN tipos t ON v.id_tipos = t.id_tipos
          LEFT JOIN proveedores p ON v.id_proveedores = p.id_proveedores
          LEFT JOIN bodegas b ON v.id_bodegas = b.id_bodegas";


        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                // Si no hay imagen, usar una por defecto
                $img = !empty($row['imagen']) ? $row['imagen'] : 'default.jpg';

                echo "<div class='col-md-4 mb-4'>";
                echo "<div class='card h-100 shadow'>";
                echo "<img src='img_vinos/$img' class='card-img-top' alt='Imagen del vino'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>" . htmlspecialchars($row['nombrevino']) . "</h5>";
                echo "<p class='card-text'>Precio: $" . $row['precio'] . "<br>Stock: " . $row['stock'] . "</p>";
                echo "<p class='card-text'><strong>Tipo:</strong> " . htmlspecialchars($row['tipo']) . "</p>";
                echo "<p class='card-text'><strong>Proveedor:</strong> " . htmlspecialchars($row['proveedor']) . "</p>";
                echo "<p class='card-text'><strong>Bodega:</strong> " . htmlspecialchars($row['bodega']) . "</p>";
                echo "<a href='comprar.php?id=" . urlencode($row['id_vinos']) . "' class='btn btn-primary w-100 mt-2'>Comprar</a>";
                echo "</div></div></div>";
            }
        } else {
            echo "<p class='text-white'>No hay vinos registrados.</p>";
        }
        ?>
    </div>
</section>

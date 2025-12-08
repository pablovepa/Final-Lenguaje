<?php include("db.php"); ?>

<style>
    .vinos-section {
        background-color: #000;
        padding: 60px 0;
    }

    .vinos-section .card {
        background: rgba(255, 255, 255, 0.05);
        border: 2px solid rgba(255, 179, 32, 0.3);
        border-radius: 10px;
        backdrop-filter: blur(4px);
        transition: all 0.3s ease;
        height: 100%;
    }

    .vinos-section .card:hover {
        transform: translateY(-5px);
        border-color: rgba(255, 179, 32, 0.6);
        box-shadow: 0 8px 25px rgba(255, 179, 32, 0.3);
    }

    .vinos-section .card-img-top {
        border-radius: 10px 10px 0 0;
        height: 300px;
        object-fit: cover;
    }

    .vinos-section .card-body {
        background: rgba(0, 0, 0, 0.6);
        border-radius: 0 0 10px 10px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .vinos-section .card-title {
        color: #ffb320;
        font-weight: 600;
        font-size: 1.4rem;
    }

    .vinos-section .card-text {
        color: #fff;
        margin-bottom: 0.5rem;
    }

    .vinos-section .btn-primary {
        background: linear-gradient(135deg, #ffb320, #e6a100);
        border: none;
        color: #fff;
        font-weight: 600;
        transition: all 0.3s ease;
        margin-top: auto;
    }

    .vinos-section .btn-primary:hover {
        background: linear-gradient(135deg, #e6a100, #d49100);
        transform: scale(1.05);
        box-shadow: 0 4px 15px rgba(255, 179, 32, 0.4);
    }

    .vinos-section .col-md-4 {
        display: flex;
        margin-bottom: 30px;
    }

    .vinos-section h2 {
        color: #ffb320;
        font-weight: 700;
        text-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
        margin-bottom: 40px;
    }
</style>


<section class="vinos-section">
    <div class="container">
        <h2 class="text-center">Vinos Disponibles</h2>

        <div class="row">
    

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
    </div>
</section>

<!-- Review section -->
<style>
.offer-item {
	position: relative;
	overflow: visible;
}
.offer-item .buy-btn {
	position: absolute;
	bottom: -70px;
	left: 50%;
	transform: translateX(-50%);
	background: linear-gradient(135deg, #ffb320, #ff9800);
	color: #fff;
	padding: 12px 30px;
	border: none;
	border-radius: 50px;
	font-weight: 700;
	transition: all 0.3s ease;
	z-index: 10;
	white-space: nowrap;
	opacity: 0;
}
.offer-item:hover .buy-btn {
	opacity: 1;
}
.offer-item .buy-btn:hover {
	background: linear-gradient(135deg, #ff9800, #ffb320);
	box-shadow: 0 5px 20px rgba(255, 179, 32, 0.5);
	transform: translateX(-50%) translateY(-2px);
}
.price-container {
	display: flex;
	align-items: center;
	gap: 15px;
	margin-top: 10px;
}
.price-original {
	color: #999;
	font-size: 16px;
	text-decoration: line-through;
}
.price-discount {
	color: #ffb320;
	font-size: 24px;
	font-weight: 700;
}
.offer-item .score {
	font-size: 13px !important;
	font-weight: 700 !important;
	padding: 3px !important;
	line-height: 1.2 !important;
}
</style>

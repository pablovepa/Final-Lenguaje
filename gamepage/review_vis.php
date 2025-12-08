<?php include("db.php"); ?>

<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Vinoteca G1</title>
	<meta charset="UTF-8">
	<meta name="description" content="Vinoteca La Vid Dorada">
	<meta name="keywords" content="vinoteca, wine, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->   
	<link href="img/favicon.png" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.css"/>
	<link rel="stylesheet" href="css/style.css"/>
	<link rel="stylesheet" href="css/animate.css"/>

<style>
        .btn-primary {
            background-color: #ffb320;
            border-color: #ffb320;
            color: #fff;
        }
        .btn-primary:hover,
        .btn-primary:focus {
            background-color: #e6a100;
            border-color: #e6a100;
            color: #fff;
        }
    </style>
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	
	

	<!-- Header section -->
	<header class="header-section">
		<div class="container">
			<!-- logo -->
			<a class="site-logo" href="index_vis.php">
				<img src="img/logo.png" alt="">
			</a>
			<div class="user-panel">
				<a href="login_cli.php">Iniciar Sesion</a>
			</div>
			<div class="user-panel">
				<a href="registro_cli.php">Registrarse</a>
			</div>
			<div class="user-panel">
				<a href="login_adm.php">Administrador</a>
			</div>
			<!-- responsive -->
			<div class="nav-switch">
				<i class="fa fa-bars"></i>
			</div>
			<!-- site menu -->
			<nav class="main-menu">
				<ul>
					<li><a href="index_vis.php">Inicio</a></li>
					<li><a href="review_vis.php">Vinos</a></li>
					<li><a href="contact_vis.php">Contacto</a></li>
				</ul>
			</nav>
		</div>
	</header>
	<!-- Header section end -->
	<!-- Latest news section -->
	<div class="latest-news-section">
		<div class="ln-title">Mas Valorados</div>
		<div class="news-ticker">
			<div class="news-ticker-contant">
				<div class="nt-item"><span class="new">Espumantes</span>Vinos con burbujas naturales obtenidas por una segunda fermentación. Son frescos, ligeros y festivos.</div>
				<div class="nt-item"><span class="strategy">Dulces</span>Vinos elaborados con uvas muy maduras que conservan un alto contenido de azúcar. Son suaves, aromáticos y de sabor intenso.</div>
				<div class="nt-item"><span class="racing">Rosados</span>Vinos frescos y suaves obtenidos de uvas tintas con breve contacto con las pieles. Combinan la ligereza de los blancos con un toque frutado de los tintos.</div>
			</div>
		</div>
	</div>
	<!-- Latest news section end -->


	<!-- Page info section -->
	<section class="page-info-section set-bg" data-setbg="img/partevinos.jpg">
		<div class="pi-content">
			<div class="container">
				<div class="row">
					<div class="col-xl-5 col-lg-6 text-white">
						<div style="background-color: rgba(0, 0, 0, 0.85); padding: 20px 45px; display: inline-block; border-radius: 3px; white-space: nowrap; line-height: 1; border-left: 4px solid #ffb320; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);">
							<h2 style="letter-spacing: 3px; font-size: 55px; margin: 0; font-weight: 700; color: #ffb320;">Nuestros Vinos</h2>
						</div>
						<p style="margin-top: 25px; font-size: 20px; color: #fff; letter-spacing: 1px; line-height: 1.6;">Amplia variedad para todos los gustos y colores.</p>
					</div>
				</div>
			</div>
		</div>
	</section>

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

    .vinos-section {
        background-color: #000;
        padding: 60px 0;
    }

    .vinos-section h2 {
        color: #ffb320;
        font-weight: 700;
        letter-spacing: 2px;
        margin-bottom: 40px;
    }

    .card {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;
        background: rgba(255, 255, 255, 0.05);
        border: 2px solid rgba(255, 179, 32, 0.3);
        border-radius: 10px;
        backdrop-filter: blur(4px);
        transition: all 0.3s ease;
    }

    .card:hover {
        border-color: rgba(255, 179, 32, 0.6);
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(255, 179, 32, 0.3);
    }

    .card-img-top {
        border-radius: 10px 10px 0 0;
        height: 300px;
        object-fit: cover;
    }

    .card-body {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        background: rgba(0, 0, 0, 0.6);
        border-radius: 0 0 10px 10px;
    }

    .card-title {
        color: #ffb320;
        font-weight: 700;
        font-size: 20px;
        margin-bottom: 15px;
    }

    .card-text {
        color: #fff;
        margin-bottom: 10px;
        font-size: 14px;
    }

    .card-text strong {
        color: #ffb320;
    }

    .card .btn {
        margin-top: auto;
        background: linear-gradient(135deg, #ffb320 0%, #ff9800 100%);
        border: none;
        border-radius: 50px;
        padding: 10px 20px;
        font-weight: 700;
        transition: all 0.3s ease;
    }

    .card .btn:hover {
        background: linear-gradient(135deg, #ff9800 0%, #ffb320 100%);
        box-shadow: 0 5px 20px rgba(255, 179, 32, 0.4);
        transform: translateY(-2px);
    }

    .col-md-4 {
        display: flex;
    }
</style>




<section class="vinos-section">
    <div class="container">
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
                echo "<a href='registro_cli.php?id=" . urlencode($row['id_vinos']) . "' class='btn btn-primary w-100 mt-2'>Comprar</a>";
                echo "</div></div></div>";
            }
        } else {
            echo "<p class='text-white'>No hay vinos registrados.</p>";
        }
        ?>
    </div>
    </div>
</section>

 

	
<!-- Footer section -->
	<footer class="footer-section">
		<div class="container">
			<div class="footer-content">
				<div class="footer-logo">
					<img src="img/logo.png" alt="Vinoteca G1" style="height: 60px; margin-bottom: 15px;">
					<p style="color: #999; font-size: 14px; max-width: 300px;">Descubre los mejores vinos con la calidad y tradición que nos caracteriza.</p>
				</div>
				
				<div class="footer-links">
					<h5 style="color: #ffb320; margin-bottom: 20px; font-size: 18px;">Navegación</h5>
					<ul class="footer-menu">
						<li><a href="index_vis.php"><i class="fa fa-angle-right"></i> Inicio</a></li>
						<li><a href="review_vis.php"><i class="fa fa-angle-right"></i> Vinos</a></li>
						<li><a href="contact_vis.php"><i class="fa fa-angle-right"></i> Contacto</a></li>
					</ul>
				</div>
				
				<div class="footer-social">
					<h5 style="color: #ffb320; margin-bottom: 20px; font-size: 18px;">Síguenos</h5>
					<div class="social-links">
						<a href="#" class="social-link"><i class="fa fa-facebook"></i></a>
						<a href="#" class="social-link"><i class="fa fa-instagram"></i></a>
						<a href="#" class="social-link"><i class="fa fa-twitter"></i></a>
						<a href="#" class="social-link"><i class="fa fa-youtube"></i></a>
					</div>
					<p style="color: #999; margin-top: 15px; font-size: 13px;"><i class="fa fa-envelope"></i> info@vinotecag1.com</p>
					<p style="color: #999; font-size: 13px;"><i class="fa fa-phone"></i> +54 261 123-4567</p>
				</div>
			</div>
			
			<div class="footer-bottom">
				<p class="copyright">
					Copyright &copy;<script>document.write(new Date().getFullYear());</script> Vinoteca G1. Todos los derechos reservados.
				</p>
			</div>
		</div>
	</footer>
	<!-- Footer section end -->


	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.marquee.min.js"></script>
	<script src="js/main.js"></script>
    </body>
</html>
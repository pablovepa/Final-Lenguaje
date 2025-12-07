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
	<link href="img/logo.png" rel="shortcut icon"/>

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
	<section class="page-info-section set-bg" data-setbg="img_plus/finca.jpg">
		<div class="pi-content">
			<div class="container">
				<div class="row">
					<div class="col-xl-5 col-lg-6 text-white">
						<h2>El Horizonte</h2>
                        <p>Amplios viñedos y vistas abiertas que brindan una sensación de libertad y tranquilidad.</p>
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
                echo "<a href='registro_cli.php?id=" . urlencode($row['id_vinos']) . "' class='btn btn-primary w-100 mt-2'>Comprar</a>";
                echo "</div></div></div>";
            }
        } else {
            echo "<p class='text-white'>No hay vinos registrados.</p>";
        }
        ?>
    </div>
</section>

 

	
<!-- Footer section -->
	<footer class="footer-section">
		<div class="container">
			<ul class="footer-menu">
				<li><a href="index_vis.php">Inicio</a></li>
				<li><a href="review_vis.php">Vinos</a></li>
				<li><a href="contact_vis.php">Contacto</a></li>
			</ul>
			<p class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos los derechos reservados<i class="" aria-hidden="true"></i><a href="https://colorlib.com" target="_blank"></a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</p>
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
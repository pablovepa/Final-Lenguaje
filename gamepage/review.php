<?php include("db.php"); ?>

<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Game Warrior</title>
	<meta charset="UTF-8">
	<meta name="description" content="Game Warrior">
	<meta name="keywords" content="warrior, game, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->   
	<link href="img/favicon.ico" rel="shortcut icon"/>

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
			<a class="site-logo" href="index.html">
				<img src="img/logo.png" alt="">
			</a>
			<div class="user-panel">
				<a href="login.php">Iniciar con cuenta</a>
			</div>
			<div class="user-panel">
				<a href="registro.php">Registarse</a>
			</div>
			<!-- responsive -->
			<div class="nav-switch">
				<i class="fa fa-bars"></i>
			</div>
			<!-- site menu -->
			<nav class="main-menu">
				<ul>
					<li><a href="index.html">Inicio</a></li>
					<li><a href="review.php">Juegos</a></li>
					<li><a href="contact.html">Contacto</a></li>
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
				<div class="nt-item"><span class="new">Nuevos</span>Explora los nuevos lanzamientos.</div>
				<div class="nt-item"><span class="strategy">Estrategia</span>Pon a prueba tu mente para desafiar a tus enemigos.</div>
				<div class="nt-item"><span class="racing">Aventura</span>Se parte de una travesia unica.</div>
			</div>
		</div>
	</div>
	<!-- Latest news section end -->


	<!-- Page info section -->
	<section class="page-info-section set-bg" data-setbg="img_plus/war3.jpg">
		<div class="pi-content">
			<div class="container">
				<div class="row">
					<div class="col-xl-5 col-lg-6 text-white">
						<h2>Warhammer 40k</h2>
						<p>Una epopeya de fe, destrucción y sacrificio, donde cada batalla es una chispa más en el fuego infinito de la guerra que consume el universo.</p>
					</div>
				</div>
			</div>
		</div>
	</section>

 <?php include 'sectionreview.php'; ?>

	
<!-- Footer section -->
	<footer class="footer-section">
		<div class="container">
			<ul class="footer-menu">
				<li><a href="index.html">Inicio</a></li>
				<li><a href="review.php">Juegos</a></li>
				<li><a href="contact.html">Contacto</a></li>
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
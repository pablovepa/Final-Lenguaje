<?php include("db.php"); ?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>Vinoteca G1</title>
    <meta charset="UTF-8">
    <meta name="description" content="Game Warrior">
    <meta name="keywords" content="warrior, game, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="img/favicon.png" rel="shortcut icon"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/font-awesome.min.css"/>
    <link rel="stylesheet" href="css/owl.carousel.css"/>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/animate.css"/>


</head>
<body>


    <?php include 'header_cli.php'; ?>

    <div class="latest-news-section">
        <div class="ln-title">MAS VALORADOS</div>
        <div class="news-ticker">
            <div class="news-ticker-contant">
                <div class="nt-item"><span class="new">Espumantes</span>Vinos con burbujas naturales obtenidas por una segunda fermentación. Son frescos, ligeros y festivos.</div>
				<div class="nt-item"><span class="strategy">Dulces</span>Vinos elaborados con uvas muy maduras que conservan un alto contenido de azúcar. Son suaves, aromáticos y de sabor intenso.</div>
				<div class="nt-item"><span class="racing">Rosados</span>Vinos frescos y suaves obtenidos de uvas tintas con breve contacto con las pieles. Combinan la ligereza de los blancos con un toque frutado de los tintos.</div>
            </div>
        </div>
    </div>

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

    <?php include 'sectionreview.php'; ?>

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
						<li><a href="index_cli.php"><i class="fa fa-angle-right"></i> Inicio</a></li>
						<li><a href="review_cli.php"><i class="fa fa-angle-right"></i> Vinos</a></li>
						<li><a href="contact_cli.php"><i class="fa fa-angle-right"></i> Contacto</a></li>
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

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.marquee.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>


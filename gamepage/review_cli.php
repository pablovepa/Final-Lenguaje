<?php include("db.php"); ?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>Vinoteca G1</title>
    <meta charset="UTF-8">
    <meta name="description" content="Game Warrior">
    <meta name="keywords" content="warrior, game, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="img/favicon.ico" rel="shortcut icon"/>
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
        <div class="ln-title">Mas Valorados</div>
        <div class="news-ticker">
            <div class="news-ticker-contant">
                <div class="nt-item"><span class="new">Espumantes</span>Vinos con burbujas naturales obtenidas por una segunda fermentación. Son frescos, ligeros y festivos.</div>
				<div class="nt-item"><span class="strategy">Dulces</span>Vinos elaborados con uvas muy maduras que conservan un alto contenido de azúcar. Son suaves, aromáticos y de sabor intenso.</div>
				<div class="nt-item"><span class="racing">Rosados</span>Vinos frescos y suaves obtenidos de uvas tintas con breve contacto con las pieles. Combinan la ligereza de los blancos con un toque frutado de los tintos.</div>
            </div>
        </div>
    </div>

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
        </div>
    </section>

    <?php include 'sectionreview.php'; ?>

    <footer class="footer-section">
        <div class="container">
            <ul class="footer-menu">
                <li><a href="index_cli.php">Inicio</a></li>
                <li><a href="review_cli.php">Vinos</a></li>
                <li><a href="contact_cli.php">Contacto</a></li>
            </ul>
            <p class="copyright">
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos los derechos reservados
            </p>
        </div>
    </footer>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.marquee.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>


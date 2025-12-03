<?php include("db.php"); ?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>Game Warrior</title>
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


    <?php include 'headeradm.php'; ?>

    <div class="latest-news-section">
        <div class="ln-title">Mas Valorados</div>
        <div class="news-ticker">
            <div class="news-ticker-contant">
                <div class="nt-item"><span class="new">Nuevos</span>Explora los nuevos lanzamientos.</div>
                <div class="nt-item"><span class="strategy">Estrategia</span>Pon a prueba tu mente para desafiar a tus enemigos.</div>
                <div class="nt-item"><span class="racing">Aventura</span>Se parte de una travesía única.</div>
            </div>
        </div>
    </div>

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

    <footer class="footer-section">
        <div class="container">
            <ul class="footer-menu">
                <li><a href="indexadm.php">Inicio</a></li>
                <li><a href="reviewadm.php">Juegos</a></li>
                <li><a href="contactadm.php">Contacto</a></li>
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


<?php
session_start();

// Si no hay usuario logueado, redirige al login
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

$usuario = $_SESSION['usuario'];
$tipo = $_SESSION['tipo'];
?>

<header class="header-section">
    <div class="container">
        <!-- logo -->
        <a class="site-logo" href="index.php">
            <img src="img/logo.png" alt="">
        </a>
		<div class="d-flex justify-content-end align-items-center">
    		<div class="user-panel me-3 px-3 py-1 bg-dark text-white rounded-pill">
        		<i class="fa fa-user-circle"></i> <?php echo htmlspecialchars($usuario); ?>
    		</div>
    		<a href="logout.php" class="btn btn-warning btn-sm rounded-pill">Cerrar sesión</a>
        		
   			</a>
		</div>

		<!-- responsive -->
		<div class="nav-switch">
			<i class="fa fa-bars"></i>
		</div>

		<!-- site menu -->
		<nav class="main-menu">
			<ul>
				<li><a href="index.php">Inicio</a></li>
				<li><a href="reviewu.php">Vinos</a></li>
				<li><a href="contact.php">Contacto</a></li>
				<li><a href="../gestion.php">Gestion</a></li>
			</ul>
		</nav>
	</div>
</header>
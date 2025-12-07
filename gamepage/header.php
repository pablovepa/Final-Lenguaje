<?php
// Mostrar usuario si está logueado, pero sin redirigir
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}
$usuario = $_SESSION['usuario'] ?? 'Invitado';
?>

<header class="header-section">
	<div class="container">
		<!-- logo -->
		<a class="site-logo" href="index.php">
			<img src="img/logo.png" alt="">
		</a>
		<!-- botones/estado a la derecha -->
		<div class="user-panel">
			<a href="logout.php">Cerrar sesión</a>
		</div>
		<div class="user-panel">
			<a href="#">👤 <?php echo htmlspecialchars($usuario); ?></a>
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
				<li><a href="/Final-Lenguaje/Final-Lenguaje/crud_tipo/gestion.php">Gestion</a></li>
			</ul>
		</nav>
	</div>
</header>
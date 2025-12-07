<?php
session_start();

// Si no está logueado, redirigimos
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

$usuario = $_SESSION['usuario'];
$tipo = $_SESSION['tipo'];
?>

<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Panel de Gestión</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../gamepage/css/font-awesome.min.css">
  <link rel="stylesheet" href="../gamepage/css/style.css">
</head>
<body class="bg-light">

<!-- Header section (igual al sitio) -->
<header class="header-section">
  <div class="container">
    <a class="site-logo" href="../gamepage/index_vis.php">
      <img src="../gamepage/img/logo.png" alt="">
    </a>
    <div class="user-panel">
      <a href="logout.php">Cerrar sesión</a>
    </div>
    <div class="user-panel">
      <a href="gestion.php">Panel</a>
    </div>
    <div class="nav-switch">
      <i class="fa fa-bars"></i>
    </div>
    <nav class="main-menu">
      <ul>
        <li><a href="../gamepage/index_vis.php">Inicio</a></li>
        <li><a href="../gamepage/review_vis.php">Vinos</a></li>
        <li><a href="../gamepage/contact_vis.php">Contacto</a></li>
      </ul>
    </nav>
  </div>
</header>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow p-4">
        <h4 class="text-center mb-4">Selecciona qué deseas gestionar</h4>
        <div class="d-grid gap-3">
          <a href="indexu.php" class="btn btn-primary btn-lg">Gestionar Usuarios</a>
          <a href="indexvinos.php" class="btn btn-primary btn-lg">Gestionar Vino</a>
          <a href="index.php" class="btn btn-secondary btn-lg">Gestionar Tipos de Usuario</a>
          <a href="../gamepage/index.php" class="btn btn-secondary btn-lg">Vinoteca G1</a>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>

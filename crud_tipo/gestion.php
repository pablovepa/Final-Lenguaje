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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <span class="navbar-brand">Panel de Gestión</span>
    <div class="d-flex text-white">
      <span class="me-3">👤 <?php echo htmlspecialchars($usuario); ?> (<?php echo htmlspecialchars($tipo); ?>)</span>
      <a href="logout.php" class="btn btn-outline-light btn-sm">Cerrar sesión</a>
    </div>
  </div>
</nav>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow p-4">
        <h4 class="text-center mb-4">Selecciona qué deseas gestionar</h4>
        <div class="d-grid gap-3">
          <a href="indexu.php" class="btn btn-primary btn-lg">Gestionar Usuarios</a>
          <a href="games.php" class="btn btn-primary btn-lg">Gestionar Vino</a>
          <a href="index.php" class="btn btn-secondary btn-lg">Gestionar Tipos de Usuario</a>
          <a href="/final_lenguaje/gamepage/indexadm.php" class="btn btn-secondary btn-lg">Game Page</a>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>

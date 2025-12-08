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

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Panel de Gestión - Vinoteca G1</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../gamepage/img/logo.png" rel="shortcut icon"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../gamepage/css/font-awesome.min.css">
    <link rel="stylesheet" href="../gamepage/css/style.css">
    <style>
        body {
            background: url('../gamepage/img/pruebalogin.jpg') no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            font-family: 'Roboto', sans-serif;
        }
        .content-wrapper {
            padding-top: 120px;
            padding-bottom: 50px;
        }
        .gestion-card {
            max-width: 600px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.05);
            padding: 50px;
            border-radius: 15px;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            backdrop-filter: blur(4px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }
        .gestion-card h4 {
            color: #ffb320;
            font-weight: 700;
            letter-spacing: 2px;
            margin-bottom: 30px;
            text-transform: uppercase;
            text-align: center;
        }
        .welcome-text {
            color: #fff;
            text-align: center;
            margin-bottom: 30px;
            font-size: 16px;
        }
        .site-btn {
            background: linear-gradient(135deg, #ffb320 0%, #ff9800 100%);
            color: #fff;
            font-weight: 700;
            letter-spacing: 1px;
            border-radius: 50px;
            padding: 15px 30px;
            width: 100%;
            border: none;
            text-decoration: none;
            display: block;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            font-size: 14px;
            margin-bottom: 15px;
        }
        .site-btn:hover {
            background: linear-gradient(135deg, #ff9800 0%, #ffb320 100%);
            box-shadow: 0 5px 20px rgba(255, 179, 32, 0.4);
            transform: translateY(-2px);
            color: #fff;
            text-decoration: none;
        }
        .site-btn.secondary {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.2) 0%, rgba(255, 255, 255, 0.1) 100%);
        }
        .site-btn.secondary:hover {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.3) 0%, rgba(255, 255, 255, 0.2) 100%);
        }
        .logo-container {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo-container img {
            max-width: 120px;
            height: auto;
        }
    </style>
</head>
<body>

<!-- Header section -->
<header class="header-section">
    <div class="container">
        <a class="site-logo" href="../gamepage/index_vis.php">
            <img src="../gamepage/img/Logo.png" alt="">
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

<div class="content-wrapper">
    <div class="container">
        <div class="gestion-card">
            <div class="logo-container">
                <img src="../gamepage/img/logo.png" alt="Vinoteca G1">
            </div>
            <h4>Panel de Gestión</h4>
            <p class="welcome-text">Bienvenido, <strong><?php echo htmlspecialchars($usuario); ?></strong></p>
            
            <div class="d-grid gap-2">
                <a href="indexu.php" class="site-btn">Gestionar Usuarios</a>
                <a href="indexvinos.php" class="site-btn">Gestionar Vinos</a>
                <a href="index.php" class="site-btn">Gestionar Tipos de Usuario</a>
                <a href="../gamepage/index.php" class="site-btn secondary">Ir a Vinoteca G1</a>
            </div>
        </div>
    </div>
</div>

<script src="../gamepage/js/jquery-3.2.1.min.js"></script>
<script src="../gamepage/js/bootstrap.min.js"></script>
<script src="../gamepage/js/main.js"></script>

</body>
</html>

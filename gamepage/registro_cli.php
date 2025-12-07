<?php
session_start();
include __DIR__ . '/../crud_tipo/db.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Registrarse</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="img/logo.png" rel="shortcut icon"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/font-awesome.min.css"/>
    <link rel="stylesheet" href="css/style.css"/>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .login-card {
            max-width: 500px;
            margin: auto;
            margin-top: 80px;
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .login-card input {
            margin-bottom: 20px;
        }
        .site-btn {
            background-color: #ffa500;
            color: #fff;
            font-weight: 600;
            border-radius: 50px;
            padding: 10px 20px;
            width: 100%;
            border: none;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            margin-bottom: 10px;
        }
        .site-btn:hover {
            background-color: #e69500;
            color: #fff;
        }
    </style>
</head>

<body>

<div class="login-card">
    <div class="text-center mb-3">
        <img src="img/logo.png" alt="Vinoteca G1" style="max-width:120px; height:auto; display:inline-block;">
    </div>
    <h4 class="text-center mb-4">Registrarse</h4>

    <form method="post" action="/Final-Lenguaje/crud_tipo/Usuarios/savecli.php">
        <input type="text" name="usuario" class="form-control" placeholder="Nombre de usuario" required>
        <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
        <input type="text" name="nombre_usuario" class="form-control" placeholder="Ingrese su nombre" required>
        <input type="email" name="email" class="form-control" placeholder="Ingrese su Email" required>
        <input type="text" name="telefono" class="form-control" placeholder="Ingrese su Teléfono" required>
        <button class="site-btn" type="submit" name="guardar_registro">Registrarse</button>
        <a href="index_vis.php" class="site-btn">Volver</a>
    </form>
</div>

</body>
</html>
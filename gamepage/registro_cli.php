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
    <link href="img/favicon.png" rel="shortcut icon"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/font-awesome.min.css"/>
    <link rel="stylesheet" href="css/style.css"/>
    <style>
        body {
            background: url('img/pruebalogin.jpg') no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Roboto', sans-serif;
        }
        .login-card {
            max-width: 500px;
            width: 100%;
            background: rgba(255, 255, 255, 0.05);
            padding: 50px;
            border-radius: 15px;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            backdrop-filter: blur(4px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            margin: 20px;
        }
        .login-card h4 {
            color: #ffb320;
            font-weight: 700;
            letter-spacing: 2px;
            margin-bottom: 30px;
            text-transform: uppercase;
        }
        .login-card input {
            margin-bottom: 20px;
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: #fff;
            padding: 12px 15px;
            border-radius: 5px;
            font-size: 15px;
        }
        .login-card input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }
        .login-card input:focus {
            background-color: rgba(255, 255, 255, 0.15);
            border-color: #ffb320;
            color: #fff;
            box-shadow: 0 0 10px rgba(255, 179, 32, 0.3);
        }
        .site-btn {
            background: linear-gradient(135deg, #ffb320 0%, #ff9800 100%);
            color: #fff;
            font-weight: 700;
            letter-spacing: 1px;
            border-radius: 50px;
            padding: 12px 30px;
            width: 100%;
            border: none;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            font-size: 14px;
            margin-bottom: 10px;
        }
        .site-btn:hover {
            background: linear-gradient(135deg, #ff9800 0%, #ffb320 100%);
            box-shadow: 0 5px 20px rgba(255, 179, 32, 0.4);
            transform: translateY(-2px);
            color: #fff;
            text-decoration: none;
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
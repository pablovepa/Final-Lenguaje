<?php
session_start();
include __DIR__ . '/../crud_tipo/db.php';

$error = '';
$valor_usuario = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario = trim($_POST['usuario'] ?? '');
    $password = $_POST['password'] ?? '';

    $valor_usuario = htmlspecialchars($usuario, ENT_QUOTES, 'UTF-8');

    if ($usuario === '' || $password === '') {
        $error = "Completa usuario y contraseña.";
    } else {
        $stmt = mysqli_prepare($conn, "SELECT id, usuario, password, tipo_usuario FROM tbl_usuarios WHERE usuario = ?");
        mysqli_stmt_bind_param($stmt, "s", $usuario);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $fila = mysqli_fetch_assoc($result);

        if ($fila && ($password === $fila['password'] || password_verify($password, $fila['password']))) {
            $_SESSION['usuario'] = $fila['usuario'];
            $_SESSION['tipo'] = $fila['tipo_usuario'];
            header("Location: index_cli.php");
            if ($fila['tipo_usuario'] == 1) {
                header("Location: index_cli.php");
                exit();
            }
        } else {
            $error = "Usuario o contraseña incorrectos.";
        }
        mysqli_stmt_close($stmt);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Iniciar Sesión</title>
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
        }
        .site-btn:hover {
            background: linear-gradient(135deg, #ff9800 0%, #ffb320 100%);
            box-shadow: 0 5px 20px rgba(255, 179, 32, 0.4);
            transform: translateY(-2px);
            color: #fff;
            text-decoration: none;
        }
        .alert {
            background-color: rgba(220, 53, 69, 0.3);
            border: 1px solid rgba(220, 53, 69, 0.5);
            color: #fff;
            border-radius: 5px;
        }
    </style>
</head>

<body>

<div class="login-card">
    <div class="text-center mb-3">
        <img src="img/logo.png" alt="Vinoteca G1" style="max-width:120px; height:auto; display:inline-block;">
    </div>
    <h4 class="text-center mb-4">Iniciar sesión</h4>

    <?php if ($error): ?>
        <div class="alert alert-danger text-center"><?php echo $error; ?></div>
    <?php endif; ?>

    <form method="post" action="login_cli.php">
        <input type="text" name="usuario" class="form-control" placeholder="Nombre de usuario" value="<?php echo $valor_usuario; ?>" required>
        <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
        <button class="site-btn" type="submit">Iniciar</button>
    </form>

    <div class="mt-3">
        <a href="registro_cli.php" class="site-btn">Registrarse</a>
    </div>
    <div class="mt-3">
        <a href="index_vis.php" class="site-btn">Volver</a>
                </div>
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>



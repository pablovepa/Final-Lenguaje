<?php
session_start();
include 'db.php';

// Inicializo variables para no recibir warnings
$error = '';
$valor_usuario = '';

// Si llegó por POST procesamos
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Usar null coalescing para evitar notice si no existe
    $usuario = trim($_POST['usuario'] ?? '');
    $password = $_POST['password'] ?? '';

    $valor_usuario = htmlspecialchars($usuario, ENT_QUOTES, 'UTF-8');

    if ($usuario === '' || $password === '') {
        $error = "Completa usuario y contraseña.";
    } else {
        // Prepared statement para evitar SQL injection
        $stmt = mysqli_prepare($conn, "SELECT id, usuario, password, tipo_usuario FROM tbl_usuarios WHERE usuario = ?");
        mysqli_stmt_bind_param($stmt, "s", $usuario);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $fila = mysqli_fetch_assoc($result);
        if ($fila && ($password === $fila['password'] || password_verify($password, $fila['password']))) {
    // Verificamos si el tipo de usuario es cliente (10) aca preguntarle al nacho si va asi porque si no los clientes se loguean aunque no sean adms.
    if ($fila['tipo_usuario'] == 2 ) {
        $error = "Usuario o contraseña incorrectos.";
    } else {
        // Login correcto
        $_SESSION['usuario'] = $fila['usuario'];
        $_SESSION['tipo'] = $fila['tipo_usuario'];
        header("Location: gestion.php"); // o la página principal del CRUD
        exit();
    }
} else {
    $error = "Usuario o contraseña incorrectos.";
}

    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Login Administrador - Vinoteca G1</title>
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
        .login-card label {
            color: #fff;
            font-weight: 500;
            margin-bottom: 8px;
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
            outline: none;
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

<div class="login-card">
    <div class="logo-container">
        <img src="../gamepage/img/logo.png" alt="Vinoteca G1">
    </div>
    <h4 class="text-center">Login Administrador</h4>

    <?php if ($error): ?>
        <div class="alert alert-danger text-center"><?php echo $error; ?></div>
    <?php endif; ?>

    <form method="post" action="login.php">
        <div class="mb-3">
            <label class="form-label">Usuario</label>
            <input type="text" name="usuario" class="form-control" value="<?php echo $valor_usuario; ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Contraseña</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button class="site-btn" type="submit">Ingresar</button>
    </form>
</div>

</body>
</html>
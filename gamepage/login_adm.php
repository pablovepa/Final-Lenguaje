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
            header("Location: index.php");
            if ($fila['tipo_usuario'] == 1) {
                header("Location: /Final-Lenguaje/Final-Lenguaje/crud_tipo/gestion.php");
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
    <title>Iniciar Sesión como Administrador</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="img/favicon.ico" rel="shortcut icon"/>
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
        }
        .site-btn:hover {
            background-color: #e69500;
            color: #fff;
        }
    </style>
</head>

<body>

<div class="login-card">
    <h4 class="text-center mb-4">Iniciar sesión</h4>

    <?php if ($error): ?>
        <div class="alert alert-danger text-center"><?php echo $error; ?></div>
    <?php endif; ?>

    <form method="post" action="login_adm.php">
        <input type="text" name="usuario" class="form-control" placeholder="Nombre de usuario" value="<?php echo $valor_usuario; ?>" required>
        <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
        <button class="site-btn" type="submit">Iniciar</button>
        <div class="mt-3">
        <a href="index_vis.php" class="site-btn">Volver</a>
    </div>
    </form>

    



<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>



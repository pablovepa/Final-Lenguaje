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

<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-4">
      <div class="card p-4 shadow">
        <h4 class="text-center mb-3">Iniciar sesión</h4>
        <?php if ($error): ?>
          <div class="alert alert-danger"><?php echo $error; ?></div>
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
          <button class="btn btn-primary w-100" type="submit">Ingresar</button>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>
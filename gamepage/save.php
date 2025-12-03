<?php
include("db.php");

if (isset($_POST['guardar_registro'])) {
    // Capturamos los datos del formulario
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $nombre_usuario = $_POST['nombre_usuario'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    $tipo_usuario = 2; //con esto declaro que es un cliente el que se registra

    // $password = password_hash($password, PASSWORD_DEFAULT);

    // Armamos el INSERT (sin especificar id, porque es AUTO_INCREMENT)
    $query = "INSERT INTO tbl_usuarios (usuario, password, tipo_usuario, nombre_usuario, email, telefono)
              VALUES ('$usuario', '$password', '$tipo_usuario', '$nombre_usuario', '$email', '$telefono')";

    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Fallo en el query: " . mysqli_error($conn));
    } else {
        echo "<script>alert('Registro exitoso. Ya puedes iniciar sesión.'); window.location='login.php';</script>";
    }
}
?>
<?php
include __DIR__ . '/../db.php';

if (isset($_POST['guardar_registro'])) {

    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $nombre_usuario = $_POST['nombre_usuario'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    // Tipo fijo para CLIENTE — NO viene del formulario
    $tipo_usuario = 2; // ID del tipo cliente en tu tabla tbl_tipos_usuarios

    $query = "INSERT INTO tbl_usuarios (usuario, password, tipo_usuario, nombre_usuario, email, telefono)
              VALUES ('$usuario', '$password', '$tipo_usuario', '$nombre_usuario', '$email', '$telefono')";

    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Fallo en el query: " . mysqli_error($conn));
    } else {
        echo "<script>alert('Registro Guardado'); window.location='/Final-Lenguaje/Final-Lenguaje/gamepage/index_vis.php';</script>";
    }
}
?>

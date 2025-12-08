<?php
include __DIR__ . '/../db.php';

if (isset($_POST['guardar_registro'])) {
    // Capturamos los datos del formulario
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $tipo_usuario = $_POST['tipo_usuario'];
    $nombre_usuario = $_POST['nombre_usuario'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $pais = $_POST['pais']; // Valor por defecto para el campo pais
  

    // (Opcional) encriptar contraseña
    // $password = password_hash($password, PASSWORD_DEFAULT);

    // Armamos el INSERT (sin especificar id, porque es AUTO_INCREMENT)
    $query = "INSERT INTO tbl_usuarios (usuario, password, tipo_usuario, nombre_usuario, email, telefono, pais)
              VALUES ('$usuario', '$password', '$tipo_usuario', '$nombre_usuario', '$email', '$telefono', '$pais')";

    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Fallo en el query: " . mysqli_error($conn));
    } else {
        echo "<script>alert('Registro Guardado'); window.location='../indexu.php';</script>";
    }
}
?>
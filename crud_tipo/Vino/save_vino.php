<?php
include __DIR__ . '/../db.php';


if (isset($_POST['guardar_registro'])) {
    $nombrevino = $_POST['nombrevino'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $id_tipos = $_POST['id_tipos'];
    $id_bodegas = $_POST['id_bodegas'];
    $id_proveedores = $_POST['id_proveedores'];

    // Insert sin id_vinos porque es AUTO_INCREMENT
    $query = "INSERT INTO vinos (nombrevino, precio, stock, id_tipos, id_bodegas, id_proveedores) 
              VALUES ('$nombrevino', '$precio', '$stock', '$id_tipos', '$id_bodegas', '$id_proveedores')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: games.php"); // Redirige después de guardar
        exit;
    } else {
        echo "Error al guardar el vino: " . mysqli_error($conn);
    }
}
?>
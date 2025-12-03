<?php
include("db.php");

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $query = "SELECT imagen, nombre FROM imagenes WHERE id_imagenes = $id LIMIT 1";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {

        $ext = strtolower(pathinfo($row['nombre'], PATHINFO_EXTENSION));
        
        switch ($ext) {
            case 'jpg':
            case 'jpeg':
                $mime = 'image/jpeg';
                break;
            case 'png':
                $mime = 'image/png';
                break;
            case 'gif':
                $mime = 'image/gif';
                break;
            case 'webp':
                $mime = 'image/webp';
                break;
            default:
                $mime = 'application/octet-stream';
        }

        header("Content-Type: $mime");
        echo $row['imagen'];
        exit;
    }
}

echo "Imagen no encontrada";
?>

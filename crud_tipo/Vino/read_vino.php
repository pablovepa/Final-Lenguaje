<?php include("includes/header_vino.php"); ?>
<?php include("db.php"); ?>

<div class="card text-center">
    <div class="card-body">
        <h1 class="card-title">LEER DATOS</h1>
        <p class="card-text">Los siguientes son los datos guardados hasta el momento:</p>
    </div>
</div>

<div class="container p-4">

<?php
if (isset($_GET['mensaje'])) {
    echo "<div class='alert alert-success text-center'>" . htmlspecialchars($_GET['mensaje']) . "</div>";
}
?>
<h2 class="text-center mb-4">Lista de Vinos</h2>

<div class="row">
<?php
$query = "
SELECT 
    v.nombrevino,
    v.precio,
    v.stock,
    t.nombre AS tipo,
    b.nombre_bodega,
    p.nombre AS proveedor
FROM vinos v
JOIN tipos t ON v.id_tipos = t.id_tipos
JOIN bodegas b ON v.id_bodegas = b.id_bodegas
JOIN proveedores p ON v.id_proveedores = p.id_proveedores
";

$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='col-md-4 mb-4'>";
        echo "<div class='card shadow'>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'>{$row['nombrevino']}</h5>";
        echo "<p class='card-text'>
                <strong>Tipo:</strong> {$row['tipo']}<br>
                <strong>Bodega:</strong> {$row['nombre_bodega']}<br>
                <strong>Proveedor:</strong> {$row['proveedor']}<br>
                <strong>Precio:</strong> ${$row['precio']}<br>
                <strong>Stock:</strong> {$row['stock']}
              </p>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "<p class='text-center'>No hay vinos registrados.</p>";
}
?>
</div>

<?php include("includes/footer.php"); ?>

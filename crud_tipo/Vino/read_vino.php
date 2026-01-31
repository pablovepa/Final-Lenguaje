<?php include __DIR__ . '/../includes/headervino.php'; ?>
<?php include __DIR__ . '/../db.php'; ?>

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
    p.nombre AS proveedor,
    o.nombre AS origen,
    e.nombre AS envase,
    e.tamaño AS tamaño,
    v.posible_proveedor AS posible_proveedor
FROM vinos v
LEFT JOIN tipos t ON v.id_tipos = t.id_tipos
LEFT JOIN bodegas b ON v.id_bodegas = b.id_bodegas
LEFT JOIN proveedores p ON v.id_proveedores = p.id_proveedores
LEFT JOIN origen o ON v.id_origen = o.id_origen
LEFT JOIN envase e ON v.id_envase = e.id_envase


ORDER BY v.nombrevino ASC
";

$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='col-md-4 mb-4'>";
        echo "<div class='card shadow'>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'>" . htmlspecialchars($row['nombrevino']) . "</h5>";
        
        echo "<p class='card-text'>
                <strong>Tipo:</strong> " . htmlspecialchars($row['tipo'] ?? 'Sin tipo') . "<br>
                <strong>Bodega:</strong> " . htmlspecialchars($row['nombre_bodega'] ?? 'Sin bodega') . "<br>
                <strong>Proveedor:</strong> " . htmlspecialchars($row['proveedor'] ?? 'Sin proveedor') . "<br>
                <strong>envase:</strong> " . htmlspecialchars($row['envase'] ?? 'Sin envase') . "<br>
                <strong>tamaño:</strong> " . htmlspecialchars($row['tamaño'] ?? 'Sin tamaño') . "<br>
                <strong>Precio:</strong> $" . number_format($row['precio'], 2) . "<br>
                <strong>Stock:</strong> " . htmlspecialchars($row['stock']) . "<br>
                <strong>Posible_Proveedor:</strong> " . htmlspecialchars($row['posible_proveedor'] ?? 'Sin posible proveedor') . "<br>
                <strong>Origen:</strong> " . htmlspecialchars($row['origen'] ?? 'Sin origen') . 
                "
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
</div>
<div class="card-body">
    <form action="../indexvinos.php" method="POST">
<input type="submit" class="btn btn-success" value="Volver"> </div>
            </div>

<?php include __DIR__ . '/../includes/footer.php'; ?>

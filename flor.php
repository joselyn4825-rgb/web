<?php
// Lista de productos con sus precios
$productos = [
    "Romantic Names" => 640.00,
    "Whispers of Love" => 620.00,
    "Heart of Roses" => 589.00,
    "Eternal Tenderness" => 1340.00,
    "Petal Charm" => 2899.00,
    "Kisses in Bloom" => 1299.00,
    "Loving Embrace" => 3500.00,
    "Velvet Romance" => 4289.00,
    "Rose Petal Dreams" => 1840.00,
    "Whispers of the Heart" => 340.00,
    "Scent of Love" => 620.00,
    "Timeless Passion" => 689.00,
    "Cherry Blossom Kiss" => 540.00,
    "Moonlight Serenade" => 540.00,
    "Orchid" => 689.00,
    "Bloom Bliss" => 250.00,
    "Petal Kiss" => 250.00,
    "Sunshine Charm" => 570.00,
    "Petunias" => 250.00
];

// Obtener datos del formulario
$cliente = $_POST['cliente'] ?? '';
$total = 0;
$ticket = "<h2>Ticket de Compra</h2>";
$ticket .= "<p><strong>Número de cliente:</strong> " . htmlspecialchars($cliente) . "</p>";
$ticket .= "<table border='1' cellpadding='10'><tr><th>Producto</th><th>Cantidad</th><th>Subtotal</th></tr>";

$index = 0;
foreach ($productos as $nombre => $precio) {
    $cantidad = isset($POST["cantidad$index"]) ? intval($POST["cantidad$index"]) : 0;
    if ($cantidad > 0) {
        $subtotal = $cantidad * $precio;
        $total += $subtotal;
        $ticket .= "<tr>
                        <td>$nombre</td>
                        <td>$cantidad</td>
                        <td>S/ " . number_format($subtotal, 2) . "</td>
                    </tr>";
    }
    $index++;
}

$ticket .= "</table><h3>Total: S/ " . number_format($total, 2) . "</h3>";

// Mostrar el ticket
echo "<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <title>Ticket de Compra</title>
</head>
<body>
    $ticket
    <br><a href='../html/catalogo.html'>Volver al catálogo</a>
</body>
</html>";
?>
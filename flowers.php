<?php
echo '<link rel="icon" href="../imagenes/flor12.ico">';
$Romantic = isset($_POST['Romantic']) ? (int)$_POST['Romantic'] : 0;
$Whispers = isset($_POST['Whispers']) ? (int)$_POST['Whispers'] : 0;
$Heart = isset($_POST['Heart']) ? (int)$_POST['Heart'] : 0;
$Eternal = isset($_POST['Eternal']) ? (int)$_POST['Eternal'] : 0;
$Petal  = isset($_POST['Petal']) ? (int)$_POST['Petal'] : 0;
$Kisses = isset($_POST['Kisses']) ? (int)$_POST['Kisses'] : 0;
$Loving = isset($_POST['Loving']) ? (int)$_POST['Loving'] : 0;
$Velvet = isset($_POST['Velvet']) ? (int)$_POST['Velvet'] : 0;
$Rose = isset($_POST['Rose']) ? (int)$_POST['Rose'] : 0;
$Whisperss = isset($_POST['Whisperss']) ? (int)$_POST['Whisperss'] : 0;
$Scent = isset($_POST['Scent']) ? (int)$_POST['Scent'] : 0;
$Timeless = isset($_POST['Timeless']) ? (int)$_POST['Timeless'] : 0;
$Cherry = isset($_POST['Cherry']) ? (int)$_POST['Cherry'] : 0;
$Moonlight = isset($_POST['Moonlight']) ? (int)$_POST['Moonlight'] : 0;
$Orchid = isset($_POST['Orchid']) ? (int)$_POST['Orchid'] : 0;
$Bloom = isset($_POST['Bloom']) ? (int)$_POST['Bloom'] : 0;
$Petale = isset($_POST['Petale']) ? (int)$_POST['Petale'] : 0;
$Sunshine = isset($_POST['Sunshine']) ? (int)$_POST['Sunshine'] : 0;
$Petunias = isset($_POST['Petunias']) ? (int)$_POST['Petunias'] : 0;
$email = isset($_POST['email']) ? htmlspecialchars($_POST["email"]) : "";

$precioRomantic = 640;
$precioWhispers = 620;
$precioHeart = 589;
$precioEternal = 1340;
$precioPetal = 2899;
$precioKisses = 1299;
$precioLoving = 3500;
$precioVelvet = 4289;
$precioRose  = 1840;
$precioWhisperss = 340;
$precioScent = 620;
$precioTimeless = 689;
$precioCherry = 540;
$precioMoonlight = 540;
$precioOrchid = 689;
$precioBloom = 250;
$precioPetale = 250;
$precioSunshine = 570;
$precioPetunias = 250;


$totalSinDescuento = ($Romantic * $precioRomantic) + ($Whispers * $precioWhispers) + ($Heart* $precioHeart) + ($Eternal * $precioEternal) + ($Petal * $precioPetal) + ($Kisses * $precioKisses) + ($Loving * $precioLoving) + ($Velvet * $precioVelvet)+ ($Rose* $precioRose)  + ($Whisperss * $precioWhisperss)+ ($Scent * $precioScent)  + ($Timeless * $precioTimeless) + ($Cherry * $precioCherry) + ($Moonlight * $precioMoonlight) + ($Orchid * $precioOrchid) + ($Bloom * $precioBloom) + ($Petale * $precioPetale) + ($Sunshine * $precioSunshine)+ ($Petunias * $precioPetunias);
$cantidadTotal =  $Romantic + $Whispers + $Heart + $Eternal + $Petal  + $Kisses  + $Loving  + $Velvet + $Rose  + $Whisperss + $Scent   + $Timeless  + $Cherry  + $Moonlight + $Orchid + $Bloom  + $Petale + $Sunshine + $Petunias;
$porcentajeDescuento = $cantidadTotal < 3 ? 0.10 : 0.20;

$descuento = $totalSinDescuento * $porcentajeDescuento;
$totalConDescuento = $totalSinDescuento - $descuento;


echo "<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <title>Ticket de Compra</title>
    <link rel='stylesheet' href='../css/flores.css'>
</head>
<body>
    <h1>Ticket de Compra</h1>
    <div class='ticket'>
    <p><strong>Correo del cliente:</strong> $email</p><br>";

function mostrarProducto($nombre, $cantidad, $precio) {
    if ($cantidad > 0) {
        echo "<p>Flores $nombre x$cantidad = $" . ($cantidad * $precio) . "</p>";
    }
}

mostrarProducto("Romantic", $Romantic, $precioRomantic);
mostrarProducto("Whispers", $Whispers, $precioWhispers);
mostrarProducto("Heart", $Heart, $precioHeart);
mostrarProducto("Eternal", $Eternal, $precioEternal);
mostrarProducto("Petal", $Petal, $precioPetal);
mostrarProducto("Kisses", $Kisses, $precioKisses);
mostrarProducto("Loving", $Loving, $precioLoving);
mostrarProducto("Velvet", $Velvet, $precioVelvet);
mostrarProducto("Rose", $Rose, $precioRose);
mostrarProducto("Whisperss", $Whisperss, $precioWhisperss);
mostrarProducto("Scent", $Scent, $precioScent);
mostrarProducto("Timeless", $Timeless, $precioTimeless);
mostrarProducto("Cherry", $Cherry, $precioCherry);
mostrarProducto("Moonlight", $Moonlight, $precioMoonlight);
mostrarProducto("Orchid", $Orchid, $precioOrchid);
mostrarProducto("Bloom", $Bloom, $precioBloom);
mostrarProducto("Petale", $Petale, $precioPetale);
mostrarProducto("Sunshine", $Sunshine, $precioSunshine);
mostrarProducto("Petunias", $Petunias, $precioPetunias);

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$db = "bloom";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}


$stmt = $conn->prepare("SELECT email FROM clientes WHERE email= ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $stmt_insert = $conn->prepare("INSERT INTO ventas (
        email, total, romantic, whispers, hearth, eternal, petal, kisses, loving, velvet, rose,
        whisperss, scentt, timeles, cherry, moonlight, orchid, bloom, kis, sunshine, petunias
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt_insert->bind_param("siiiiiiiiiiiiiiiiiiii",
        $email, $totalConDescuento, $Romantic, $Whispers, $Heart, $Eternal, $Petal, $Kisses, $Loving, $Velvet, $Rose,
        $Whisperss, $Scent, $Timeless, $Cherry, $Moonlight, $Orchid, $Bloom, $Petale, $Sunshine, $Petunias
    );

    if ($stmt_insert->execute()) {
        echo "<p>Venta registrada exitosamente.</p>";
    } else {
        echo "<p>Error al insertar la venta: " . $stmt_insert->error . "</p>";
    }
    $stmt_insert->close();
} else {
    echo "<p>El correo no está registrado. No se puede insertar la venta.</p>";
}

$stmt->close();
$conn->close();

echo "<hr>
    <p>Subtotal: $" . number_format($totalSinDescuento, 2) . "</p>
    <p>Descuento (" . ($porcentajeDescuento * 100) . "%): -$" . number_format($descuento, 2) . "</p>
    <p><strong>Total a Pagar: $" . number_format($totalConDescuento, 2) . "</strong></p>
    <buttton><a href='../index.php'>Volver a la tienda</a></buttton>
    </div>
</body>
</html>";
?>

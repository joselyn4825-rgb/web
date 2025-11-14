<?php

echo '<title> Actualización </title>';
echo '<link rel="icon" href="../imagenes/flor12.ico">';
echo '<link rel="stylesheet" type="text/css" href="../css/petu.css" />';
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$db = "bloom";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $db);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$email = isset($_POST['email']) ? htmlspecialchars(trim($_POST['email'])) : "";

// Función para valores enteros seguros
function getInt($key) {
    return isset($_POST[$key]) ? (int)$_POST[$key] : 0;
}


$Romantic = getInt('Romantic');
$Whispers = getInt('Whispers');
$Heart = getInt('Heart');
$Eternal = getInt('Eternal');
$Petal = getInt('Petal');
$Kisses = getInt('Kisses');
$Loving = getInt('Loving');
$Velvet = getInt('Velvet');
$Rose = getInt('Rose');
$Whisperss = getInt('Whisperss');
$Scent = getInt('Scent');
$Timeless = getInt('Timeless');
$Cherry = getInt('Cherry');
$Moonlight = getInt('Moonlight');
$Orchid = getInt('Orchid');
$Bloom = getInt('Bloom');
$Petale = getInt('Petale');
$Sunshine = getInt('Sunshine');
$Petunias = getInt('Petunias');


$precio = [
    "Romantic" => 640, "Whispers" => 620, "Heart" => 589, "Eternal" => 1340,
    "Petal" => 2899, "Kisses" => 1299, "Loving" => 3500, "Velvet" => 4289,
    "Rose" => 1840, "Whisperss" => 340, "Scent" => 620, "Timeless" => 689,
    "Cherry" => 540, "Moonlight" => 540, "Orchid" => 689, "Bloom" => 250,
    "Petale" => 250, "Sunshine" => 570, "Petunias" => 250
];


$totalSinDescuento = 
    $Romantic * $precio['Romantic'] + $Whispers * $precio['Whispers'] + $Heart * $precio['Heart'] +
    $Eternal * $precio['Eternal'] + $Petal * $precio['Petal'] + $Kisses * $precio['Kisses'] +
    $Loving * $precio['Loving'] + $Velvet * $precio['Velvet'] + $Rose * $precio['Rose'] +
    $Whisperss * $precio['Whisperss'] + $Scent * $precio['Scent'] + $Timeless * $precio['Timeless'] +
    $Cherry * $precio['Cherry'] + $Moonlight * $precio['Moonlight'] + $Orchid * $precio['Orchid'] +
    $Bloom * $precio['Bloom'] + $Petale * $precio['Petale'] + $Sunshine * $precio['Sunshine'] +
    $Petunias * $precio['Petunias'];

$cantidadTotal = $Romantic + $Whispers + $Heart + $Eternal + $Petal + $Kisses + $Loving + $Velvet + $Rose +
                 $Whisperss + $Scent + $Timeless + $Cherry + $Moonlight + $Orchid + $Bloom + $Petale + $Sunshine + $Petunias;

$porcentajeDescuento = $cantidadTotal < 3 ? 0.10 : 0.20;
$totalConDescuento = $totalSinDescuento - ($totalSinDescuento * $porcentajeDescuento);


$sql_verificar = "SELECT * FROM ventas WHERE email = ?";
$stmt = $conn->prepare($sql_verificar);
$stmt->bind_param("s", $email);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
 
    $sql_actualizar = "UPDATE ventas SET 
        total = ?, romantic = ?, whispers = ?, hearth = ?, eternal = ?, petal = ?, kisses = ?, loving = ?, velvet = ?, rose = ?, 
        whisperss = ?, scentt = ?, timeles = ?, cherry = ?, moonlight = ?, orchid = ?, bloom = ?, kis = ?, sunshine = ?, petunias = ?
        WHERE email = ?";

    $stmt = $conn->prepare($sql_actualizar);
    $stmt->bind_param("diiiiiiiiiiiiiiiiiiis",
        $totalConDescuento, $Romantic, $Whispers, $Heart, $Eternal, $Petal, $Kisses, $Loving, $Velvet, $Rose,
        $Whisperss, $Scent, $Timeless, $Cherry, $Moonlight, $Orchid, $Bloom, $Petale, $Sunshine, $Petunias,
        $email
    );

    if ($stmt->execute()) {
        echo "<p>✅ Registro actualizado correctamente.</p>";
    } else {
        echo "<p>❌ Error al actualizar: " . $stmt->error . "</p>";
    }

} else {
    echo "<p>⚠️ El correo no existe en la base de datos.</p>";
}

// Cerrar conexión
$stmt->close();
$conn->close();

echo '<br><button><a href="../index.php">Ir a la página principal</a></button>';
?>

<?php
echo '<title> Consultas </title>';
echo '<link rel="icon" href="../imagenes/flor12.ico">';
echo '<link rel="stylesheet" type="text/css" href="../css/consultar.css" />';
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';

//CONEXION A BD

//conectamos Con el servidor
$servername = "localhost"; // Cambia según tu configuración
$username = "root"; // Tu usuario de la base de datos
$password = ""; // Tu contraseña de la base de datos
$db="bloom";          //Nombre de la base de datos

//Establece conexión con la base de datos (dominio,usuarios,contraseña,base_de_datos)
$conn = mysqli_connect($servername, $username, $password, $db) or die("Problemas al Conectar");
mysqli_select_db($conn, $db) or die("problemas al conectar con la base de datos");


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$email = $_POST['email'];

// Verificar si el correo existe
$stmt = $conn->prepare("SELECT * FROM ventas WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Si el correo existe, obtener los datos
    $usuario = $result->fetch_assoc();
    
    echo "<h3> Consulta del usuario </h3>";
    echo "<b> email: " . $usuario['email'] . "</b><br><br>";
     echo "Total de compra:  $" . $usuario['total'] . " pesos <br><br><br><br>";
} else {
    echo "El correo no está registrado. <br><br><br><br>";
}

$stmt->close();
$conn->close();

echo '<button><a href="../index.php" class="btn"> Regresar </a></button><br><br><br>';

?>
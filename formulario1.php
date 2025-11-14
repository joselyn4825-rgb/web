<?php
echo '<title> Registrov</title>';
echo '<link rel="stylesheet" type="text/css" href="../css/consultar.css" />';
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
$servername = "localhost"; // Cambia según tu configuración
$username = "root"; // Tu usuario de la base de datos
$password = ""; // Tu contraseña de la base de datos
$db="bloom";          //Nombre de la base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
$email = $_POST["email"];
$nombre= $_POST["nombre"];
 $tel = $_POST["tel"];
 $direccion = $_POST["direccion"];
 $fecha = $_POST["fecha"];

// Verificar si el correo ya existe
$sql = "SELECT * FROM clientes WHERE email = '$email'";   // Nombre de la tabla clientes y registro correo
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<p> El correo ya está registrado.</p><br><br>";
} else {
    $nombre = $_POST['nombre'];
    $sql = "INSERT INTO clientes (email, nombre, tel, direccion, fecha ) VALUES ('$email', '$nombre', '$tel', '$direccion','$fecha')";  //Insreta campos nombre, correo y pwd a tabla clientes
    
    if ($conn->query($sql) === TRUE) {
        echo "<p> Registro exitoso.</p>";
    } else {
        echo "<p> Error al registrar: </p>" . $conn->error;
    }
}

$conn->close();
echo '<button><a href="../index.php" class="btn"> Regresar </a></button><br><br><br>';
?>

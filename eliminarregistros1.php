<?php
echo '<title> Eliminar </title>';
echo '<link rel="icon" href="../imagenes/flor12.ico">';
echo '<link rel="stylesheet" type="text/css" href="../css/consultar.css" />';
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';

  if ($_POST) {  //verificando el envío del formulario mediante El envío tipo submit por metodo POST
    //Conectando con la BD
    $servername = "localhost"; // Cambia según tu configuración
    $username = "root"; // Tu usuario de la base de datos
    $password = ""; // Tu contraseña de la base de datos
    $db = "bloom";          //Nombre de la base de datos

    //Establece conexión con la base de datos (dominio,usuarios,contraseña,base_de_datos)
    $con = mysqli_connect($servername, $username, $password, $db) or die("Problemas al Conectar");
    mysqli_select_db($con, $db) or die("problemas al conectar con la base de datos");

    $email = $_POST['email'];
    mysqli_query($con, "DELETE FROM clientes WHERE email='$email'") or die("Error al eliminar los datos");
    mysqli_close($con);

    echo "<p> Datos eliminados correctamente </p>";
   echo '<button><a href="../index.php" class="btn"> Regresar </a></button><br><br><br>';
  }

  ?>
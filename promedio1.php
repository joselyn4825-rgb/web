<?php
echo '<meta charset="UTF-8">';
echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
echo '<link rel="stylesheet" type="" href="../css/promedio3.css">';
echo '<title>Calcular Promedio</title>'; 
echo '<charset=UFF-8>';

 $nombre = $_POST["nombre"];
 $cal1 = $_POST["cal1"];
 $cal2 = $_POST["cal2"];
 $cal3 = $_POST["cal3"];

$promedio = ($esp + $ing + $cie)/3;

echo "<header><h1> Calcular Promedio </h1></header>";
echo "<h2> El estudiante: $nombre </h2> <br>";
echo "promedio:".number_format ($promedio,2)."<br>";


if ($promedio >=70 ){
echo "<p> Alumno aprobao </p>";
} else {
echo "<p1> Alumno reprobado </p1>";
}






echo "<footer>Italia Yazu Guzman</footer>";

?>
<button style="position: fixed; top:10px; right: 10px;"><a href="./admin.php">Atras</a></button>

<?php
include('../models/conexion.php');
$obj = new Conexion();
$con = $obj->conectar();
$sql1 = "SELECT COUNT(*) as total, respuesta1 FROM respuestas GROUP BY respuesta1";
$respuesta1 = $con->query($sql1);


$sql2 = "SELECT COUNT(*) as total, respuesta2 FROM respuestas GROUP BY respuesta2";
$respuesta2 = $con->query($sql2);
$rep2 = array();

$con->close();

$rep1 = array();
if ($respuesta1->num_rows > 0) {
    while ($fila = $respuesta1->fetch_array()) {
        array_push($rep1, $fila);
    }
}
if (!empty($rep1)) {
    echo "Respuestas de la pregunta 1:<br>";
    foreach ($rep1 as $row) {
        echo $row['respuesta1'] . ": " . $row['total'] . "<br>";
    }
} else {
    echo "<p>Ningun registro para pregunta 1</p>";
}

$rep2 = array();
if ($respuesta2->num_rows > 0) {
    while ($fila = $respuesta2->fetch_array()) {
        array_push($rep2, $fila);
    }
}
if (!empty($rep2)) {
    echo "<br>Respuestas de la pregunta 2:<br>";
    foreach ($rep2 as $row) {
        echo $row['respuesta2'] . ": " . $row['total'] . "<br>";
    }
} else {
    echo "<p>Ningun registro para pregunta 2</p>";
}

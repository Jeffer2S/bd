<?php


include("conexion.php");
$obj = new Conexion();
$conn = $obj->conectar();

$sql = "SELECT id_cur, nom_cur FROM cursos";
$result = $conn->query($sql);

/*$cursos = array();
while($row = $result->fetch_assoc()) {
    $cursos[] = $row;
}
header('Content-Type: application/json');
echo json_encode($cursos);*/
?>

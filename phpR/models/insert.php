<?php
include("conexion.php");
$obj = new Conexion();
$conn = $obj->conectar();
$cedula = $_POST["ced_est"];
$nombre = $_POST["nom_est"];
$apellido = $_POST["ape_est"];
$telefono = $_POST["tel_est"];
$direccion = $_POST["dir_est"];
$id_cur = $_POST["nom_cur"];

$sqliInsert = "INSERT INTO estudiantes(ced_est, nom_est, ape_est, tel_est, dir_est, id_cur) 
values ('$cedula','$nombre','$apellido','$telefono','$direccion','$id_cur')
";

if ($conn->query($sqliInsert) == true) {
    echo json_encode("se guardo");
} else {
    echo json_encode("Error: " . mysqli_connect_error());
}

<?php
/*
include("conexion.php");
$obj = new Conexion();
$conn=$obj->conectar();

$cedula = $_POST["cedula"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$direccion = $_POST["direccion"];
$telefono = $_POST["telefono"];
$curso = $_POST["curso"];

$sqlupdate = " UPDATE estudiantes SET 
            nom_est='$nombre', 
            ape_est='$apellido', 
            tel_est='$telefono', 
            dir_est='$direccion', 
            id_cur='$curso' 
            WHERE ced_est='$cedula'";

if($conn->query($sqlupdate)==true){
    echo json_encode( "actualizado");
}else{
    echo json_encode( "Error: ". $conn->error);
}*/

include("conexion.php");
$obj = new Conexion();
$conn = $obj->conectar();

$cedula = $_POST["ced_est"];
$nombre = $_POST["nom_est"];
$apellido = $_POST["ape_est"];
$direccion = $_POST["dir_est"];
$telefono = $_POST["tel_est"];
$curso = $_POST["nom_cur"];

$response = array();

$sqlupdate = "UPDATE estudiantes SET 
              nom_est='$nombre', 
              ape_est='$apellido', 
              tel_est='$telefono', 
              dir_est='$direccion', 
              id_cur='$curso' 
              WHERE ced_est='$cedula'";

if ($conn->query($sqlupdate) === true) {
    $response['success'] = true;
    $response['message'] = "Actualizado exitosamente";
} else {
    $response['success'] = false;
    $response['errorMsg'] = "Error: " . $conn->error;
}

//header('Content-Type: application/json');
echo json_encode($response);


?>


<?php
include("conexion.php");
$obj = new Conexion();
$conn=$obj->conectar();
$cedula=$_POST["ced_est"];
//$cedula=$_POST["cedula"];
$sqlEliminar = "DELETE from estudiantes where ced_est='$cedula'";
if($conn->query($sqlEliminar)===true){
    echo json_encode ("se elimino");
}else{
    //echo json_decode( "Error: ". mysqli_connect_error());
    echo json_encode( "Error: ". mysqli_connect_error());

}

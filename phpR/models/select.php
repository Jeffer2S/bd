<?php
include("conexion.php");
$obj = new Conexion();
$conn = $obj->conectar();
$sqlSelect = "
SELECT  e.ced_est,
e.nom_est,
e.ape_est,
e.tel_est,
e.dir_est,
c.nom_cur
FROM estudiantes e,
cursos c
WHERE e.id_cur = c.id_cur;
";
//$sqlSelect = "SELECT e.*,c.nom_cur FROM estudiantes e,cursos c WHERE e.id_cur = c.id_cur";

$resultado = $conn->query($sqlSelect);
$resp = array();

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_array()) {
        array_push($resp, $fila);
    }
} else {
    echo json_encode("no hay datos");
}

echo json_encode($resp);

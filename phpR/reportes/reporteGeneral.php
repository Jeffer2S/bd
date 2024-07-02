<?php
// REPORTE GENERAL DE ESTUDIANTES
require('../fpdf186/fpdf.php');

include("../models/conexion.php");
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

$respuesra = $conn->query($sqlSelect);

$pdf = new FPDF('L');

$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Cedula',1);
$pdf->Cell(40,10,'Nombre',1);
$pdf->Cell(40,10,'Apellido',1);
$pdf->Cell(40,10,'Telefono',1);
$pdf->Cell(40,10,'Direccion',1);
$pdf->Cell(40,10,'Curso',1);
$pdf->Ln();

while($row=$respuesra->fetch_array()){
    $cedula=$row['ced_est'];
    $nombre=$row['nom_est'];
    $apellido=$row['ape_est'];
    $telefono=$row['tel_est'];
    $direccion=$row['dir_est'];
    $curso=$row['nom_cur'];
    $pdf->Cell(40,10,$cedula,1,0);
    $pdf->Cell(40,10,$nombre,1,0);
    $pdf->Cell(40,10,$apellido,1,0);
    $pdf->Cell(40,10,$telefono,1,0);
    $pdf->Cell(40,10,$direccion,1,0);
    $pdf->Cell(40,10,$curso,1,0);
    $pdf->Ln();
}

$pdf->Output();

?>




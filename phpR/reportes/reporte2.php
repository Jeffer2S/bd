<?php
require __DIR__.'/phpjasperxml-master/vendor/autoload.php';

use simitsdk\phpjasperxml\PHPJasperXML;

// Ruta absoluta al archivo .jrxml en el disco C en la carpeta reportes
$filename = "./reporteEstudiantes.jrxml";

// Configuración de la conexión a la base de datos
$config = [
    'driver' => 'mysql', // Tipo de base de datos
    'host' => 'localhost',
    'user' => 'root',
    'pass' => '',
    'name' => 'cuarto'
];

$report = new PHPJasperXML();
$report->load_xml_file($filename)    
    ->setParameter(['reporttitle' => 'Database Report With Driver : ' . $config['driver']])
    ->setDataSource($config);

header('Content-Type: application/pdf');
header('Content-Disposition: inline; filename="reporte.pdf"');
echo $report->export('Pdf'); // Enviar el contenido PDF directamente al navegador
?>

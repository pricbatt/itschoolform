<?php
ini_set('display_errors', 'On');
// Require composer autoload
require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();

$pagecount = $mpdf->SetSourceFile("/documents/MFU-P09_000132 - Original.pdf");
for ($i=1; $i<=$pagecount; $i++) {
    $mpdf->AddPage();
    $import_page = $mpdf->ImportPage($i);
    //$mpdf->Image('sign.jpg', 0, 0, 210, 297, 'jpg', '', true, false);
    $mpdf->UseTemplate($import_page);
}
//$mpdf->WriteHTML();
$mpdf->Output();
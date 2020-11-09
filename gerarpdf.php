<?php
use Dompdf\Dompdf;

require __DIR__ .'/vendor/autoload.php';

$dompdf = new Dompdf();
ob_start();
require __DIR__ ."/views/curriculo/modelo.php";
$dompdf->loadHtml(ob_get_clean());
$dompdf->setPaper("A4");
$dompdf->render();
$dompdf->stream("curriculo.pdf",["Attachment" => false]);
?>
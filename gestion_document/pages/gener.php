<?php
 require_once('connexiondb.php');
require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();
$dompdf = new Dompdf($options);
$html = '<html><body><p>Hello, World!</p></body></html>'; // Replace this with your HTML content
$dompdf->loadHtml($html);
$pdf='../fpdf/exemplepdf.pdf';
$dompdf->render();
$dompdf->stream($pdf);
?>

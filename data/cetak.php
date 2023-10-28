<?php
// include autoloader
require_once 'vendor/autoload.php';
use Dompdf\Dompdf;

try {
    $dompdf = new DOMPDF();
    include 'bukti.php';
    $dompdf->load_html($template);
    $dompdf->render();
    $dompdf->stream('bukti.pdf');
} catch (\Throwable $th) {
    echo "Salah";
}
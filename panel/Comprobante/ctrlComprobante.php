<?php

require_once('mdlComprobante.class.php');
require_once('../../../vendor/autoload.php');

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

//$sistema -> validarRol('Administrador');

$id_compra = NULL;
$accion = NULL;

if(isset($_GET['accion'])){
    $id_compra = isset($_GET['id_compra']) ? $_GET['id_compra'] : NULL;
    $accion = $_GET['accion'];
}

switch($accion){

    case 'Comprobante':
        $content = $comprobante -> lista($id_compra);

    break;


    default:
        $content = 'nada';
    break;
    
}

    $html2pdf = new Html2Pdf('P', 'A4', 'fr');
    $html2pdf->setDefaultFont('Arial');
    $html2pdf->writeHTML($content);
    $html2pdf->output('example00.pdf');

?>
<?php

	include_once '../global.php';
	include_once '../recursos/fpdf/fpdf.php';

	$pdf = new FPDF("P", "mm", "A4");
	$pdf->Open();
	$pdf->AddPage();
	
	$pdf->Output("../../recursos/certificados/evento_".$id_evento.".pdf", 'I');
?>

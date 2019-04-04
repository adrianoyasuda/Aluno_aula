<?php
	include_once '../../recursos/fpdf/fpdf.php';

	$pdf = new FPDF("P", "mm", "A4");
	$pdf->Open();
	$pdf->AddPage();
	$pdf->Image('../../recursos/img/Logo.png', 28, 50, 160, 25);
	$pdf->SetLineWidth(0.4);
	$pdf->Line(28, 85, 188, 85);

	

	$pdf->SetFont("Arial","B", 18);
	$pdf->SetY(90); $pdf->SetX(10);
	$texto = iconv("utf-8", "iso-8859-1", "RELATÓRIO DE FREQUÊNCIA");
	$pdf->Cell(192, 15, $texto, 0, 0, 'C');

	$pdf->SetFont("Arial","B", 15);
	$pdf->SetY(100); $pdf->SetX(10);
	$aluno = iconv("utf-8", "iso-8859-1", "Nome do Aluno");
	$pdf->Cell(192, 15, $aluno, 0, 0, 'C');

	$pdf->SetFont("Arial","B", 12);
	$pdf->SetY(120); $pdf->SetX(10);
	$freq = iconv("utf-8", "iso-8859-1", "Frequência Final: 0%");
	$pdf->Cell(192, 15, $freq, 0, 0, 'C');

	$pdf->SetFont("Arial","B", 12);
	$pdf->Text(75, 145, iconv("utf-8","iso-8859-1","DESCRIÇÃO DA FREQUÊNCIA"));
	

	$pdf->Output("relatorio.pdf", 'I');

?>



	<!-- $pdf->SetFont("Arial","B", 28);
	$pdf->SetY(90); $pdf->SetX(10);
	$pdf->Cell(188, 15, "BOTAFOGO", 0, 0, 'C'); -->

<!-- $pdf->SetFont("Arial","B", 12);
	$pdf->Text(52, 120, iconv("utf-8","iso-8859-1","Densenvolvimento Web II - Gil Eduardo de Andrade")); -->
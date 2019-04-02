<?php
	include_once '/../../recursos/fpdf/fpdf.php';

	// Instancia o objeto
	$pdf = new FPDF("P", "mm", "A4");
	// Abre o documento
	$pdf->Open();
	// Adiciona uma página
	$pdf->AddPage();
	// Adiciona uma imagem na posição e tamanho especificados
	$pdf->Image('img/botafogo.jpg', 83, 33, 43, 47);
	// Define a espessura e desenha duas linha
	$pdf->SetLineWidth(0.4);
	$pdf->Line(5, 28, 204, 28);
	$pdf->Line(5, 85, 204, 85);
	// Define a fonte do texto, a posição 'x' e 'y' da célula que será escrita
	$pdf->SetFont("Arial","B", 34);
	$pdf->SetY(10); $pdf->SetX(10);
	// Adiciona a célula/texto ao documento - alinhamento centralizado
	$pdf->Cell(188, 15, "BOTAFOGO", 0, 0, 'C');
	// Define a fonte do texto, a posição 'x' e 'y' da célula que será escrita
	$pdf->SetFont("Arial","B", 26);
	$pdf->SetY(90); $pdf->SetX(10);
	// Define o texto da célula - utilliza função iconv() para obter corretmente os acentos do texto
	$texto = iconv("utf-8", "iso-8859-1", "Campeão desde 1910");
	// Adiciona a célula/texto ao documento - alinhamento centralizado
	$pdf->Cell(188, 15, $texto, 0, 0, 'C');
	// Define fonte / Insere um texto de maneira direta, sem utilizar célula
	$pdf->SetFont("Arial","B", 12);
	$pdf->Text(52, 120, iconv("utf-8","iso-8859-1","Densenvolvimento Web II - Gil Eduardo de Andrade"));

	// Gera o documento PDF
	$pdf->Output("relatorio.pdf", 'I');

?>

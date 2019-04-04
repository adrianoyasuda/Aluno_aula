<?php
  include_once '../../recursos/fpdf/fpdf.php';
  include_once '../../global.php';

  $pdf = new FPDF("P", "mm", "A4");
  $pdf->Open();


  $alunos = modeloAluno::getAlunos();
  $freq = 0;
  $evento = modeloEvento::getEventos();
  $total = 0;

  while ($objEvento = $evento->fetchObject()) {
    $total = $total + 2;
  }

  while($objAluno = $alunos->fetchObject()) {
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
    $aluno = iconv("utf-8", "iso-8859-1", $objAluno->nome);
    $pdf->Cell(192, 15, $aluno, 0, 0, 'C');


    if($objAluno->frequencia < 75){
        $pdf->SetTextColor(255,0,0);
        $pdf->SetFont("Arial","B", 12);
        $pdf->SetY(120); $pdf->SetX(10);
        $freq = iconv("utf-8", "iso-8859-1", "Frequência Final: ".$objAluno->frequencia."%");
        $pdf->Cell(192, 15, $freq, 0, 0, 'C');
    }
    else{
        $pdf->SetTextColor(0,0,255);
        $pdf->SetFont("Arial","B", 12);
        $pdf->SetY(120); $pdf->SetX(10);
        $freq = iconv("utf-8", "iso-8859-1", "Frequência Final: ".$objAluno->frequencia."%");
        $pdf->Cell(192, 15, $freq, 0, 0, 'C');
    }
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont("Arial","B", 12);
    $pdf->Text(75, 145, iconv("utf-8","iso-8859-1","DESCRIÇÃO DA FREQUÊNCIA"));


    $pdf->SetFont("Arial","UB", 10);
    $pdf->Text(28, 160, iconv("utf-8","iso-8859-1","CONTEÚDO DA AULA"));

    $pdf->SetFont("Arial","UB", 10);
    $pdf->Text(170, 160, iconv("utf-8","iso-8859-1","FALTAS"));


    $tfalta = 0;
    $pulalinha = 165;
    $evento = modeloEvento::getEventos();

    while ($objEvento = $evento->fetchObject()) {

      $pulalinha = $pulalinha + 5;

      $pdf->SetFont("Arial","", 9);
      $pdf->Text(28, $pulalinha, iconv("utf-8","iso-8859-1",$objEvento->conteudo));

      $valor = modeloFrequencia::findFrequencia($objAluno->id, $objEvento->id);

      $tfalta = $valor->falta + $tfalta;

      $pdf->SetFont("Arial","", 9);
      $pdf->Text(175, $pulalinha, iconv("utf-8","iso-8859-1",$valor->falta));

    }

    $pulalinha = $pulalinha + 5;
    $pdf->SetFont("Arial","UB", 10);
    $pdf->Text(172, $pulalinha, iconv("utf-8","iso-8859-1","_____"));

    $pulalinha = $pulalinha + 5;
    $pdf->SetFont("Arial","B", 11);
    $pdf->Text(175, $pulalinha, iconv("utf-8","iso-8859-1",$tfalta));





  }

  
  

  $pdf->Output("relatorio.pdf", 'I');

?>



  <!-- $pdf->SetFont("Arial","B", 28);
  $pdf->SetY(90); $pdf->SetX(10);
  $pdf->Cell(188, 15, "BOTAFOGO", 0, 0, 'C'); -->

<!-- $pdf->SetFont("Arial","B", 12);
  $pdf->Text(52, 120, iconv("utf-8","iso-8859-1","Densenvolvimento Web II - Gil Eduardo de Andrade")); -->
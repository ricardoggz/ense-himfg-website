<?php
require('../fpdf.php');

$confirmacion = 'SBS20-PED-FSaP_684';
$aspirante = 'Nicol�s Hern�ndez Hern�ndez';
$especialidad = 'Pediatr�a';
$fechaem = '3/06/2018 1:53 pm';

class PDF extends FPDF
{
// Cabecera de p�gina
function Header()
{
	// Logo
	$this->Image('logo_pb1.png',10,8,33);
	// Arial bold 15
	$this->SetFont('Arial','B',12);
	// Movernos a la derecha
	$this->Cell(65);
	// T�tulo
	//$this->Cell(30,10,'INSHIMFG COMPROBANTE DE REGISTRO EN L�NEA',1,0,'C');
   $this->Cell(0,10,'INSTITUTO NACIONAL DE SALUD',0,0,1);	
   $this->Ln(10);	
   $this->Cell(45);
   $this->Cell(0,10,'HOSPITAL INFANTIL DE M�XICO FEDERICO G�MEZ',0,0,1);
   

   $this->Ln(10);	
   $this->Cell(40);
   $this->Cell(0,10,'DIRECCI�N DE ENSE�ANZA Y DESARROLLO ACAD�MICO',0,0,1);
	// Salto de l�nea

   $this->Ln(10);	
   $this->Cell(60);
   $this->SetFont('Arial','I',12);   
   $this->Cell(0,10,'COMPROBANTE DE REGISTRO EN L�NEA',0,0,1);
	// Salto de l�nea
	$this->Ln(20);
}

// Pie de p�gina
function Footer()
{
	// Posici�n: a 1,5 cm del final
	$this->SetY(-15);
	// Arial italic 8
	$this->SetFont('Arial','I',8);
	// N�mero de p�gina
	$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Creaci�n del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf-> Line(10, 60, 200, 60);
$pdf-> Line(10, 70, 200, 70);
$pdf-> Line(10, 100, 200, 100);

$pdf->SetFont('Times','B',14);
	$pdf->Cell(0,10,'Confirmaci�n:            '. $confirmacion. $i,0,1);
$pdf->SetFont('Times','',14);	
	$pdf->Cell(0,10,'Nombre del Aspirante:  '. $aspirante. $i,0,1);
	$pdf->Cell(0,10,'Especialidad Solicitada: '. $especialidad. $i,0,1);
	$pdf->Cell(0,10,'Fecha: '. $fechaem. $i,0,1);

	$pdf->Cell(0,10,''. $i,0,1);


$pdf->SetFont('Times','',12);
$pdf->Cell(0,10,'Importante:'. $i,0,1);
$pdf->Cell(0,5,'Para finalizar su registro como aspirante, deber� acudir a la Direcci�n de Ense�anza y Desarrollo Acad�mico' .  $i,0,1);
$pdf->Cell(0,5,'del Hospital Infantil de M�xico Federico G�mez y entregar la documentaci�n correspondiente como se indica'.  $i,0,1);
$pdf->Cell(0,5,'en la convocatoria 2020.'.  $i,0,1);	

$pdf->Cell(0,5,'Le pedimos consultar la secci�n Avisos del portal de la convocatoria, para conocer notificaciones importantes.'. $i,0,1);

$pdf->Cell(0,5,''. $i,0,1);
$pdf->Cell(0,5,''. $i,0,1);
$pdf->SetFont('Times','',8);
$pdf->Cell(0,5,'�2007 HIMFG-SALUD- DERECHOS RESERVADOS'. $i,0,1);



$pdf->Output();
?>

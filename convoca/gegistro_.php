<?php
//<?php header('Content-Type:text/html;charset=windows-1252');

//if ($_POST['consentimiento'] <>'aceptar') {
//echo "Debe Leer los terminos del Aviso de Privacidad y MARCAR LA CASILLA.";
//echo "</body></html> \n";
//      exit; }

 //$c4=utf8_encode(strtoupper($row["NombreC"])); 

require('./fppdf/fpdf.php');
include('../headers/conexionb.inc.php');

$rvd1 = $_POST['T1'];
$vod2 = $_POST['T2']; // Paterno
$vod3 = $_POST['T3'];
$vod5 = utf8_decode($_POST['D1']); // Especialidad
$vod6 = $_POST['T4'];
$vod7 = $_POST['D8'];
$vod8 = $_POST['T6'];
$vod9 = $_POST['D15'];
$vod10 = $_POST['D2'];
$vod12 = $_POST['D3'];
$vod13 = $_POST['T11'];
$vod14 = $_POST['T12'];
$vod15 = $_POST['T13'];
$vod16 = $_POST['T24'];
$vod17 = $_POST['T14'];
$vod18 = $_POST['T15'];
$vod19 = $_POST['T16'];
$vod20 = $_POST['T17'];
$vod21 = $_POST['T20'];
$vod22 = $_POST['T18'];
$vod23 = $_POST['D9'];
$vod24 = $_POST['T22'];
$vod25 = $_POST['T83'];
$vod26 = $_POST['T84'];
$vod28 = $_POST['T23'];
$vod39 = $_POST['T35'];
$vod40 = $_POST['T36'];
$vod41 = $_POST['T41'];
$vod42 = $_POST['T42'];
$vod43 = $_POST['T43'];
$vod44 = $_POST['T44'];
$vod45 = $_POST['T45'];
$vod46 = $_POST['T47'];
$vod47 = $_POST['D11'];
$vod48 = $_POST['T49'];
$vod49 = $_POST['T87'];
$vod50 = $_POST['T88'];
$vod51 = $_POST['T50'];
$vod52 = $_POST['T51'];
$vod53 = $_POST['T52'];
$vod54 = $_POST['T53'];
$vod55 = $_POST['T54'];
$vod56 = $_POST['T55'];
$vod57 = $_POST['T56'];
$vod58 = $_POST['T58'];
$vod59 = $_POST['T59'];
$vod60 = $_POST['T60'];
$vod61 = $_POST['T76'];
$vod62 = $_POST['T77'];
$vod63 = $_POST['T79'];
//$vod90 = $_POST['D12']; fecha nac
//$vod91 = $_POST['D13']; fecha nac
//$vod92 = $_POST['D14']; fecha nac
$fnacio = $_POST['fnacimiento'];
$sbs10 = $_POST['T89'];
//$ligdi = $_POST['T75'];
//$securite = $_SERVER ['REMOTE_ADDR'];

$hoy = date("j/n/Y g:i a");

//===================================================

settype($ctt1, "integer");

//===================================================

 $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_nombre);
if ($mysqli === false){
	die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
} 

$result = $mysqli->query("SELECT * FROM proceso11.stconta");

while ($row = $result->fetch_array()) { 
 
     $ctt1=$row["contador"];
    
    }

$ctt1++ ;
$result->close(); 
$mysqli->close();

//===================================================

$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_nombre);
if ($mysqli === false){
	die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
} 
  $mysqli->query("UPDATE proceso11.stconta SET contador=$ctt1 WHERE contador <> 1000");

$mysqli->close();
//===================================================
$rvd1 = trim($rvd1, ' ');
$vod2 = trim($vod2, ' ');
$vod3 = trim($vod3, ' ');
$nomc = strtoupper($rvd1 . " " . $vod2 . " " . $vod3);
//$cfenac = $vod90 ."/". $vod91 ."/". $vod92;
$cfenac = $fnacio;
$da_telc = "Lada-" . $vod25 .", Telefono ". $vod26; 
$dp_telc = "Lada-" . $vod37 .", Telefono ". $vod38; 
$ne_telc = "Lada-" . $vod49 .", Telefono ". $vod50; 
$mailcel = "[". $vod28 . "] " . ",     Celular-> " . $sbs10; 

$sql= "INSERT INTO proceso11.ds_rom (id, a_paterno, a_materno, nombres, nom_complet, estudios, ciudad, estado, " .
  "pais, fe_nac, edad, sexo, edo_civil, nacionali, rfc, curp, pasaporte, " .
  "da_c, da_int, da_col, da_del, da_cp, da_cd, da_edo, da_pais, da_da1, " .
  "da_t1, da_cel, da_il, ne_nom, ne_par, ne_c, ne_int, ne_col, ne_del,"  .
  "ne_cp, ne_cd, ne_edo, ne_px, ne_da1, ne_t1, ne_cel, ne_il, dp_c, dp_int, " .
  "dp_col, dp_del, dp_cp, dp_cd, dp_edo, dp_pais, dp_da1, dp_t1, dac_nomlic, " .
  "dac_nomuniv, dac_fac, dac_ini, dac_fin, dac_prom, dac_lugen, dac_fecexamp, ".
  "dac_numcedp, dac_fenarm, dac_vpresenta, dac_expdoc, dac_expinv, dac_expdist, dac_menhon, fe_sistema, seguridad)" . 
"values ($ctt1, '$rvd1', '$vod2', '$vod3', '$nomc', '$vod5', '$vod6', '$vod7', " . 
  "'$vod8','$cfenac', '$vod9', '$vod10', '$vod12', '$vod13', '$vod14', '$vod15', '$vod16', " . 
  "'$vod17', '$vod18', '$vod19', '$vod20', '$vod21', '$vod22', '$vod23', '$vod24', '$vod25'," .
  "'$vod26', '$sbs10', '$vod28', '$vod39', '$vod40', '$vod41', '$vod42', '$vod43', '$vod44', " .
  "'$vod45', '$vod46', '$vod47', '$vod48', '$vod49', '$vod50', 'no aplica', '$vod51', 'vod29', 'vod30'," . 
  "'vod31', 'vod32', 'vod33', 'vod34', 'vod35', 'vod36', 'vod37', 'vod38', '$vod52'," .
  "'$vod53', '$vod54', '$vod55', '$vod56', '$vod57', '$vod58', '$vod59', " .
  "'$vod60', '$vod61', '$vod62', '$vod63', 'vod64', 'vod65', 'vod66', '$hoy', '$securite')"; 

$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_nombre);
if ($mysqli === false){
	die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
} 
  $mysqli->query($sql);

$mysqli->close();

//==================================================================================
//   Comprobante
//==================================================================================



$confirmacion = 'SBS20-PED-FSaP_684';
$aspirante = 'Nicolás Hernández Hernández';
$especialidad = 'Pediatría';
$fechaem = '3/06/2018 1:53 pm';

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
	// Logo
	$this->Image('logo_pb1.png',10,8,33);
	// Arial bold 15
	$this->SetFont('Arial','B',12);
	// Movernos a la derecha
	$this->Cell(65);
	// Título
	//$this->Cell(30,10,'INSHIMFG COMPROBANTE DE REGISTRO EN LÍNEA',1,0,'C');
   $this->Cell(0,10,'INSTITUTO NACIONAL DE SALUD',0,0,1);	
   $this->Ln(10);	
   $this->Cell(45);
   $this->Cell(0,10,'HOSPITAL INFANTIL DE MÉXICO FEDERICO GÓMEZ',0,0,1);
   

   $this->Ln(10);	
   $this->Cell(40);
   $this->Cell(0,10,'DIRECCIÓN DE ENSEÑANZA Y DESARROLLO ACADÉMICO',0,0,1);
	// Salto de línea

   $this->Ln(10);	
   $this->Cell(60);
   $this->SetFont('Arial','I',12);   
   $this->Cell(0,10,'COMPROBANTE DE REGISTRO EN LÍNEA',0,0,1);
	// Salto de línea
	$this->Ln(20);
}

// Pie de página
function Footer()
{
	// Posición: a 1,5 cm del final
	$this->SetY(-15);
	// Arial italic 8
	$this->SetFont('Arial','I',8);
	// Número de página
	$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf-> Line(10, 60, 200, 60);
$pdf-> Line(10, 70, 200, 70);
$pdf-> Line(10, 100, 200, 100);

$pdf->SetFont('Times','B',14);
	$pdf->Cell(0,10,'Confirmación:            '. $confirmacion. $i,0,1);
$pdf->SetFont('Times','',14);	
	$pdf->Cell(0,10,'Nombre del Aspirante:  '. $aspirante. $i,0,1);
	$pdf->Cell(0,10,'Especialidad Solicitada: '. $especialidad. $i,0,1);
	$pdf->Cell(0,10,'Fecha: '. $fechaem. $i,0,1);

	$pdf->Cell(0,10,''. $i,0,1);


$pdf->SetFont('Times','',12);
$pdf->Cell(0,10,'Importante:'. $i,0,1);
$pdf->Cell(0,5,'Para finalizar su registro como aspirante, deberá acudir a la Dirección de Enseñanza y Desarrollo Académico' .  $i,0,1);
$pdf->Cell(0,5,'del Hospital Infantil de México Federico Gómez y entregar la documentación correspondiente como se indica'.  $i,0,1);
$pdf->Cell(0,5,'en la convocatoria 2020.'.  $i,0,1);	

$pdf->Cell(0,5,'Le pedimos consultar la sección Avisos del portal de la convocatoria, para conocer notificaciones importantes.'. $i,0,1);

$pdf->Cell(0,5,''. $i,0,1);
$pdf->Cell(0,5,''. $i,0,1);
$pdf->SetFont('Times','',8);
$pdf->Cell(0,5,'©2007 HIMFG-SALUD- DERECHOS RESERVADOS'. $i,0,1);



$pdf->Output();



//==================================================================================
//   Fin * Comprobante *
//==================================================================================


?> 


<?php

include('../headers/conexionb.inc.php');

$vod28 = $_POST['T23']; // mail
$vod3 = utf8_decode($_POST['T3']); // Nombres
$vod5 = utf8_decode($_POST['D1']); // Especialidad
$vod57 = $_POST['T56']; // promedio

if (($vod28 == '') || ($vod3 == '') || ($vod5 == '') || ($vod57 == '')) {      
      $sql="UPDATE proceso11.pbitacorav SET fljg = fljg + 1 WHERE id = 1"; 
      $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_nombre);
      if ($mysqli === false){
        die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
      } 
        $mysqli->query($sql);
      $mysqli->close();
      header('Location: http://187.141.21.244/convocatoria/');
      exit; }

require('./fppdf/fpdf.php');

$rvd1 = utf8_decode($_POST['T1']); // Materno
$vod2 = utf8_decode($_POST['T2']); // Paterno
// $vod3 = utf8_decode($_POST['T3']); // Nombres
// $vod5 = utf8_decode($_POST['D1']); // Especialidad
$vod6 = utf8_decode($_POST['T4']);
$vod7 = utf8_decode($_POST['D8']);
$vod8 = utf8_decode($_POST['T6']);
//$vod9 = $_POST['D15']; edad
$vod10 = $_POST['D2']; // sexo
$vod12 = $_POST['D3']; // edo civil
$vod13 = utf8_decode($_POST['T11']); // nacionalidad
$vod14 = $_POST['T12']; // RFC
$vod15 = $_POST['T13']; // CURP
$vod16 = $_POST['T24']; // PASAP
$vod17 = utf8_decode($_POST['T14']); // calle y num
$vod18 = $_POST['T15']; // interior
$vod19 = utf8_decode($_POST['T16']); // colonia 
$vod20 = utf8_decode($_POST['T17']); // alcaldia
$vod21 = $_POST['T20']; // CP
$vod22 = utf8_decode($_POST['T18']); // Ciudad
$vod23 = utf8_decode($_POST['D9']); // estado
$vod24 = utf8_decode($_POST['T22']); // pais
$vod25 = $_POST['T83']; //lada 
$vod26 = $_POST['T84']; // tel
// $vod28 = $_POST['T23']; // mail
$vod39 = utf8_decode($_POST['T35']); // nombrec
$vod40 = utf8_decode($_POST['T36']); // parentesco
$vod41 = utf8_decode($_POST['T41']); // calle
$vod42 = $_POST['T42']; // interior
$vod43 = utf8_decode($_POST['T43']); // colonia
$vod44 = utf8_decode($_POST['T44']);  //delegacion
$vod45 = $_POST['T45']; //cp
$vod46 = utf8_decode($_POST['T47']); // ciudad
$vod47 = utf8_decode($_POST['D11']); // estado
$vod48 = utf8_decode($_POST['T49']); // pais
$vod49 = $_POST['T87']; // lada
$vod50 = $_POST['T88']; // tel
$vod51 = $_POST['T50'];
$vod52 = utf8_decode($_POST['T51']); // Lic
$vod53 = utf8_decode($_POST['T52']); // univ
$vod54 = utf8_decode($_POST['T53']); // fac
$vod55 = $_POST['T54'];
$vod56 = $_POST['T55']; 
// $vod57 = $_POST['T56']; promedio
$vod58 = $_POST['T58'];
$vod59 = $_POST['T59'];
$vod60 = $_POST['T60'];
$vod61 = $_POST['T76'];
$vod62 = $_POST['T77'];
$vod63 = utf8_decode($_POST['T79']); // lengua indígena
//$vod90 = $_POST['D12']; fecha nac
//$vod91 = $_POST['D13']; fecha nac
//$vod92 = $_POST['D14']; fecha nac
$fnacio = $_POST['fnacimiento'];
$sbs10 = $_POST['T89'];
//$ligdi = $_POST['T75'];
$securite = $_SERVER ['REMOTE_ADDR'];

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

$cpb = 'SBS23-PED-SSaP_'. $ctt1;

//===================================================

$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_nombre);
if ($mysqli === false){
	die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
} 
  $mysqli->query("UPDATE proceso11.stconta SET contador=$ctt1 WHERE contador <> 10000");

$mysqli->close();
//===================================================
$rvd1 = trim($rvd1, ' ');
$vod2 = trim($vod2, ' ');
$vod3 = trim($vod3, ' ');
$nomcm = $rvd1 . " " . $vod2 . " " . $vod3; 
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
$pdf-> Line(10, 110, 200, 110);

$pdf->SetFont('Times','B',14);
	$pdf->Cell(0,10,'Confirmación:            '. $cpb. $i,0,1);
$pdf->SetFont('Times','',14);	
	$pdf->Cell(0,10,'Nombre del Aspirante:  '. $nomcm. $i,0,1);
	$pdf->Cell(0,10,'Especialidad Solicitada: '. $vod5. $i,0,1);
  $pdf->Cell(0,10,'Correo electrónico: '. $vod28. $i,0,1);
	$pdf->Cell(0,10,'Fecha: '. $hoy. $i,0,1);

	$pdf->Cell(0,10,''. $i,0,1);


$pdf->SetFont('Times','',12);
$pdf->Cell(0,10,'Importante:'. $i,0,1);
$pdf->Cell(0,5,'Para finalizar su registro como aspirante, deberá acudir a la Dirección de Enseñanza y Desarrollo Académico' .  $i,0,1);
$pdf->Cell(0,5,'del Hospital Infantil de México Federico Gómez y entregar la documentación correspondiente como se indica'.  $i,0,1);
$pdf->Cell(0,5,'en la convocatoria 2023.'.  $i,0,1);	

$pdf->Cell(0,5,'Le pedimos consultar la sección Avisos del portal de la convocatoria, para conocer notificaciones importantes.'. $i,0,1);

$pdf->Cell(0,5,''. $i,0,1);
$pdf->Cell(0,5,''. $i,0,1);
$pdf->SetFont('Times','',8);
$pdf->Cell(0,5,'©2007 INSHIMFG-SALUD- DERECHOS RESERVADOS'. $i,0,1);



$pdf->Output();



//==================================================================================
//   Fin * Comprobante *
//==================================================================================


?> 


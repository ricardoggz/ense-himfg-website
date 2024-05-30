<?php
//=====================================
//  convocatoria_informar_horario.php
//
//  Jueves 03/octubre/2020
//=====================================
include('../headers/cooproceso.inc.php');

$c_legal = $_POST['legal'];
if ($c_legal == ""){ 
	   header('Location: proceso_entrevistas.html');    
      exit; 
}else{

//Validar clave

$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_nombre);
if ($mysqli === false){
  die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
} 

$result = $mysqli->query("SELECT count(*) FROM participantes_sub where ckeyhorario='$c_legal'");


while ($row = $result->fetch_array()) {   
   $cc1w=$row[0]; 
}

$result->close(); 
$mysqli->close();

if ($cc1w<>1){ 
        header('Location: proceso_entrevistase.html');   
      exit; 

}else{

//codigo

$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_nombre);
if ($mysqli === false){
  die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
} 

$result = $mysqli->query("SELECT * FROM participantes_sub WHERE ckeyhorario='$c_legal'");

while ($row = $result->fetch_array()) {  


   $cc1=utf8_encode(strtoupper($row["nombre"]));    
   $cc3=utf8_encode(strtoupper($row["especialidad"]));
   $cc4=$row["claveRL"];
   $cc_ubicacion=utf8_encode(strtoupper($row["UBICACION"]));
   $cc_fecha=$row["FECHA"];
   $cc_hora=$row["HORA"];
   $cc_titular=utf8_encode(strtoupper($row["Titular"]));
   //ubicación
   
}

$result->close(); 
$mysqli->close();


		$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_nombre);
		if ($mysqli === false){
			die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
		} 
		  $mysqli->query("UPDATE proceso11.participantes_sub SET consultado=consultado+1 where ckeyhorario='$c_legal'");

$mysqli->close();


							 												
				echo("SU FECHA Y HORARIO DE ENTREVISTA: </br> ");            
				echo(" <font face='Arial' size='2'>-----------------</font> </br> "); 
				echo(" <font face='Arial' size='2'>Nombre: $cc1</font> </br> ");
				echo(" <font face='Arial' size='2'>Especialidad: $cc3 </font> </br> ");
				echo(" <font face='Arial' size='2'>Profesor Titular: $cc_titular</font> </br> ");
				echo(" <font face='Arial' size='2'>Fecha: $cc_fecha</font>  </br>");                                                  
				echo(" <font face='Arial' size='2'>hora: $cc_hora</font>  </br>");	
				echo(" <font face='Arial' size='2'>Ubicaci&oacute;n: $cc_ubicacion</font> </br> ");
				echo(" <font face='Arial' size='2'>-----------------</font> </br> ");
				echo(" <font face='Arial' size='2'><b>Instrucciones: </b></font> </br> ");
				echo(" <p align='justify'><font face='Arial' size='2'>Muy IMPORTANTE, sea puntual. Pres&eacute;ntese en el lugar indicado para su entrevista con al menos 30 minutos de anticipaci&oacute;n a la hora indicada. No habr&aacute; reposici&oacute;n de entrevista</font> </br>");
				echo(" <font face='Arial' size='2'>El ingreso ser&aacute; por la Puerta # 2  Necesitar&aacute; presentar una identificaci&oacute;n oficial.</font> </br>");
				echo(" <font face='Arial' size='2'><b>--------------</b></font> </br>");
			




}
}



?>


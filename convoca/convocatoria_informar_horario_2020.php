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
   $cc4=$row["JURADO"];
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

//=============================================

echo("							 												
<!DOCTYPE html>
<html lang='es'>
  <head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>HIMFG Convocatoria para aspirantes a cursos de especialización</title>


    <!-- CSS -->
    <link rel='shortcut icon' href='https://framework-gb.cdn.gob.mx/favicon.ico'>
    <link href='https://framework-gb.cdn.gob.mx/assets/styles/main.css' rel='stylesheet'>

    <!-- Respond.js soporte de media queries para Internet Explorer 8 -->
    <!-- ie8.js EventTarget para cada nodo en Internet Explorer 8 -->
    <!--[if lt IE 9]>
      <script src='https://oss.maxcdn.com/respond/1.4.2/respond.min.js'></script>
      <script src='https://cdnjs.cloudflare.com/ajax/libs/ie8/0.2.2/ie8.js'></script>
    <![endif]-->

  </head>
  <body>
<header>
    
<!-- nav -->
<nav class='navbar navbar-inverse sub-navbar navbar-fixed-top'>
  <div class='container'>
    <div class='navbar-header'>
      <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#subenlaces'>
        <span class='sr-only'>Interruptor de Navegación</span>
        <span class='icon-bar'></span>
        <span class='icon-bar'></span>
        <span class='icon-bar'></span>
      </button>
      <a class='navbar-brand' href='/'>HIMFG</a>    </div>
    <div class='collapse navbar-collapse' id='subenlaces'>
      <ul class='nav navbar-nav navbar-right'>      
        <li><a href='index.html'>Inicio</a></li>                                         
        <li><a href='#'>Avisos</a></li>
        <li><a href='documentos/convocatoria.pdf'>Convocatoria PDF</a></li>
        <li><a href='proceso_aviso_privacidad.html'>Registro en línea</a></li>
        <li><a href='documentos/flujograma.pdf'>Flujograma</a></li>
        <li><a href='proceso_anexos.html'>Descargas</a></li>
        <li><a href='preguntas_frecuentes.html'>Preguntas frecuentes</a></li>                     
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- /nav -->

</header>

<!-- Contenido -->
    <main class='page'>
      <div class='container'>
    

 	<div class='clearfix'>                   
	 	<br/><br/>
		 <ol class='breadcrumb'>
		    <li><a href='http://ense.himfg.edu.mx/convocatoria'><i class='icon icon-home'></i></a></li>
		    <li class='active'><a href='#'>Entrevistas</a></li>
		 </ol>
	</div>

<!-- Convocatoria -->

       <div align='center'>
      	<img src='images/titulo_logos1.gif' alt='banner' width='80%' border='0'/>
      </div>

      <div align='center'>
	      <h3>CONVOCATORIA PARA ASPIRANTES A CURSOS DE ESPECIALIZACIÓN 2020</h3>
	    </div>

	</br>

<!-- Contenido -->

<div class='panel panel-default'>
  <div class='panel-body'>
    <p><strong>Programación de su entrevista:</strong></p>
    </br>
    Nombre:</br> $cc1
    </br></br>
    Especialidad:</br> $cc3
    </br></br>
    Profesor Titular:</br> $cc_titular
    </br></br><b>
    Equipo: </br>$cc4</b>
    </br></br> 
    Fecha: </br>$cc_fecha
    </br></br> 
    hora: </br>$cc_hora
    </br></br> 
    Ubicación: </br>$cc_ubicacion
    </br></br>
   <p><strong>Instrucciones:</strong><p></br>
   <p align= justify>Muy IMPORTANTE, sea puntual. Preséntese en el lugar indicado para su entrevista con al menos 30 minutos de anticipación a la hora indicada. No habrá reposición de entrevista. El ingreso será por la Puerta # 2, Necesitará presentar una identificación oficial. </p> 

  </div>
</div>


<!-- /Contenido -->


				<div> 
				</br>
				 	<time>
				       Última Actualización: <!-- #BeginDate format:fcAm1m -->Viernes, octubre 10, 2019  14:00<!-- #EndDate -->
				    </time>                  
				</div>


      </div>

    </main>

    <!-- JS -->
    <script src='https://framework-gb.cdn.gob.mx/gobmx.js'></script>

  </body>
</html>
");				
			
//=============================================



}
}



?>


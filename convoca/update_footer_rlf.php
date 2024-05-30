<?php
include('../headers/cooproceso.inc.php');
$sql="UPDATE proceso11.pbitacorav SET rlf = rlf + 1 WHERE id = 1"; 
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_nombre);
if ($mysqli === false){
	die("ERROR: No se estableció la conexión. ". mysqli_connect_error());
} 
  $mysqli->query($sql);
$mysqli->close();
echo ".";
?> 

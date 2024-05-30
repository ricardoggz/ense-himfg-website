<?php
$a = 'zzzzz';
$b = 'qqq';
$c = '';
$d = 'qqq';

//if ($_POST['consentimiento'] = '') | {

if (($a == '') || ($b == '') || ($c == '') || ($d == '')) {

header('Location: http://187.237.57.42/convocatoria/');

// echo "No puede procesarse la solicitud.";
// echo "</body></html> \n";
      exit; }

echo "OK.";


?>      
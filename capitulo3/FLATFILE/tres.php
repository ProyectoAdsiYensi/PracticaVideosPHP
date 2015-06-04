<?php

$archivologs = "logs.dat";
$manejador = fopen ($archivologs,"r");

echo '<table width=100% border="1">';

while ($datos = fgetcsv ($manejador, 1000000, "|")){

$marcadetiempo = $datos[0];
$anyo = $datos[1];
$mes = $datos[2];
$dia = $datos[3];
$hora = $datos[4];
$minuto = $datos[5];
$segundo = $datos[6];
$navegador = $datos[7];
$ip = $datos[8];

echo'
<tr>
	<td border="1">'.$marcadetiempo.'</td>
	<td border="1">'.$anyo.'</td>
	<td border="1">'.$mes.'</td>
	<td border="1">'.$dia.'</td>
	<td border="1">'.$hora.'</td>
	<td border="1">'.$minuto.'</td>
	<td border="1">'.$segundo.'</td>
	<td border="1">'.$navegador.'</td>
	<td border="1">'.$ip.'</td>
</tr>
';


}

echo '</table>';
fclose ($manejador);
?>
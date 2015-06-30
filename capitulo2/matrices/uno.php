<?php
function myfunction($v)
{
if ($v==="Miguel")
  {
  return true;
  }
return false;
}
$agenda[0]['nombre'] = "Luis";
$agenda[0]['telefono'] = 5415412342;
$agenda[0]['email'] = "gfdsafsa@fsafds.com";

$agenda[1]['nombre'] = "Miguel";
$agenda[1]['telefono'] = 000001;
$agenda[1]['email'] = "gdsfgsd@gfsa.com";

$agenda[2]['nombre'] = "Marta";
$agenda[2]['telefono'] = 757567567;
$agenda[2]['email'] = "gdfgdf@fds.com";

$agenda[3]['nombre'] = "Luis";
$agenda[3]['telefono'] = 5415412342;
$agenda[3]['email'] = "gfdsafsa@fsafds.com";

$agenda[4]['nombre'] = "Miguel";
$agenda[4]['telefono'] = 000001;
$agenda[4]['email'] = "gdsfgsd@gfsa.com";

$agenda[5]['nombre'] = "Marta";
$agenda[5]['telefono'] = 757567567;
$agenda[5]['email'] = "gdfgdf@fds.com";

print_r(array_filter($agenda,"myfunction"));


?>
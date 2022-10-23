<?php


global $sKey;
$sKey = "AIzaSyBQnsqFY61VFgaOm1sdsRh_xlTIEwsyflI";

function init_services(){
	global $sKey;
	$client = new \Google\Client();
	$client->setApplicationName("PHP/MySQL");
	$client->setDeveloperKey($sKey);
	$service = new \Google\Service\YouTube($client);
	return $service;
}


function dump($s) {
	print '<pre>';
	var_dump($s);
	print '</pre>';
}


#var_dump(init_services());
?>



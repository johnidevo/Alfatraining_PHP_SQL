<?php


global $aPicsum;

function get_picsum_list(){
	global $aPicsum;
	$aHeader = array(
		'Content-Type: application/json',
		'Connection: keep-alive',
		'User-Agent: Stadtbibliothek/Giesing',
	);

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://picsum.photos/v2/list?page=2');
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $aHeader);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$sPicsum = curl_exec($ch);
	curl_close($ch);
	$aPicsum = json_decode($sPicsum);
	return true;

/*
	print '<div class="images-list">';
	foreach ($aPicsum as $oImg) {
		$sPre = str_pad($oImg->id, 11, 0, STR_PAD_LEFT);
		print '<img id="" width="50" height="50" src="'. $oImg->download_url .'" />';
	}
	print '</div>';
*/
}


function download_picsum_list(){
	global $aPicsum;
	$aHeader = array(
		'User-Agent: Stadtbibliothek/Giesing',
		'Accept: */*',
		'Accept-Encoding: gzip, deflate, br'
	);

	foreach ($aPicsum as $i => $oImg) {
		$sPre = str_pad($oImg->id, 11, 0, STR_PAD_LEFT);
		if (file_exists('./images/'. $sPre .'.jpeg')) continue;
		$fp = fopen('./images/'. $sPre .'.jpeg', 'wb');
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $oImg->download_url);
		curl_setopt($ch, CURLOPT_FILE, $fp);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $aHeader);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$sContent = curl_exec($ch);
		fwrite($fp, $sContent);
		curl_close($ch);
		fclose($fp);
	}
	return true;
}


?>
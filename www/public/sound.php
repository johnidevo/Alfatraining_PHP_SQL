<?php
	require('draft.php');
?>

<!doctype html>
<html lang="">

<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta property="og:title" content="">
  <meta property="og:type" content="">
  <meta property="og:url" content="">
  <meta property="og:image" content="">

	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>

<body>

<?php


/*
$aHeader = array(
	'Content-Type: application/json',
	'Connection: keep-alive',
	'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0'
);

	
$cURLConnection = curl_init();
curl_setopt($cURLConnection, CURLOPT_URL, 'https://picsum.photos/v2/list?page=3');
#curl_setopt($cURLConnection, CURLOPT_URL, 'https://www.free-stock-music.com/music/mixaund-bright-morning.mp3');
curl_setopt($cURLConnection, CURLOPT_HEADER, false);
curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, $aHeader);
curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
$phoneList = curl_exec($cURLConnection);
curl_close($cURLConnection);
$jsonArrayResponse = json_decode($phoneList);

print '<div class="images-list">';

foreach ($jsonArrayResponse as $oImg) {
	print '<img width="100" height="100" src="'. $oImg->download_url .'" />';
}
print '</div>';
*/



/*
$aHeader = array(
	'User-Agent: Stadtbibliothek/Giesing',
	'Accept: /',
	'Accept-Encoding: gzip, deflate, br'
);
	
foreach ($jsonArrayResponse as $i => $oImg) {
	$sPre = str_pad($i, 3, 0, STR_PAD_LEFT);
	$ch = curl_init($oImg->download_url);
	$fp = fopen('./images/'. $sPre .'_flower.jpeg', 'wb');
	curl_setopt($ch, CURLOPT_FILE, $fp);
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $aHeader);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	#curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
	#curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  
	$sContent = curl_exec($ch);
	#var_dump($r);
	fwrite($fp, $sContent);
	
	curl_close($ch);
	fclose($fp);
}
*/

	
	
$aHeader = array(
	'User-Agent: Stadtbibliothek/Giesing',
	'Accept: */*',
	'Accept-Encoding: gzip, deflate, br',
	'Cache-Control: no-cache'
);
#url=2tech-audio-teamwork&f=play POST /inc.php
#curl_setopt($ch, CURLOPT_POST, 1);
#curl_setopt($ch, CURLOPT_POSTFIELDS, "postvar1=value1&postvar2=value2&postvar3=value3");

$sPre = str_pad(0, 3, 0, STR_PAD_LEFT);
$ch = curl_init('https://www.free-stock-music.com/inc.php');
$fp = fopen('./sound/'. $sPre .'_flower.mp3', 'wb');
curl_setopt($ch, CURLOPT_FILE, $fp);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, $aHeader);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'url=2tech-audio-teamwork&f=play');
curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
$sContent = curl_exec($ch);
fwrite($fp, $sContent);
curl_close($ch);
fclose($fp);


$aHeader = array(
	'GET /music/2tech-audio-teamwork.mp3 HTTP/2',
	'Host: www.free-stock-music.com',
	'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0',
	'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8',
	'Accept-Language: en,de;q=0.7,en-US;q=0.3',
	'Accept-Encoding: gzip, deflate, br',
	'Referer: https://www.free-stock-music.com/2tech-audio-teamwork.html',
	'Connection: keep-alive',
	'Cookie: _ga=GA1.2.1990981556.1665399299; __gads=ID=cae23fb60fb9517e-226fb08940ce0027:T=1665399448:RT=1665399448:S=ALNI_MZN_P3BlgoeQ6yHKqgYYViqky9MJg; cookieconsent_dismissed=yes; __gpi=UID=00000b747681ea15:T=1666013100:RT=1666182716:S=ALNI_MZWuUkqQD7pjFIb4Nn7yD64SDnMkw; PHPSESSID=quak92kpkh2bfk11s8c0k2n2le; _gid=GA1.2.173503313.1666182716',
	'Upgrade-Insecure-Requests: 1',
	'Sec-Fetch-Dest: document',
	'Sec-Fetch-Mode: navigate',
	'Sec-Fetch-Site: same-origin',
	'If-Modified-Since: Tue, 18 Oct 2022 05:48:07 GMT',
	'If-None-Match: "e984c0b-3d76e0-5eb48a2f048e5"',
	'Cache-Control: no-cache'
);
#url=2tech-audio-teamwork&f=play POST /inc.php
#curl_setopt($ch, CURLOPT_POST, 1);
#curl_setopt($ch, CURLOPT_POSTFIELDS, "postvar1=value1&postvar2=value2&postvar3=value3");

$sPre = str_pad(0, 3, 0, STR_PAD_LEFT);
$ch = curl_init('https://www.free-stock-music.com/music/2tech-audio-teamwork.mp3');
$fp = fopen('./sound/2tech-audio-teamwork.mp3', 'wb');
curl_setopt($ch, CURLOPT_FILE, $fp);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, $aHeader);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$sContent = curl_exec($ch);
fwrite($fp, $sContent);
curl_close($ch);
fclose($fp);
	
	
	
var_dump('####+')
?>
	
</body>

</html>
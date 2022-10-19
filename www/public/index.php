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
$aHeader = array(
	'Content-Type: application/json',
	'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8',
	'Connection: keep-alive',
	'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0'
);
/*	
$cURLConnection = curl_init();
curl_setopt($cURLConnection, CURLOPT_URL, 'https://picsum.photos/v2/list?page=1');
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
	
$aHeader = array(
	'GET /id/0/5616/3744.jpg?hmac=3GAAioiQziMGEtLbfrdbcoenXoWAW-zlyEAMkfEdBzQ HTTP/2',
	'Host: i.picsum.photos',
	'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0',
	'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8',
	'Accept-Language: en,de;q=0.7,en-US;q=0.3',
	'Accept-Encoding: gzip, deflate, br',
	'Connection: keep-alive',
	'Cookie: _ga=GA1.2.292024245.1665396105; _gid=GA1.2.1514254320.1666010434',
	'Upgrade-Insecure-Requests: 1',
	'Sec-Fetch-Dest: document',
	'Sec-Fetch-Mode: navigate',
	'Sec-Fetch-Site: none',
	'Sec-Fetch-User: ?1',
	'If-Modified-Since: Sat, 10 Sep 2022 14:40:42 GMT',
	'TE: trailers'
);

$cURLConnection = curl_init();
curl_setopt($cURLConnection, CURLOPT_URL, 'https://picsum.photos/id/0/5616/3744');
curl_setopt($cURLConnection, CURLOPT_HEADER, false);
curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, $aHeader);
curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
$pic = curl_exec($cURLConnection);
curl_close($cURLConnection);

#var_dump($pic);
$file = 'people.png';
// Append a new person to the file
#$current .= "John Smith\n";
// Write the contents back to the file
#file_put_contents($file, $pic);
	
	

$aHeader = array(
	#'GET /id/0/5616/3744.jpg?hmac=3GAAioiQziMGEtLbfrdbcoenXoWAW-zlyEAMkfEdBzQ HTTP/2',
	#'Host: i.picsum.photos',
	'User-Agent: Stadtbibliothek/Giesing',
	'Accept: */*',
	'Accept-Encoding: gzip, deflate, br'
);
	
#foreach ($jsonArrayResponse as $i => $oImg) {
	#$sPre = str_pad($i, 3, 0, STR_PAD_LEFT);
	$sPre = str_pad(0, 3, 0, STR_PAD_LEFT);
	#$ch = curl_init($oImg->download_url);
	$ch = curl_init('https://picsum.photos/id/0/5616/3744');
	$fp = fopen('./images/'. $sPre .'_flower.jpeg', 'wb');
	curl_setopt($ch, CURLOPT_FILE, $fp);
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $aHeader);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	#curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	#curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
	#curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  
	$sContent = curl_exec($ch);
	#var_dump($r);
	fwrite($fp, $sContent);
	
	curl_close($ch);
	fclose($fp);
#}

var_dump('####+')
?>
	
</body>

</html>
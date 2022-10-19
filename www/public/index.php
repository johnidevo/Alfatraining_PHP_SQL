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
$cURLConnection = curl_init();

curl_setopt($cURLConnection, CURLOPT_URL, 'https://picsum.photos/v2/list?page=1');
#curl_setopt($cURLConnection, CURLOPT_URL, 'https://www.free-stock-music.com/music/mixaund-bright-morning.mp3');
curl_setopt($cURLConnection, CURLOPT_HEADER, false);
curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, $aHeader);
curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

$phoneList = curl_exec($cURLConnection);
curl_close($cURLConnection);

$jsonArrayResponse = json_decode($phoneList);
#var_dump($jsonArrayResponse);


print '<div class="images-list">';

foreach ($jsonArrayResponse as $oImg) {
	#var_dump($oImg->download_url);
	print '<img width="100" height="100" src="'. $oImg->download_url .'" />';
}

print '</div>';
?>
	
</body>

</html>
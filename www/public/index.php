<?php


#use Draft\Controller\Youtube;

#require(__DIR__.'/../../config/bootstrap.php');
#$o_yt = new Youtube();
#var_dump($o_yt->getItems());


/*
- Download number of images selected from the view
-- Form 
- Get FFMPEG working
- 
*/


$aHeader = array(
	'Content-Type: application/json',
	'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8',
	'Connection: keep-alive',
	'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0'
);

#$aHeader = array(
#	'Accept: video/webm,video/ogg,video/*;q=0.9,application/ogg;q=0.7,audio/*;q=0.6,*/*;q=0.5',
#	'Connection: keep-alive',
#	'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0'
#);
return var_dump($aHeader)

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

/*
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
#$file = 'people.png';
// Append a new person to the file
#$current .= "John Smith\n";
// Write the contents back to the file
#file_put_contents($file, $pic);

/*
base64_encode
*/

$data = file_get_contents('people.png');

#con=file_get_contents(“tkdown.gif”);
$en = base64_encode($data);
$mime = ’image/gif’;
$binary_data = ’data:’. $mime .‘;base64,’. $en ;


return print '<img src=”'. $binary_data .'” alt=”Test”>';

return true;

$encdata = base64_encode($data);
return print '<img src="data:image/png;base64, '. $encdata .'" alt="Red dot" />';
// Output
return print $encdata; 


$string = implode('',         // map array of binary strings to binary string
    array_map('chr',          // map ord integer value to character
        unpack('v*',          // unsigned short (always 16 bit, little endian byte order)
            pack("H*", $data) // hex to binary (high nibble first)
)));
$result = imagecreatefromstring($string);
imagejpeg($result, 'test.jpg');


print '<img width="100" height="100" src="/people.png" />';

/**/






?>


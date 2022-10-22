<?php


define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'calendar');

global $oMysql, $sQuery, $aResults, $bResult;

function frontend_init()
{
	if (!frontend_sql_open()) error_throw('frontend_sql_open()');
	return true;
}

function frontend_sql_open()
{
	global $oMysql, $sQuery, $aResults;

	$oMysql = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	
	return true;
}

function frontend_sql_query()
{
	global $oMysql, $sQuery, $aResults;
	var_dump([$oMysql, $sQuery, $aResults]);
	$aResults = mysqli_query($oMysql, $sQuery);
	return true;
}

function frontend_sql_fetch()
{
	global $oMysql, $sQuery, $aResults;
	var_dump([$oMysql, $sQuery, $aResults]);
	$aResults = mysqli_query($oMysql, $sQuery);
	$aResults = mysqli_fetch_array($aResults, MYSQLI_ASSOC);
	return true;
}

/*

$query = "SELECT Name, CountryCode FROM City ORDER by ID LIMIT 3";
$result = mysqli_query($mysqli, $query);

$row = mysqli_fetch_array($result, MYSQLI_NUM);
printf("%s (%s)\n", $row[0], $row[1]);


mysqli_query($link, "CREATE TEMPORARY TABLE myCity LIKE City");

$con=mysqli_connect("localhost","my_user","my_password","my_db");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit;
}

// ....some PHP code...

mysqli_close($con);

*/

/*
- The data is stored in a database
- An external area (without login protection)
- An internal area (protected via login)
- Display appointments in an overview
- Display appointments individually in a detailed view
- Create new appointments
- Search appointments
- Edit appointments
- Delete appointments
*/


?>
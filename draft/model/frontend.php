<?php


define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'calendar');

global $oMysql, $sQuery, $aResults, $bResult;
$aResults = array();

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
	$aResults = mysqli_query($oMysql, $sQuery);
	return true;
}

function frontend_sql_fetch()
{
	global $oMysql, $sQuery, $aResults;
	$aResults = mysqli_query($oMysql, $sQuery);
	$aResults = mysqli_fetch_array($aResults, MYSQLI_ASSOC);
	return true;
}

function frontend_sql_fetch_assoc()
{
	global $oMysql, $sQuery, $aResults;
	$aResult = mysqli_query($oMysql, $sQuery);
	while ($row = mysqli_fetch_array($aResult, MYSQLI_ASSOC)) array_push($aResults, $row);
	return true;
}


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
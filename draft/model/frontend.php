<?php

function frontend_init()
{
	var_dump('frontend_init');
	return true;
}

function dbOpen($sDb='')
{
	//checks and valitations:
	if(!defined('DB_ENGINE')) {
		self::outputError('SQL connection type not defined!');
		return FALSE;
	}

	if(!defined('DB_SERVER') || !defined('DB_USER') || !defined('DB_PASS') || !defined('DB_NAME')) {
		self::outputError('Missing SQL Connection properties!');
		return FALSE;
	}

	if($sDb == '') {
		$sDb = DB_NAME;
	}

	if(!defined('DB_PORT')) {
		define('DB_PORT', 3306);
	}

	self::$oc = @mysqli_connect(DB_SERVER, DB_USER, DB_PASS, $sDb, DB_PORT);
		if (!self::$oc) {
		self::outputError(' Error #'.mysqli_connect_errno().': Unable to connect to server:'.DB_SERVER.'<hr />MySql Server is down or connection is not properly configured. Please check the configuration of sql connection!<hr />'.mysqli_connect_error());
	}
}

function dbClose()
{
	if(!mysqli_close(self::$oc)) {
		self::outputError("Something went wrong while closing MySQL connection!");
		return false;
	}
}


?>
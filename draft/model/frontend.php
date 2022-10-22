<?php


define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'calendar');


function frontend_init()
{
	var_dump('frontend_init');
	if (!frontend_db_open()) error_throw('frontend_db_open()');
	return true;
}

function frontend_db_open()
{
	$oMysql = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	var_dump($oMysql);
	return true;
}


?>
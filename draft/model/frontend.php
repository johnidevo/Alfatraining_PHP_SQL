<?php


define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'calendar');


function frontend_init()
{
	if (!frontend_db_open()) error_throw('frontend_db_open()');
	return true;
}

function frontend_db_open()
{
	$oMysql = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	#var_dump($oMysql);
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
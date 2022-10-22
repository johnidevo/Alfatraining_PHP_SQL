<?php

global $aModel;

function model_init()
{
	global $aRouter;
	switch($aRouter['page'])
	{
		case 'login':
			if (!user_login()) error_throw('user_login()');;
		break;
		case 'register':
			if (!user_register()) error_throw('user_register()');;
		break;
	}
	
	return true;
}

function user_login()
{
	global $sQuery, $aResults;
	if (empty($_POST)) return true;
	if (!isset($_POST['username']) or !isset($_POST['password'])) return true;
	
	$sQuery = "SELECT * FROM `users` WHERE `user` LIKE '". $_POST['username'] ."' AND `password` LIKE '". $_POST['password'] ."' ";
	if (!frontend_sql_fetch()) error_throw('frontend_sql_fetch()');
	$_SESSION['user'] = $aResults;
	return true;
}

function user_register()
{
	global $sQuery, $aResults;
	if (empty($_POST)) return true;
	if (!isset($_POST['username']) or !isset($_POST['password'])) return true;
	
	$sDateRegistration = strtotime('now');
	$sQuery = "INSERT INTO `users` (`id`, `user`, `password`, `registration`) 
		VALUES (NULL, '". $_POST['username'] ."', '". $_POST['password'] ."',". $sDateRegistration .");";
	if (!frontend_sql_query()) error_throw('frontend_sql_query()');
	
	$sQuery = "SELECT * FROM `users` WHERE `user` LIKE '". $_POST['username'] ."' AND `password` LIKE '". $_POST['password'] ."' ";
	if (!frontend_sql_fetch()) error_throw('frontend_sql_fetch()');
	$_SESSION['user'] = $aResults;
	return true;
}

?>
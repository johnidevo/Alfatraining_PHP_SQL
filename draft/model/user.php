<?php


global $aUser;

function user_init()
{
	global $aRouter;
	switch($aRouter['page'])
	{
		case 'login':
			if (!user_login()) error_throw('user_login()');
		break;
		case 'register':
			if (!user_register()) error_throw('user_register()');
		break;
		case 'logout':
			if (!user_logout()) error_throw('user_logout()');
		break;
		case 'dashboard':
			if (!user_access()) error_throw('user_access()');
		break;
		case 'calendar':
			if (!user_access()) error_throw('user_access()');
		break;
		case 'scheduler':
			if (!user_access()) error_throw('user_access()');
		break;
	}
	return true;
}

function user_login()
{
	global $aRouter, $sQuery, $aResults;
	
	if (!user_verify()) return true;;
	if (!isset($_POST['username']) or !isset($_POST['password'])) return true;
	
	$sQuery = "SELECT * FROM `users` WHERE `user` LIKE '". $_POST['username'] ."' AND `password` LIKE '". $_POST['password'] ."' ";
	if (!frontend_sql_fetch()) error_throw('frontend_sql_fetch()');
	setcookie('userlogin', '', time() + 3600);
	
	$_SESSION['user'] = $aResults;
	$aRouter['page'] = 'dashboard';
	if (!router_redirect()) error_throw('router_redirect()');
	return true;
}

function user_register()
{
	global $aRouter, $sQuery, $aResults;
	
	if (!user_verify()) return true;
	if (!isset($_POST['username']) or !isset($_POST['password'])) return true;
	
	$sDateRegistration = strtotime('now');
	$sQuery = "INSERT INTO `users` (`id`, `user`, `password`, `registration`) 
		VALUES (NULL, '". $_POST['username'] ."', '". $_POST['password'] ."',". $sDateRegistration .");";
	if (!frontend_sql_query()) error_throw('frontend_sql_query()');
	
	$sQuery = "SELECT * FROM `users` WHERE `user` LIKE '". $_POST['username'] ."' AND `password` LIKE '". $_POST['password'] ."' ";
	if (!frontend_sql_fetch()) error_throw('frontend_sql_fetch()');
	setcookie('userlogin', '', time() + 3600);
	
	$_SESSION['user'] = $aResults;
	$aRouter['page'] = 'dashboard';
	if (!router_redirect()) error_throw('router_redirect()');
	return true;
}

function user_logout()
{
	global $aRouter;
	session_destroy();
	setcookie('userlogin', '', time() - 3600);
	$aRouter['page'] = 'redirect';
	return true;
}

function user_verify()
{
	global $aRouter;
	if (isset($_SESSION['user']))
	{
		$aRouter['page'] = 'dashboard';
		return false;
	}
	return true;
}

function user_access()
{
	global $aRouter;
	if (isset($_SESSION['user'])) return true;
	$aRouter['page'] = 'home';
	return true;
}

?>
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
			if (!system_init()) error_throw('system_init()');
		break;
	}
	return true;
}

function user_login()
{
	global $aRouter, $sQuery, $aResults;
	
	if (!user_verify()) error_throw('user_verify()');
	if (!isset($_POST['username']) or !isset($_POST['password'])) return true;
	
	$sQuery = "SELECT * FROM `users` WHERE `user` LIKE '". $_POST['username'] ."' AND `password` LIKE '". $_POST['password'] ."' ";
	if (!frontend_sql_fetch()) error_throw('frontend_sql_fetch()');
	$_SESSION['user'] = $aResults;
	$aRouter['redirect'] = 'home';
	$aRouter['page'] = 'redirect';
	return true;
}

function user_register()
{
	global $aRouter, $sQuery, $aResults;
	
	if (!user_verify()) error_throw('user_verify()');
	if (!isset($_POST['username']) or !isset($_POST['password'])) return true;
	
	$sDateRegistration = strtotime('now');
	$sQuery = "INSERT INTO `users` (`id`, `user`, `password`, `registration`) 
		VALUES (NULL, '". $_POST['username'] ."', '". $_POST['password'] ."',". $sDateRegistration .");";
	if (!frontend_sql_query()) error_throw('frontend_sql_query()');
	
	$sQuery = "SELECT * FROM `users` WHERE `user` LIKE '". $_POST['username'] ."' AND `password` LIKE '". $_POST['password'] ."' ";
	if (!frontend_sql_fetch()) error_throw('frontend_sql_fetch()');
	$_SESSION['user'] = $aResults;
	$aRouter['redirect'] = 'home';
	$aRouter['page'] = 'redirect';
	return true;
}

function user_logout()
{
	global $aRouter;
	#die(var_dump($aRouter));
	unset($_SESSION);
	session_destroy();
	var_dump($aRouter);
	$aRouter['redirect'] = 'home';
	$aRouter['page'] = 'redirect';
	return true;
}

function user_verify()
{
	if (isset($_SESSION['user']))
	{
		$aRouter['redirect'] = 'home';
		$aRouter['page'] = 'redirect';
		#return router_redirect();
	}
	return true;
}

?>
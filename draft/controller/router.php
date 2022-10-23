<?php

global $aRouter, $aEvent;
$aRouter = $aEvent = array();

function router_init()
{
	global $aRouter;
	if (empty($_GET)) return router_redirect();
	$aRouter = array_merge($aRouter, $_GET);
	
	/*
	switch($aRouter['page'])
	{
		case 'login':
			$aRouter['page'] = '';
			if (isset($_SESSION['user'])) router_redirect();
		break;
		case 'register':
			$aRouter['page'] = '';
			if (isset($_SESSION['user'])) router_redirect();
		break;
		case 'logout':
			if (!isset($_SESSION['user'])) router_redirect();
		break;
		case 'dashboard':
			if (!isset($_SESSION['user'])) router_redirect();
		break;
	}
	*/
	
	return true;
}

function router_redirect()
{
	global $aRouter;
	if (empty($aRouter['page'])) $aRouter['page'] = 'home';
	header('HTTP/1.1 301 Moved Permanently');
	header('Location: /?'. http_build_query($aRouter));
	exit();
}

?>
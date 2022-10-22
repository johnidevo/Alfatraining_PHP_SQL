<?php

global $aRouter, $aEvent;
$aRouter = $aEvent = array();

function session_init()
{
	session_start();
	if (isset($_SESSION['user'])) return true;
	return true;
}

function router_init()
{
	global $aRouter;
	if (empty($_GET)) return router_redirect();
	$aRouter = array_merge($aRouter, $_GET);
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
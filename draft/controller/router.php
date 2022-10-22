<?php

global $aRouter, $aUser, $aEvent;
$aRouter = $aUser = $aEvent = array();

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
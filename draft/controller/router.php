<?php

global $aRouter;
$aRouter = array();

function router_init()
{
	global $aRouter;
	if (empty($_GET)) return router_redirect();
	$aRouter = array_merge($aRouter, $_GET);
	if (!router_page()) error_throw('router_page()');
	return true;
}

function router_page()
{
	global $aRouter;
	if (!file_exists(DRAFT .'view/'. $aRouter['page'] .'.php')) {
		$aRouter['page'] = 'home';
		return router_redirect();
	}
	else {
		include(DRAFT .'view/'. $aRouter['page'] .'.php');
		call_user_func($aRouter['page'] .'_init');
	}
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
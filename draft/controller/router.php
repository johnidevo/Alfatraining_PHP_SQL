<?php

global $aRouter;
$aRouter = array();

function router_init()
{
	global $aRouter;
	if (empty($_GET)) router_redirect();
	$aRouter = array_merge($aRouter, $_GET);
	return true;
}

function router_redirect($sPage = 'home', $sMode = null, $iId = null)
{
	$aUrl = array(
		'page' => $sPage,
		'mode' => $sMode,
		'id' => $iId
	);
	header('HTTP/1.1 301 Moved Permanently');
	header('Location: /?'. http_build_query($aUrl));
	exit();
}

function router_()
{

}

?>
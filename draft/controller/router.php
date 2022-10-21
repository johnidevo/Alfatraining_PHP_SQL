<?php

global $aRouter;
$aRouter = array();

function router_init()
{
	global $aRouter;
	

	
	$aRouter = array_merge($aRouter, $_GET);
	var_dump('router_get');
	return true;
}


function router_get()
{
	global $aRouterURI;
	$a_router_uri = array_merge($aRouterURI, $_GET);
	var_dump('router_get');
	return true;
}


?>
<?php

function router_get()
{
	global $a_router_uri;
	#$a_router_uri = array_merge($a_router_uri, $_GET);
	$a_router_uri = array_merge($a_router_uri, array('router_get'));
	var_dump($a_router_uri);
	return true;
}


?>
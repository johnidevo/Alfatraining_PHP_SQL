<?php
#call dispatch
#-router // get uri parameter for request
#--call model // prepare material
#---call system // process material
#---setup frontend // update database
#--call widget.php function to form the content // refere data
#-call view // setup html document
#end dispatcher // build

global $a_router_uri;

$a_router_uri = array();

function dispatcher_dispatch()
{
	global $a_router_uri;
	$a_router_uri = array_merge($a_router_uri, array('dispatcher_dispatch'));

	if (!router_get($a_router_uri)) error_throw('router_get()');
	var_dump($a_router_uri);
	return true;
}

if (!dispatcher_dispatch()) error_throw('dispatcher_dispatch()');

var_dump($a_router_uri);

#echo '<pre>';
#var_dump($GLOBALS);
#echo '</pre>';

?>
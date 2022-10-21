<?php
	
#call dispatch

#-router // get uri parameter for request
#--call model // prepare material
#---call system // process material
#---setup frontend // update database
#--call widget.php function to form the content // refere data
#-call view // setup html document

#end dispatcher // build

/*
$name = "Nathan";

function greetings() {
    global $name;
    echo $name;
    echo $name;
    $name = "Joe";
    echo $name;

}

//👇 prints Joe
greetings();

//👇 prints Joe as well
echo $name;
*/

global $a_router_uri;

$a_router_uri = array();

function dispatcher_dispatch()
{
	#global $a_router_uri;
	
	
	var_dump($GLOBALS['a_router_uri']);
	var_dump($GLOBALS);
	$a_router_uri = array_merge($a_router_uri, 'dispatcher_dispatch');
	var_dump($a_router_uri);
	return true;
}

if (!router_get()) error_throw('router_get()');

if (!dispatcher_dispatch()) error_throw('dispatcher_dispatch()');



var_dump($a_router_uri);
#echo '<pre>';
#var_dump($GLOBALS);
#echo '</pre>';

?>
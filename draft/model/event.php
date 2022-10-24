<?php


global $aEvent;

function event_init()
{
	global $aEvent;
	$_SESSION['event'] = '';
	$aEvent = &$_SESSION['event'] ;
	return true;
}


function event_clear()
{
	if (!empty($_SESSION['event'])) $_SESSION['event'] = '';
	return true;
}

?>
<?php


global $aEvent;

function event_init()
{
	global $aEvent;
	$aEvent = &$_SESSION['event'] ;
	return true;
}

function event_clear()
{
	if (!empty($_SESSION['event'])) $_SESSION['event'] = '';
	return true;
}

function event_success($sMessage = 'Success')
{
	global $aEvent;
	#$_SESSION['event'] = $sMessage;
	$aEvent = $sMessage;
	return true;
}
?>
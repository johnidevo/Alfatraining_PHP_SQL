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
	$aEvent['message'] = $sMessage;
	$aEvent['type'] = 'success';
	return true;
}

function event_error($sMessage = 'Error')
{
	global $aEvent;
	$aEvent['message'] = $sMessage;
	$aEvent['type'] = 'error';
	return true;
}

function event_warning($sMessage = 'Warrning')
{
	global $aEvent;
	$aEvent['message'] = $sMessage;
	$aEvent['type'] = 'warrning';
	return true;
}
?>
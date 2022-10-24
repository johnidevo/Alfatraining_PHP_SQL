<?php


global $aScheduler;

function scheduler_init()
{
	global $aRouter;
	switch($aRouter['page'])
	{
		case 'planer':
			if (!scheduler_planer()) error_throw('scheduler_planer()');
		break;
	}
	return true;
}

function scheduler_planer()
{
	global $aRouter, $sQuery, $aResults, $aEvent;
	if (!isset($_POST['date_planer']) or !isset($_POST['hour_planer'])) return true;
	$iDate = strtotime(date('Y-m-d', $_POST['date_planer']) .' '. $_POST['hour_planer']);
	$sQuery = "INSERT INTO `appointments` (`id`, `date`) VALUES (NULL, '". $iDate ."');";
	if (!frontend_sql_query()) error_throw('frontend_sql_query()');
	event_success();
	return true;
}


?>
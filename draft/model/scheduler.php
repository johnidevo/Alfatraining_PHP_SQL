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
		case 'scheduler':
			if (!scheduler_list()) error_throw('scheduler_list()');
		break;
	}
	return true;
}

function scheduler_planer()
{
	global $aRouter, $sQuery, $aResults, $aEvent;
	if (empty($_POST)) return true;
	if (!isset($_POST['date_planer'])) return event_error();
	if (!isset($_POST['hour_planer'])) return event_error();
	$iDate = strtotime(date('Y-m-d', $_POST['date_planer']) .' '. $_POST['hour_planer']);
	$sQuery = "INSERT INTO `appointments` (`id`, `date`) VALUES (NULL, '". $iDate ."');";
	if (!frontend_sql_query()) error_throw('frontend_sql_query()');
	if (!event_success()) error_throw('event_success()');
	return true;
}

function scheduler_list()
{
	global $sQuery, $aResults;
	$sQuery = "SELECT * FROM `appointments`";
	if (!frontend_sql_fetch_assoc()) error_throw('frontend_sql_fetch_assoc()');
	var_dump($aResults);
	return true;
}



?>
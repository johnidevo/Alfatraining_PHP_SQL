<?php


global $aScheduler;
$aScheduler = array();

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
	if (isset($aRouter['id'])) return scheduler_planer_update();
	if (isset($aRouter['delete'])) return scheduler_planer_delete();
	if (empty($_POST)) return true;
	if (!isset($_POST['date_planer'])) return event_error();
	if (!isset($_POST['hour_planer'])) return event_error();
	$iDate = strtotime(date('Y-m-d', $_POST['date_planer']) .' '. $_POST['hour_planer']);
	$sQuery = "INSERT INTO `appointments` (`id`, `date`) VALUES (NULL, '". $iDate ."');";
	if (!frontend_sql_query()) error_throw('frontend_sql_query()');
	if (!event_success()) error_throw('event_success()');
	return true;
}

/*
10 P	5. Daten bearbeiten: Erstellen Sie einen internen Bereich 
		mit einer Anzeige der Verwaltungsübersicht inkl. Sortierung der Daten.	
*/
function scheduler_list()
{
	global $sQuery, $aResults;
	$sQuery = "SELECT * FROM `appointments` WHERE `date` >= ". strtotime(date('Ym01', strtotime(time() .'-1 week') )) ." ORDER BY date ASC;";
	if (!frontend_sql_fetch_assoc()) error_throw('frontend_sql_fetch_assoc()');
	return true;
}


function scheduler_planer_update()
{
	global $aRouter, $sQuery, $aResults, $aScheduler;
	$sQuery = "SELECT * FROM `appointments` WHERE `id` = ". $aRouter['id'] .";";
	if (!frontend_sql_fetch()) error_throw('frontend_sql_fetch()');
	$aScheduler['update'] = $aResults;
	/*  */
	if (empty($_POST)) return true;
	if (!isset($_POST['date_planer'])) return event_error();
	if (!isset($_POST['hour_planer'])) return event_error();
	$iDate = strtotime(date('Y-m-d', $_POST['date_planer']) .' '. $_POST['hour_planer']);
	$sQuery = "UPDATE `appointments` SET `date` = '". $iDate ."' WHERE `appointments`.`id` = ". $aRouter['id'] .";";
	if (!frontend_sql_query()) error_throw('frontend_sql_query()');
	if (!event_success()) error_throw('event_success()');
	/*  */
	$sQuery = "SELECT * FROM `appointments` WHERE `id` = ". $aRouter['id'] .";";
	if (!frontend_sql_fetch()) error_throw('frontend_sql_fetch()');
	$aScheduler['update'] = $aResults;
	#unset($aRouter['id']);
	return true;
}

function scheduler_planer_delete()
{
	global $aRouter, $sQuery, $aResults;
	/*  */
	if (!isset($aRouter['delete'])) return event_error();
	$sQuery = "DELETE FROM `appointments` WHERE `id` = ". $aRouter['delete'] .";";
	if (!frontend_sql_fetch()) error_throw('frontend_sql_fetch()');
	unset($aRouter['delete']);
	if (!event_success()) error_throw('event_success()');
	return true;
}

?>
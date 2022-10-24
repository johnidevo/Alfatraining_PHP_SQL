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
	global $aRouter, $sQuery, $aResults;
	var_dump($_POST);
	return true;
}


?>
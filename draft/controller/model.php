<?php

global $aModel;

function model_init()
{
	global $aRouter;
	switch($aRouter['page'])
	{
		case 'register':
			model_register_user();
		break;
	}
	
	return true;
}

function model_register_user()
{
	global $aRouter;
	switch($aRouter['page'])
	{
		case 'register':
			model_register_user();
		break;
	}
	
	return router_redirect();
}



?>
<?php

global $aModel;

function model_init()
{
	global $aRouter;
	switch($aRouter['page'])
	{
		case 'login':
			if (!model_login_user()) error_throw('model_login_user()');;
		break;
		case 'register':
			if (!model_register_user()) error_throw('model_register_user()');;
		break;
	}
	
	return true;
}

function model_login_user()
{
	global $aUser;
	
	
	#$_POST['username'] $_POST['password'];
	var_dump($_POST);
	return true;
}

function model_register_user()
{
	global $aUser;
	
	#$_POST['username'] $_POST['password'];
	var_dump($_POST);
	return true;
}


?>
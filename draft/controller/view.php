<?php

global $aView;
$aView = array();

function view_setup()
{
	if (!view_page()) error_throw('view_page()');
	return true;
}

function view_page()
{
	global $aRouter;
	if (!file_exists(DRAFT .'view/'. $aRouter['page'] .'.php')) {
		$aRouter['page'] = 'home';
		return router_redirect();
	}
	else {
		include(DRAFT .'view/'. $aRouter['page'] .'.php');
		call_user_func($aRouter['page'] .'_init');
	}
	
	
	var_dump($_SESSION);
	
	return true;
}

function view_get_page() {
	var_dump(file_exists(DRAFT .'view/main.php'));
	return true;
}


?>
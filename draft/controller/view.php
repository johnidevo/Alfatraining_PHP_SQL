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
	#var_dump(['view_page', file_exists(DRAFT .'view/'. $aRouter['page'] .'.php')]);
	include(DRAFT .'view/'. $aRouter['page'] .'.php');
	call_user_func($aRouter['page'] .'_init');
	return true;
}

function view_get_page() {
	#var_dump(file_exists(DRAFT .'view/main.php'));
	return true;
}


?>
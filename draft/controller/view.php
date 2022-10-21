<?php

global $aView;
$aView = array();

function view_setup()
{
	var_dump('view_setup');
	if (!view_set_variables()) error_throw('view_set_variables()');
	if (!view_get_page()) error_throw('view_get_page()');
	return true;
}

function view_set_variables() {
	global $aView;
	global $aView;
	var_dump(file_exists(DRAFT .'view/main.php'));
	return true;
}

function view_get_page() {
	var_dump(file_exists(DRAFT .'view/main.php'));
	return true;
}


?>
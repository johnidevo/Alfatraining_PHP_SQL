<?php

global $aView;
$aView = array();

function view_setup()
{
	return true;
}

function view_get_page() {
	#var_dump(file_exists(DRAFT .'view/main.php'));
	return true;
}


?>
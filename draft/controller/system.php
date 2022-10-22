<?php

#get_public_holidays_germany
#

global $aSystem;

function system_init()
{
	var_dump('system_init');
	if (!isset($_SESSION['user'])) return true;
	return true;
}
?>
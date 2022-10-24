<?php

global $aModel;

function model_init()
{
	global $aRouter;
	if (!user_init()) error_throw('user_init()');
	if (!scheduler_init()) error_throw('scheduler_init()');
	return true;
}

?>
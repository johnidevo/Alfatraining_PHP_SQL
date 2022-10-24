<?php

global $aModel;

function model_init()
{
	global $aRouter;
	if (!user_init()) error_throw('user_init()');
	if (!scheduler_init()) error_throw('scheduler_init()');
	
	if (!event_init()) error_throw('event_init()');
	return true;
}

?>
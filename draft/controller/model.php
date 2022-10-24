<?php

global $aModel;

function model_init()
{
	global $aRouter;
	if (!event_init()) error_throw('event_init()');
	if (!user_init()) error_throw('user_init()');
	if (!scheduler_init()) error_throw('scheduler_init()');
	
	return true;
}

?>
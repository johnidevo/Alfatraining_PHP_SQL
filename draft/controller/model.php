<?php

function model_set()
{
	var_dump('model_set');
	if (!frontend_init()) error_throw('frontend_init()');
	return true;
}
?>
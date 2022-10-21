<?php

function view_render()
{
	var_dump('view_render');
	if (!widget_init()) error_throw('widget_init()');
	return true;
}
?>
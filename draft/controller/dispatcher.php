<?php


#call dispatch
#-router // get uri parameter for request
#-call model // prepare material
#-setup frontend // update database
#-call widget.php function to form the content // refere data
#-call view // setup html document
#end dispatcher // build


function dispatcher_dispatch()
{
	if (!router_get()) error_throw('router_get()');
	if (!model_set()) error_throw('model_set()');
	if (!frontend_init()) error_throw('frontend_init()');
	if (!widget_init()) error_throw('widget_init()');
	if (!view_render()) error_throw('view_render()');
	return true;
}


?>
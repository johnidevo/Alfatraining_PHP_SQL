<?php


#call dispatch
#-router // get uri parameter for request
#-call model // prepare material
#-setup frontend // update database
#-call view // setup html document
#-call widget.php function to form the content // refere data
#end dispatcher // build


function dispatcher_dispatch()
{
	if (!router_init()) error_throw('router_init()');
	if (!model_set()) error_throw('model_set()');
	if (!frontend_init()) error_throw('frontend_init()');
	if (!view_setup()) error_throw('view_render()');
	if (!widget_init()) error_throw('widget_init()');
	return true;
}


?>
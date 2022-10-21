<?php
#call dispatch
#--router // get uri parameter for request
#--call model // prepare material
#---setup frontend // update database
#--call view // setup html document
#---call widget.php function to form the content // refere data
#end dispatcher // build



function dispatcher_dispatch()
{
	global $a_router_uri;
	if (!router_get()) error_throw('router_get()');
	if (!model_set()) error_throw('model_set()');
echo '<pre>';
var_dump(array('dispatcher', $a_router_uri));
echo '</pre>';

	if (!view_render()) error_throw('view_render()');
	return true;
}



?>
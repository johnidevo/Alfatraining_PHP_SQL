<?php
	
#call dispatch

#-router // get uri parameter for request
#--call model // prepare material
#---call system // process material
#---setup frontend // update database
#--call widget.php function to form the content // refere data
#-call view // setup html document

#end dispatcher // build

global $sPage;

function dispatcher_dispatch() {
	if (!router_get()) error_throw('router_get()');
	return true;
}

?>
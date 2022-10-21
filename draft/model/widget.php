<?php

# get uri wiev/widget name
# set html document tags
# spread stylesheets tags into HTML document
# spread javascript script tags
# call {widget_name}.on.load() function inside js tags
# 


function widget_init()
{
	global $aView;
	var_dump($aView);
	var_dump('widget_init');
	if (!view_get_page()) error_throw('view_get_page()');
	return true;
}


?>
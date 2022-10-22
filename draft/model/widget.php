<?php

# get uri wiev/widget name
# set html document tags
# spread stylesheets tags into HTML document
# spread javascript script tags
# call {widget_name}.on.load() function inside js tags
# 


global $aWidget;
$aWidget = array();

function widget_js()
{
	global $aRouter, $aWidget;
	$sScript = file_get_contents(DRAFT .'static/'. $aRouter['page'] .'.js');
	$aWidget['script'] = '<script>'. $sScript .PHP_EOL. $aRouter['page'] .'.on.load();</script>';
	return true;
}

function widget_css()
{
	global $aRouter, $aWidget;
	$aWidget['style'] = '<style>'. file_get_contents(DRAFT .'static/'. $aRouter['page'] .'.css') .'</style>';
	return true;
}

function widget_html()
{
	global $aRouter, $sPage, $aWidget;
	
	$aWidget['html'] = '';
	
	$aWidget['html'] .= '<!--- doctype -->';
	$aWidget['html'] .= '<!doctype html>';
	$aWidget['html'] .= '<!--- html -->';
	$aWidget['html'] .= '<html class="no-js" lang="'. (isset($aRouter['lang'])? $aRouter['lang']: '') .'">';
	
	$aWidget['html'] .= '<!--- head -->';
	$aWidget['html'] .= '<head>';
	$aWidget['html'] .= '<meta charset="utf-8">';
	$aWidget['html'] .= '<title></title>';
	$aWidget['html'] .= $aWidget['style'];
	$aWidget['html'] .= '</head>';
	$aWidget['html'] .= '<!--- /head -->';
	
	$aWidget['html'] .= '<!--- body -->';
	$aWidget['html'] .= '<body>';
	$aWidget['html'] .= $sPage;
	$aWidget['html'] .= $aWidget['script'];
	$aWidget['html'] .= '</body>';
	$aWidget['html'] .= '<!--- /body -->';
	
	$aWidget['html'] .= '<!--- /html -->';
	$aWidget['html'] .= '</html>';
	
	return true;
}

function widget_init()
{
	global $aWidget;
	if (!widget_js()) error_throw('widget_js()');
	if (!widget_css()) error_throw('widget_css()');
	if (!widget_html()) error_throw('widget_html()');
	
	print $aWidget['html'];
	return true;
}

?>
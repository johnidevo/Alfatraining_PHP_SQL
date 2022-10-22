<?php

# get uri wiev/widget name
# set html document tags
# spread stylesheets tags into HTML document
# spread javascript script tags
# call {widget_name}.on.load() function inside js tags
# 


global $aWidget;
$aWidget = array();

$aWidget['header'] = $aWidget['footer'] = '';

$aWidget['header'] .= '<!doctype html>';
$aWidget['header'] .= '<html class="no-js" lang="">';
$aWidget['header'] .= '<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	
  <meta property="og:title" content="">
  <meta property="og:type" content="">
  <meta property="og:url" content="">
  <meta property="og:image" content="">
	
  <link rel="stylesheet" href="css/chart.css">
</head>';

$aWidget['footer'] .= '<body>';
$aWidget['footer'] .= '</body></html>';



function widget_js()
{
	global $aRouter, $aWidget;
	$aWidget['script'] = '<script>'. file_get_contents(DRAFT .'static/'. $aRouter['page'] .'.js') .'</script>';
	var_dump('widget_js');
	return true;
}

function widget_css()
{
	global $aRouter, $aWidget;
	$aWidget['style'] = '<style>'. file_get_contents(DRAFT .'static/'. $aRouter['page'] .'.css') .'</style>';
	var_dump('widget_css');
	return true;
}

function widget_html()
{
	
	var_dump('widget_html');
	return true;
}

function widget_init()
{
	
	if (!widget_js()) error_throw('widget_js()');
	if (!widget_css()) error_throw('widget_css()');
	
	global $aRouter, $sPage, $aWidget;
	
	$aWidget = array_merge($aWidget, array(
		#$aWidget['header'],
		#$aWidget['script'],
		#$aWidget['footer'],
		$aRouter,
		$sPage
	));

	var_dump(array(
		'######',
		#$aWidget,
		#$aRouter,
		$sPage 
	));
	
	print implode($aWidget);
	var_dump('widget_init');
	return true;
}

?>
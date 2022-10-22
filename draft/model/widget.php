<?php

# get uri wiev/widget name
# set html document tags
# spread stylesheets tags into HTML document
# spread javascript script tags
# call {widget_name}.on.load() function inside js tags
# 


global $aWidget, $sWidgetHeader, $sWidgetFooter;
$aWidget = array();
$sWidgetHeader = $sWidgetFooter = '';


$sWidgetHeader .= '<!doctype html><html class="no-js" lang="">';
$sWidgetHeader .= '<head>
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
$sWidgetHeader .= '<body>';

#$sContent .= '<script src="js/main.js"></script>';
$sWidgetFooter .= '</body></html>';


function widget_init()
{
	global $aView;
	var_dump($aView);
	var_dump('widget_init');
	if (!view_get_page()) error_throw('view_get_page()');
	return true;
}

?>
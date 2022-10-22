<?php

# get uri wiev/widget name
# set html document tags
# spread stylesheets tags into HTML document
# spread javascript script tags
# call {widget_name}.on.load() function inside js tags
# 


global $aWidget, $aPagesNav;
$aWidget = array();
$aPagesNav = array(
	'home' => 'Startseite',
	'login' => 'Login',
	'register' => 'Register'
);

function widget_init()
{
	global $aWidget;
	if (!widget_js()) error_throw('widget_js()');
	if (!widget_css()) error_throw('widget_css()');
	if (!widget_nav()) error_throw('widget_nav()');
	if (!widget_html()) error_throw('widget_html()');
	
	print $aWidget['html'];
	return true;
}

function widget_js()
{
	global $aRouter, $aWidget;
	$sScript = file_get_contents(DRAFT .'static/'. $aRouter['page'] .'.js');
	$aWidget['script'][] = '<script>'. $sScript .PHP_EOL. $aRouter['page'] .'.on.load();</script>';
	return true;
}

function widget_css()
{
	global $aRouter, $aWidget;
	$aWidget['style'][] = '<link rel="stylesheet" href="/draft/static/water.css">';
	$aWidget['style'][] = '<link rel="stylesheet" href="/draft/static/layer.css">';
	$aWidget['style'][] = '<style>'. file_get_contents(DRAFT .'static/'. $aRouter['page'] .'.css') .'</style>';
	return true;
}

function widget_nav()
{
	global $aRouter, $aWidget, $aPagesNav;
	$aWidget['nav'] = '';
	$aPagesLinks = array();
	
	foreach ($aPagesNav as $sLink => $sName) {
		if ($aRouter['page'] == $sLink) $sSelected = 'selected';
		else $sSelected = '';
		$sLink = '<li><a class="'. $sSelected .'" href="?page='. $sLink .'">'. $sName .'</a></li>';
		array_push($aPagesLinks, $sLink);
	}
	
	$aWidget['nav'] .= '<nav class="shadow">
		<div class="container">
			<img alt="Suiteziel" id="logo" src="public/suiteziel_ug.svg">
			<h2>Suite & Ziel <small>Terminplaner</small></h2>
			<ul>'. implode(PHP_EOL, $aPagesLinks).'</ul>
		</div>
	</nav>';
	return true;
}

function widget_events()
{
	global $aRouter, $aEvent, $aWidget;
	return true;
}


function widget_html()
{
	global $aRouter, $aPage, $aWidget;
	$aWidget['html'] = '';
	
	$aWidget['html'] .= '<!--- doctype -->';
	$aWidget['html'] .= '<!doctype html>';
	$aWidget['html'] .= '<!--- html -->';
	$aWidget['html'] .= '<html class="" lang="'. (isset($aRouter['lang'])? $aRouter['lang']: '') .'">';
	
	$aWidget['html'] .= '<!--- head -->';
	$aWidget['html'] .= '<head>';
	$aWidget['html'] .= '<meta charset="utf-8">';
	$aWidget['html'] .= '<title>'. $aPage['title'] .'</title>';
	$aWidget['html'] .= implode(PHP_EOL, $aWidget['style']);
	$aWidget['html'] .= '</head>';
	$aWidget['html'] .= '<!--- /head -->';
	
	$aWidget['html'] .= '<!--- body -->';
	$aWidget['html'] .= '<body>';
	$aWidget['html'] .= $aWidget['nav'];
	$aWidget['html'] .= $aPage['content'];
	$aWidget['html'] .= implode(PHP_EOL, $aWidget['script']);
	$aWidget['html'] .= '</body>';
	$aWidget['html'] .= '<!--- /body -->';
	
	$aWidget['html'] .= '<!--- /html -->';
	$aWidget['html'] .= '</html>';
	
	return true;
}
?>

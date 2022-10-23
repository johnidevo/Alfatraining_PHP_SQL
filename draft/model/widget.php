<?php

# get uri wiev/widget name
# set html document tags
# spread stylesheets tags into HTML document
# spread javascript script tags
# call {widget_name}.on.load() function inside js tags
# 


global $aWidget;
$aWidget = array();

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
	global $aRouter, $aPage, $aWidget;
	
	if (file_exists(DRAFT .'static/'. $aRouter['page'] .'.js')){
		$sScript = file_get_contents(DRAFT .'static/'. $aRouter['page'] .'.js');
		$sScriptCall = $aRouter['page'] .'.on.load();';
	}
	else{
		$sScript = $sScriptCall = '';
	}
	
	if (isset($aPage['script'])){
		$sScriptPage = $aPage['script'];
	}
	else {
		$sScriptPage = '';
	}
	
	$aWidget['script'][] = '<script>'.PHP_EOL.
			$sScript .PHP_EOL.
			$sScriptPage .PHP_EOL.
			$sScriptCall .PHP_EOL.
		'</script>';
	
	return true;
}

function widget_css()
{
	global $aRouter, $aWidget;
	$aWidget['style'][] = '<link rel="stylesheet" href="/draft/static/water.css">';
	$aWidget['style'][] = '<link rel="stylesheet" href="/draft/static/layer.css">';
	if (file_exists(DRAFT .'static/'. $aRouter['page'] .'.css'))
	$aWidget['style'][] = '<style>'. file_get_contents(DRAFT .'static/'. $aRouter['page'] .'.css') .'</style>';
	return true;
}

function widget_nav()
{
	global $aRouter, $aWidget, $aRouterNav;
	$aWidget['nav'] = '';
	$aPagesLinks = array();
	
	foreach ($aRouterNav as $sLink => $sName) {
		if ($aRouter['page'] == $sLink) $sSelected = 'selected';
		else $sSelected = '';
		if (isset($_SESSION['user']) && $sLink == 'login') continue;
		if (isset($_SESSION['user']) && $sLink == 'register') continue;
		if (!isset($_SESSION['user']) && $sLink == 'logout') continue;
		if (!isset($_SESSION['user']) && $sLink == 'dashboard') continue;
		if (isset($_SESSION['user']) && $sLink == 'home') continue;
		if (!isset($_SESSION['user']) && $sLink == 'calendar') continue;
		if (!isset($_SESSION['user']) && $sLink == 'scheduler') continue;
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

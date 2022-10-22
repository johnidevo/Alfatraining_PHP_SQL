<?php
!defined('ROOT') && define('ROOT', __DIR__ .'/');
!defined('DRAFT') && define('DRAFT', ROOT .'/draft/');
!defined('VAR_SQL') && define('VAR_SQL', ROOT .'/sql/');

function autoload_custom()
{
	$sComposer = file_get_contents(ROOT .'alfatraining.json');
	$aComposer = json_decode($sComposer);
	foreach($aComposer->autoload->files as $sFile) include(ROOT . $sFile);
	return true;
}

if (!autoload_custom()) return print('autoload_custom()');
if (!dispatcher_dispatch()) error_throw('dispatcher_dispatch()');
?>

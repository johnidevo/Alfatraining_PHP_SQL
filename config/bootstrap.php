<?php

!defined('ROOT') && define('ROOT', __DIR__ .'/../');
!defined('DRAFT') && define('DRAFT', ROOT .'/draft/');
!defined('VAR_SQL') && define('VAR_SQL', ROOT .'/var/sql/');
!defined('WWW_PUBLIC') && define('WWW_PUBLIC', ROOT .'/www/public/');

function autoload_custom()
{
	$sComposer = file_get_contents(ROOT .'alfatraining.json');
	$aComposer = json_decode($sComposer);
	foreach($aComposer->autoload->files as $sFile) include(ROOT . $sFile);
}

autoload_custom();

?>
<?php

!defined('ROOT') && define('ROOT', __DIR__ .'/../');
!defined('BIN') && define('BIN', ROOT .'/bin/');
!defined('WWW') && define('WWW', ROOT .'/www/');
!defined('DRAFT') && define('DRAFT', ROOT .'/draft/');

function autoload_custom()
{
	$sComposer = file_get_contents(ROOT .'composer.json');
	$aComposer = json_decode($sComposer);
	foreach($aComposer->autoload->files as $sFile) include(ROOT . $sFile);
}

autoload_custom();


?>
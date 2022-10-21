<?php

!defined('ROOT') && define('ROOT', __DIR__ .'/../');
!defined('BIN') && define('BIN', ROOT .'/bin/');
!defined('WWW') && define('WWW', ROOT .'/www/');
!defined('DRAFT') && define('DRAFT', ROOT .'/draft/');

# PSR-4 autoload //disabled
#require(__DIR__ .'/../vendor/autoload.php');

function autoload_custom() {
	$sComposer = file_get_contents(ROOT .'composer.json');
	var_dump($sComposer);
}



?>
<?php

# PSR-4 autoload
require(__DIR__ .'/../vendor/autoload.php');

!defined('ROOT') && define('ROOT', __DIR__ .'/../');
!defined('BIN') && define('BIN', ROOT .'/bin/');
!defined('WWW') && define('WWW', ROOT .'/www/');
!defined('DRAFT') && define('DRAFT', ROOT .'/draft/');


?>
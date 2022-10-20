<?php

# PSR-4 autoload
require(__DIR__ .'/../vendor/autoload.php');

!defined('MY_CONST') && define('MY_CONST', 'hello');
!defined('WWW') && define('WWW', __DIR__ .'/../www/public');


?>
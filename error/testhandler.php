<?php

require_once('./MyErrorHandler.php');

error_reporting(-1);
ini_set('error_log','./error_log.log');

set_error_handler(array('MyErrorHandler','deal'));
settype($var,'king');

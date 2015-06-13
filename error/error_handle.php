<?php
header('content-type:text/html;charset=utf-8');
error_reporting(-1);

function customError($errno,$errmsg,$file,$line)
{
    echo "<b>erro code:</b> [{$errno}] {$errmsg}<br/>".PHP_EOL;
    echo "<b>error line:</b>{$file} line{$line}<br/>".PHP_EOL;
    echo "<b>php version:</b>".PHP_VERSION."(".PHP_OS.")<br/>".PHP_EOL;
}

set_error_handler('customError');
echo $test;
settype($var,'king');

trigger_error('this is a test of error',E_USER_ERROR);

echo "test";
restore_error_handler();

echo $test;


?>

<?php
function __autoload($class_name)
{
    echo "__autoload class:".$class_name."\n";
    require_once("libs/".$class_name.'.php');
}

function classLoader($class_name)
{
    echo "classload class:".$class_name."\n";
    require_once("libs/".$class_name.'.php');

}

spl_autoload_register('classLoader');
new Test();
?>

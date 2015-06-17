<?php
function classLoader($class_name)
{
    set_include_path("libs/");
    spl_autoload($class_name);
}
spl_autoload_register('classLoader');
new Test();
?>

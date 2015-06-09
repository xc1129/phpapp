<?php

require_once('./common.php');

class Init extends Common
{
    public function index()
    {
        $this->check();
    }

}

$init=new Init();
$init->check();
?>

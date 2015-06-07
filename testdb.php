<?php

require_once('./db.php');
$connect=Db::getInstance()->connect();

$sql="select * from test";
$result=mysql_query($sql);
echo mysql_num_rows($result);
var_dump($result);

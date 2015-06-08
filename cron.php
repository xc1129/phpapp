<?php
//make crontab run script

require_once('./db.php');
require_once('./file.php');

$sql="select * from test where id='1'";

try
{
    $connect=Db::getInstance()->connect();
}
catch(Exception $e)
{
    //$e->getMessage();
    //return Response::show(403,'database connection error');
    file_put_contents('./logs/'.date('y-m-d').'.txt',$e->getMessage());
    return;
}

$result=mysql_query($sql,$connect);
$items=array();
while($item=mysql_fetch_assoc($result))
{
     $items[]=$item;
}

$file=new File();
if($items)
{
    $file->cacheData('index_cron_cache',$items);
}
else
{
    file_put_contents('./logs/'.date('y-m-d').'.txt',"no data");
}


?>

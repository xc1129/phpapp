<?php
//http://app.com/list.php?page=1&pagesize-12

require_once('./response.php');
require_once('./db.php');
require_once('./file.php');

$page=isset($_GET['page'])?$_GET['page']:1;
$pageSize=isset($_GET['pagesize'])?$_GET['pagesize']:1;

if(!is_numeric($page)||!is_numeric($pageSize))
{
    return Response::show(401,'data illegle');
}

$offset=($page-1)*$pageSize;
$sql="select * from test where id='1'";
$cache=new File();
$items=array();

if(!$items=$cache->cacheData('index_test_cache'.$page.'-'.$pageSize))
{
    try
    {
        $connect=Db::getInstance()->connect();
    }
    catch(Exception $e)
    {
        //$e->getMessage();
        return Response::show(403,'database connection error');
    }
    $result=mysql_query($sql,$connect);

    while($item=mysql_fetch_assoc($result))
    {
        $items[]=$item;
    }

    if($items)
    {
        $cache->cacheData('index_test_cache'.$page.'-'.$pageSize,$items,1200);
    }
}

if($items)
{
    return Response::show(200,'data access success',$items);
}
else
{
    return Response::show(400,'data access failed',$items);
}
var_dump($items);

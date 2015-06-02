<?php
//require_once('./response.php');
require_once('./file.php');
$data=array(
    'id'=>1,
    'name'=>'test',
    'type'=>array(4,5,6),
    'test'=>array(1,232,67=>array(1273,'test11'))
);

//Response::show(200,'successfully',$data,'json');
//Response::show(200,'successfully',$data);

$file=new File();
if($file->cacheData('index_test_cache',null))
{
    echo 'success';
}
else
{
    echo 'error';
}

?>

<?php
require_once('./response.php');
$arr=array(
    'id'=>1,
    'name'=>'test'
);

Response::json(200,'return successfully',$arr);
?>

<?php

$obj=new SplDoublyLinkedList();
$obj->push('1');
$obj->unshift('10');
print_r($obj);

$obj->rewind();
echo $obj->current()."\n";
$obj->next();
echo $obj->current();
f($obj->valid())
    echo "balid list\n";
?>


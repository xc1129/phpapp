<?php

$array=['value1','value2','value3','value4'];
$outerObj=new OuterImpl(new ArrayIterator($array));

foreach($outerObj as $key =>$value)
{
    echo "++".$key." - ".$value."\n";
}

class OuterImpl extends Iteratoriterator
{
    public function current(){
        return parent::current()."_tail";
    }

    public function key(){
        return "Pre_".parent::key();
    }
}  
?>

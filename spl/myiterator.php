<?php

$fruits=array(
    "apple"=>'apple value',
    "orange"=>'orange value',
    "grape"=>'grape value',
    "plum"=>'plum value'
);

print_r($fruits);
echo "\n";

foreach ($fruits as $key =>$value)
{
    echo $key." ".$value."\n";
}

$obj=new ArrayObject($fruits);
$it=$obj->getIterator();

foreach ($it as $key => $value)
{
    echo $key." ".$value."\n";
}
$it->rewind();
$it->ksort();
while($it->valid())
{
    echo $it->key().":".$it->current()."\n";
    $it->next();
}

$it->rewind();
if($it->valid())
{
    $it->seek(1);
    while($it->valid())
    {
        echo $it->key()." ".$it->current()."\n";
        $it->next();
    }
}


$array_a=new ArrayIterator(array('a','b','c'));
$array_b=new ArrayIterator(array('d','e','f'));
$it1=new AppendIterator();
$it1->append($array_a);
$it1->append($array_b);
foreach ($it1 as $key => $value)
{
    echo $value."\n";
}

$idIter =new ArrayIterator(array('01','02','03'));
$nameIter = new ArrayIterator(array('jack','tom','mike'));
$ageIter=new ArrayIterator(array('22','23','24'));
$mit=new MultipleIterator(MultipleIterator::MIT_KEYS_ASSOC);
$mit->attachIterator($idIter,"ID");
$mit->attachIterator($nameIter,"NAME");
$mit->attachIterator($ageIter,"AGE");

foreach ($mit as $key => $value)
{
     print_r($value);
}




$it3=new FileSystemIterator('.');
date_default_timezone_set('PRC');
foreach ($it3 as $finfo)
{
    printf("%s\t%s\t%8s\t%s\n",date("y-m-d H:i:L",$finfo->getMtime()),$finfo->isDir()?"<DIR>":"",number_format($finfo->getSize()),$finfo->getFileName());
}
?>

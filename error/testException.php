<?php

try
{
    $num=3/0;
    var_dump($num);
}
catch(Exception $e)
{
    echo $e->getMessage();
    $num=12;

}
echo 'continue...';
echo $num;



try
{
    $num1=3;
    $num2=0;
    if($num2==0)
    {
        throw new Exception('0 can not be divided');
    }
    else
    {
        $res=$num1/$num2;
    }
}
catch(Exception $e)
{
    echo $e->getMessage();
    $num2=12;
}


try
{

}
catch(Exception $e)
{
    echo $e->getMessage();
}
?>

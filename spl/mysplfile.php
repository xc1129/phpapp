<?php
date_default_timezone_set('PRC');
$file=new SplfileInfo("tmp.txt");
echo "File is created at ".date("Y-m-d H:i:s",$file->getCTime())."\n";
echo $file->getMTime()."\n";
echo $file->getSize()."\n";

$fileObj=$file->openFile("r");
while($fileObj->valid())
{
    echo $fileObj->fgets();
}

$fileObj=null;
$file=null;
?>

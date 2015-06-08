<?php

class File
{
    private $_dir;
    CONST EXT='.txt';
    public function __construct()
    {
        $this->_dir=dirname(__FILE__).'/files/';
    }

    public function cacheData($key,$value='',$cacheTime=0)
    {
        $filename=$this->_dir.$key.self::EXT;

        if($value!=='')
        {
            if(is_null($value))
            {
                echo "delete file";
                return @unlink($filename);
            }
            $dir=dirname($filename);
            if(!is_dir($dir))
            {
                mkdir($dir,0777);
            }

            $cacheTime= sprintf('%011d',$cacheTime);
            return file_put_contents($filename,$cacheTime.json_encode($value));
        }

        if(!is_file($filename))
        {
           return FALSE;
        }
        else
        {
            $dataStr=file_get_contents($filename);
            return json_decode($dataStr,true);
        }
    }

}

$file=new File();
$file->cacheData('test1','fjlakejl2123',180);
?>

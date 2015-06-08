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
            $contents=file_get_contents($filename);
            $cacheTime=(int)substr($contents,0,11);
            $value=substr($contents,11);
            if($cacheTime!=0 && $cacheTime + filemtime($filename)<time())
            {
                unlink($filename);
                return FALSE;
            }
            return json_decode($value,true);
        }
    }

}

$file=new File();
$file->cacheData('test1');
?>

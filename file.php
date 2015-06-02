<?php

class File
{
    private $_dir;
    CONST EXT='.txt';
    public function __construct()
    {
        $this->_dir=dirname(__FILE__).'/files/';
    }

    public function cacheData($key,$value='',$path='')
    {
        $filename=$this->_dir.$path.$key.self::EXT;

        if($value!='')
        {
            $dir=dirname($filename);
            if(!is_dir($dir))
            {
                mkdir($dir,0777);
            }
            return file_put_contents($filename,json_encode($value));
        }

        if(!is_file($filename))
        {
           return FALSE;
        }
        else
        {
            $dataStr=file_get_contents($filename);
            /*if(preg_match('^\xEF\xBB\xBF/',$datasTR))
            {
                $dataStr=substr($dataStr,3);
            }
            $dataStr=t($dataStr);*/
            return json_decode($dataStr,true);
        }
    }

}
?>

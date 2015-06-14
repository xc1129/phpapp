<?php

class FileException extends Exception
{
    public function getDetails()
    {
        switch($this->code)
        {
        case 0:
            return 'no file';
            break;
        case 1:
            return 'file not existed';
            break;
        case 2:
            return 'not a file';
            break;
        case 3:
            return 'file can not written';
            break;
        case 4:
            return 'data write error';
            break;
        default:
            return 'illegle';
            break;
        }
    }
}

class WriteData
{
    private $_message='';
    public function __construct($file=null,$mode='w')
    {
        $this->_message="file:{$filename} mode:{$mode}";
        if(empty($filename))
        {
            throw new FileException($this->_message,0);
        }
    }
}

<?php

class MyErrorHandler
{
    public $message='';
    public $filename='';
    public $line=0;
    public $vars=array();

    public function __construct($message,$filename,$line,$vars)
    {
        $this->message=$message;
        $this->filename=$filename;
        $this->line=$line;
        $this->vars=$vars;
    }

    public static function deal($errno,$errmsg,$filename,$line,$vars)
    {
        $self=new self($errmsg,$filename,$line,$vars);
        switch($errno)
        {
        case E_USER_ERROR:
            return $self->dealError();
            break;
        case E_USER_WARNING:
        case E_WARNING:
            return $self->dealWarning();
            break;
        case E_NOTICE:
        case E_USER_NOTICE:
            return $self->dealNotice();
            break;
        default:
            return false;
        }
    }

    public function dealError()
    {
        ob_start();
        debug_print_backtrace();
        $backtrace=ob_get_flush();
        $errorMsg="error\n file ".$this->filename."\n message ".$this->message."\n line ".$this->line."\n infor ".$backtrace."\n";
        ini_set('error_log','./error_log.log');
        echo $errorMsg;
        //error_log($errorMsg);
        exit(1);
    }

    public function dealWarning()
    {
        $errorMsg="error\n file ".$this->filename."\n message ".$this->message."\n line ".$this->line."\n";
        ini_set('error_log','./error_log.log');
        echo $errorMsg;
        //error_log($errorMsg);
    }
    
    public function dealNotice()
    {
        $errorMsg="error\n file ".$this->filename."\n message ".$this->message."\n line ".$this->line."\n";
        ini_set('error_log','./error_log.log');
        echo $errorMsg;
        //error_log($errorMsg);
    }

}

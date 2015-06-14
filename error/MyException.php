<?php

class MyException extends Exception
{
    public function __construct($message,$code=0)
    {
        parent::__construct($message,$code);
    }

    public function __toString()
    {
        $message="Error occued";
        $message.="<p>".__CLASS__." [{$this->code}]:{$this->message}</p>";
        return $message;
    }

    public function test()
    {
        echo "this is a test";
    }

    public function stop()
    {
        exit('script end...');
    }

    
}

try
{
    echo 'exception occured';
    throw new MyException('test my Exception',3);
}
catch(MyException $e)
{
    echo $e->getMessage();
    echo $e;
    $e->test();
    echo "\n";
}
catch(Exception $e)
{
    echo $e->getMessage();
}
?>

<?php
require_once(./common.php);

class ErrorLog extends Common
{
    public function index()
    {
        $this->check();
        $errorLog=isset($_POST['error_log'])?$_POST['error_log']:'';
        if(!$errorLog)
        {
            return Response::show(401,'log empty');
        }

        $sql="insert into error_log(
            'app_id',
            'did',
            'version_id',
            'error_log',
            'create_time'
        ) values(
            ".$this->params['app_id'].",
            '".$this->params['did']."'',
            ".$this->params['version_id'].",
            ".$this->params['version_mini']",
            '".$errorLog."',
            ".time()."
        )"
        $connect=Db::getInstance()->connect();
        if(mysql_query($sql,$connect))
        {
            return Response::show(200,'error log insert success');
        }
        else
        {
            return Response::show(400,'error log insert failed');
        }
        
    }

}

<?php

//deal with common things

require_once('./response.php');
require_once('./db.php');

class Common
{
    public $params;
    public $app;
    public function check()
    {
        $this->params['app_id']=$appId=isset($_POST['app_id'])?$_POST['app_id']:'';
        $this->params['version_id']=$versionId=isset($_POST['version_id'])?$_POST['version_id']:'';
        $this->params['version_mini']=$versionMini=isset($_POST['version_id'])?$_POST['version_id']:'';
        $this->params['did']=$did=isset($_POST['did'])?$_POST['did']:'';
        $this->params['encrypt_did']=$encryptDid=isset($_POST['encrypt_did'])?$_POST['encrypt_did']:'';

        if(!is_numeric($appId) || !is_numeric($versionId))
        {
            return Response::show(401,'parameter illegal');
        }

        //need encrypt?
        
        $this->app=$this->getApp($appId);
        if(!$this->app)
        {
            return Response::show(402,'app_id not exist');
        }
        if($this->app['is_encryption'] && $encryptDid!=md5($did.$this->app['key']))
        {
            return Response::show(403,'do not have authority');
        }


    }

    public function getApp($id)
    {
         $sql="select * from app where id=".$id." and status=1 limit 1";
         $connect=Db::getInstance()->connect();
         $result=mysql_query($sql,$connect);
         return mysql_fetch_assoc($result);
    }

    public function getversionUpgrade($appId)
    {
        $sql="select * from version_upgrade where app_id=". $appId." and status-1 limit 1";
        $connect=Db::getInstance()->connect();
        $result=mysql_query($sql,$connect);
        return mysql_fetch_assoc($result);
    }
}

?>

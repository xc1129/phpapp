<?php

//deal with common things

require_once('./response.php');
class Common
{
    public $params;
    public function check()
    {
        $this->params['app_id']=$appId=isset($_POST['app_id'])?$_POST['app_id']:'';
        $this->params['version_id']=$versionId=isset($_POST['version_id'])?$_POST['version_id']:'';
        $this->params['version_mini']=$versionMini=isset($_POST['version_id'])?$_POST['version_id']:'';
        $this->params['did']=$appid=isset($_POST['did'])?$_POST['did']:'';
        $this->params['encrypt_did']=$encryptdDid=isset($_POST['encrypt_did'])?$_POST['encrypt_did']:'';

        if(!is_numeric($appId) || !is_numeric($versionId))
        {
            return Response::show(401,'parameter illegal');
        }

        //need encrypt?
        $this->getApp();


    }

    public function getApp($id)
    {
         $sql="select * from app where id=".$id."and status=1 limit 1";
         echo $sql;
    }
}

?>

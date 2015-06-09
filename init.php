<?php

require_once('./common.php');

class Init extends Common
{
    public function index()
    {
        $this->check();

        $versionUpgrade=$this->getversionUpgrade($this->app['id']);

        if($versionUpgrade)
        {
            if($versionUpgrade['type'] && $this->params['version_id']<$versionUpgrade['version_id'])
            {
                $versionUpgrade['is_upload']=$versionUpgrade['typ'];
            }
            else
            {
                $versionUpgrade['is_upload']=0;
            }
            return Response::show(200,'update information get success',$versionUpgrade);
        }
        else
        {
            return Response::show(400,'update information get failed');
        }

    }

}

$init=new Init();
$init->check();
?>

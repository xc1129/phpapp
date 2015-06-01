<?php
class Response {

    const JSON="json";
    public static function show($code,$message,$data=array(),$type=self::JSON)
    {
        if(!is_numeric($code))    
        {
            return '';
        }

        $type=isset($_GET['format'])? $_GET['format']: self::JSON;
        
        $result=array(
            'code'=>$code,
            'message'=>$message,
            'data'=>$data,
        );

        if($type=='json')
        {
            self::json($code,$message,$data);
            exit;
        }
        elseif($type=='array')
        {
            var_dump($result);
        }
        elseif($type=='xml')
        {
            self::xmlEncode($code,$message,$data);
            exit;
        }
        else
        {

        }
    }


    /**
     * output data by json way
     * @param integer $code status code
     * @param string $message tips
     * @param array $data data
     * return string
     */
    public static function json($code,$message='',$data=array())
    {
        if(!is_numeric($code))
        {
            return '';
        }
        $result=array(
            'code'=>$code,
            'message'=>$message,
            'data'=>$data
        );
        echo json_encode($result);
        exit;
    }

    public static function xml(){
        header("Content-Type:text/xml");
        $xml="<?xml version='1.0' encoding='UTF-8'?>\n";
        $xml.="<root>\n";
        $xml.="<code>200</code>\n";
        $xml.="<message>return successfully</message>\n";
        $xml.="<data>\n";
        $xml.="<id>1</id>\n";
        $xml.="<name>test</name>\n";
        $xml.="</data>\n";
        $xml.="</root>\n";

        echo $xml; 
    } 
    /**
     * output data by xml way
     *
     *
     *
     */
    public static function xmlEncode($code,$message,$data=array())
    {
        if(!is_numeric($code))
        {
            return '';
        }

        $result=array(
            'code'=>$code,
            'message'=>$message,
            'data'=>$data,
        );
        header("Content-Type:text/xml");
        $xml="<?xml version='1.0' encoding='UTF-8'?>\n";
        $xml.="<root>\n";
        $xml.=self::xmlToEncode($result);
        $xml.="</root>";
        
        echo $xml;
    }

    public static function xmlToEncode($data)
    {
        $xml="";
        $arrt="";
        foreach($data as $key=>$value)
        {
            if(is_numeric($key))
            {
                $attr=" id='{$key}'";
                $key="item";
            }
            $xml.="<{$key}{$attr}>";
            $xml.=is_array($value) ? self::xmlToEncode($value): $value;
            $xml.="</{$key}>\n";
        }
        return $xml;
    }

}



/*
     $data=array(
    'id'=>1,
    'name'=>'test',
    'type'=>array(4,5,6),
    'test'=>array(1,123,56=>array(7,8,9))
);
Response::xmlEncode(200,'successfully',$data);
 *
?>



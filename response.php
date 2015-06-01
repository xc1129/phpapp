<?php
class Response {
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
}


Response::xml();
?>



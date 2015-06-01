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

}
?>



<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/8
 * Time: 14:48
 */

class Response {

    const JSON = "json";
    /*
     * 按json,xml综合方式传输数据通信
     * @param integer $code 状态码
     * @param string $message 提示信息
     * @param array $data 通信数据
     * @param string $type 数据类型
     * return string
     * */
    public static function show($code ,$message ="" ,$data = array() , $type = self::JSON){
        if(!is_numeric($code)){
            return "";
        }
        $result = array(
            'code'=> $code,
            'message'=>$message,
            'data'=>$data,
        );
        $type = isset($_GET['format']) ? $_GET['format'] : self::JSON;
        if($type == 'json'){
            self::json($code,$message,$data);
            exit;
        }elseif ($type == 'array'){
            var_dump($result);
        }elseif ($type == 'xml'){
            self::xmlEncode($code,$message,$data);
            exit;
        }else{
            //TODO...
        }
    }

    /*
     * 按json方式传输数据通信
     * @param integer $code 状态码
     * @param string $message 提示信息
     * @param array $data 通信数据
     * return string
     * */
    public static function json($code , $message = '' , $data = array()){

        if(!is_numeric($code)){
            return '';
        }

        $result = array(
            'code' => $code,
            'message' => $message,
            'data' => $data
        );

        echo json_encode($result);
        exit;
    }

    /*
     * 按xml方式传输数据通信
     * */
    public static function xml(){
        header("Content-Type:text/xml; charset=UTF-8");
        $xml = "<?xml version='1.0' encoding='UTF-8'?>\n";
        $xml .= "<root>\n";
        $xml .= "<code>200</code>\n";
        $xml .= "<message>数据返回成功</message>\n";
        $xml .= "<data>\n";
        $xml .= "<id>1</id>\n";
        $xml .= "<name>张定明</name>\n";
        $xml .= "<address>上海市</address>\n";
        $xml .= "</data>\n";
        $xml .= "</root>\n";
        echo $xml;
    }

    /*
     * 按xml方式传输数据通信
     * @param integer $code 状态码
     * @param string $message 提示信息
     * @param array $data 通信数据
     * return string
     * */
    public static function xmlEncode($code ,$message="" ,$data=array()){

        if(!is_numeric($code)){
            return "";
        }
        $result = array(
            'code'=> $code,
            'message'=> $message,
            'data'=> $data,
        );
        header("Content-Type:text/xml; charset=UTF-8");
        $xml = "<?xml version='1.0' encoding='UTF-8'?>\n";
        $xml .= "<root>\n";
        $xml .= self::xmlToEncode($result);
        $xml .= "</root>\n";
        echo $xml;
    }

    /*
     *
     *
     * */
    public static function xmlToEncode($data){
        $xml = $attr ="";
        foreach($data as $key=>$value){
            if(is_numeric($key)){
                $attr = "id='{$key}'";
                $key = "item";
            }
            $xml .= "<{$key} {$attr}>";
            $xml .= is_array($value) ? self::xmlToEncode($value) : $value;
            $xml .= "</{$key}>\n";
        }
        return $xml;
    }
}

//Response::xml();









































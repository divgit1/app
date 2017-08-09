<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/8
 * Time: 15:32
 */

require_once ('response.php');

$arr = array(
    'id' => '1',
    'name' => 'zhangdm',
    'address' => '上海市',
    'type'=>array(4,1,5,6,7),
    'test'=>array(23,45,67=>array('aa'=>89,'sjkksj'))
);
//Response::json(200,'数据返回成功',$arr);
//$response = new Response();
//$response->json(200,'数据返回成功',$arr);//这是实例化，

//Response::xmlEncode(200,'success',$arr);
Response::show(200,'success',$arr);
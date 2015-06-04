<?php
/**
 * Created by PhpStorm.
 * User: gaoyang
 * Date: 15/6/4
 * Time: 下午1:09
 */
namespace bl;
$root_path=dirname(dirname(__FILE__));
require($root_path.'/controller/UserController.php');

function getPhoneUsers($phoneArr){
    $users=array();
    foreach($phoneArr as $v){
        $user=\controller\getUserByPhone($v);
        if(sizeof($user)>0){
            $users[]=$user;
        }
    }

    $data=array(
        'status'=>1,
        'users'=>$users
    );

    return json_encode($data);
}


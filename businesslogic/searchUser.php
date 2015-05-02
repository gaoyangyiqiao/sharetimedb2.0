<?php
/**
 * Created by PhpStorm.
 * User: gaoyang
 * Date: 15/5/2
 * Time: 下午8:25
 */
namespace bl;
$root_path=dirname(dirname(__FILE__));
require($root_path.'/controller/UserController.php');

function searchUser($keywords){
    $data=array(
        'status'=>1,
        'users'=>\controller\searchUser($keywords)
    );
    return json_encode($data);
}
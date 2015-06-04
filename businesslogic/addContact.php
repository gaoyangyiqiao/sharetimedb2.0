<?php
/**
 * Created by PhpStorm.
 * User: gaoyang
 * Date: 15/6/3
 * Time: 下午11:14
 */

namespace bl;
$root_path=dirname(dirname(__FILE__));
require($root_path.'/controller/UserRelationController.php');
require($root_path.'/controller/UserController.php');
function addContact($user_id,$friend_id,$phone_number){
    //$relation['id']},{$relation['user1_id']},{$relation['user2_id']},{$relation['right']},'{$relation['tip']
    $relation=array(
        'id'=>0,
        'user1_id'=>$user_id,
        'user2_id'=>$friend_id,
        'right'=>1,
        'tip'=>'admin'
    );

    \controller\addRelation($relation);
    $userinfo=\controller\getUser($friend_id);
    $data=array(
        'status'=>1,
        'user_info'=>$userinfo
    );
    return json_encode($data);

}


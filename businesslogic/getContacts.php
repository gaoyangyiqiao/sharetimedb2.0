<?php
/**
 * Created by PhpStorm.
 * User: gaoyang
 * Date: 15/6/4
 * Time: 上午11:20
 */

namespace bl;
$root_path=dirname(dirname(__FILE__));
require($root_path.'/controller/UserController.php');
require($root_path.'/controller/UserRelationController.php');
function getContacts($user_id){
    $ids=\controller\getRelations($user_id);
    $contacts=array();
    foreach($ids as $v){
        $contacts[]=\controller\getUser($v[0]);
    }

    $data=array(
        'status'=>1,
        'contacts'=>$contacts
    );

    return json_encode($data);
}
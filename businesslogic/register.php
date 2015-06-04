<?php
/**
 * Created by PhpStorm.
 * User: gaoyang
 * Date: 15/4/30
 * Time: 下午9:45
 */
    namespace bl;
    $root_path=dirname(dirname(__FILE__));
    require($root_path.'/controller/UserController.php');
    function register($phone_number,$name,$student_id,$student_password){
        $userInfo=array(
            'id'=>0,
            'phone'=>$phone_number,
            'name'=>$name,
            'photopath'=>'0',
            'password'=>'0'
        );
        $user_id=\controller\addUser($userInfo);

        $data=array(
            'status'=>1,
            'user_id'=>$user_id
        );
        return json_encode($data);
    }

?>
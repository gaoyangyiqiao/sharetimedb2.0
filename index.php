<?php
/**
 * Created by PhpStorm.
 * User: gaoyang
 * Date: 15/3/25
 * Time: 下午9:16
 */
//require_once('schedule.php');

print_r($_GET);
echo 'begins';

$item=$_POST['action'];
switch($item){
    case 'get_user_schedule':get_user_schedule();break;
    case 'get_contacts':get_contacts(); break;
}

function get_user_schedule(){
    $userid=$_POST['userid'];
    $contactid=$_POST['contactid'];

}
function match(){
    $userid=$_POST['userid'];
    $user_id_arry=$_POST['user_id_array'];
}
function add_contact(){
    $user_id=$_POST['user_id'];
    $content=$_POST['content'];
    $phone_number=$_POST['phone_number'];
}
function get_contacts(){
    $user_id=$_POST['user_id'];
    $data=array(
        'id'=>'001',
        'name'=>'gaoyang',
        'img'=>'localhost/sharetime/img/1.jpg',
        'phone'=>'13579'
    );
    return json_encode($data);
}
function upload_contact(){
    $name=$_POST['name'];
    $phone=$_POST['phone'];

}
function upload_myinfo(){
    $user_id=$_POST['user_id'];
    $username=$_POST['username'];
}
function init(){
    $user_id=$_POST['user_id'];
}

?>


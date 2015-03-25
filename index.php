<?php
/**
 * Created by PhpStorm.
 * User: gaoyang
 * Date: 15/3/25
 * Time: 下午9:16
 */
require_once('schedule.php');
$item=$_POST['action'];
switch($item){
    case 'get_user_schedule':get_user_schedule();break;
}
function get_user_schedule(){
    $userid=$_POST['userid'];
    $contactid=$_POST['contactid'];
    echo "Hello word";
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


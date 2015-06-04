<?php
/**
 * Created by PhpStorm.
 * User: gaoyang
 * Date: 15/3/25
 * Time: 下午9:16
 */
//require_once('schedule.php');

$item=$_POST['action'];
switch($item){
    case 'get_user_schedule':get_user_schedule();break;
    case 'get_contacts':get_contacts(); break;
    case 'get_contact_info':get_contact_info();break;
    case 'match':match();break;
    case 'add_contact':add_contact();break;
    case 'upload_contact':upload_contact();break;
    case 'upload_myInfo':upload_myInfo();break;
    case 'init':init();break;
    case 'register':register();break;
    case 'search_user':search_user();break;
    case 'get_phone_users':get_phone_users();break;
    case 'add_activity':add_activity();break;
}

function add_activity(){
    $activity=$_POST['activity'];
    $theme=$_POST['theme'];
    $content=$_POST['content'];
    $founder_id=$_POST['founder_id'];
    $receive_time=$_POST['receive_time'];
    $begin_time=$_POST['begin_time'];
    $end_time=$_POST['end_time'];
    $contacts_id=$_POST['contacts_id'];
    $right=1;
    require_once("businesslogic/addActivity.php");
    $result=\bl\addActivity($theme,$content,$founder_id,$receive_time,$begin_time,$end_time,$contacts_id,$right);
    print_r($result);
}


function get_phone_users(){
    $phoneStr=$_POST['phones'];
    $phoneArray=explode(",",$phoneStr);
    require_once("businesslogic/getPhoneUsers.php");
    $result=\bl\getPhoneUsers($phoneArray);
    print_r($result);
}


function searchUser(){
    $user_id=$_POST['user_id'];
    $keywords=$_POST['keywords'];
    require_once('businesslogic/searchUser.php');
    $result=\bl\searchUser($keywords);
    print_r($result);
}


//TODO 未处理学号和密码
function register(){
    $user_phone=$_POST['phone'];
    $user_name=$_POST['name'];
    $student_id=$_POST['student_id'];
    $student_password=$_POST['student_password'];
    require_once('businesslogic/register.php');
    $result=\bl\register($user_phone,$user_name,$student_id,$student_password);
    print_r($result);
}

function get_contact_info(){
    $user_id=$_POST['user_id'];
    $contact_id=$_POST['contact_id'];
    require_once('businesslogic/getContactInfo.php');
    $result=\bl\getContactInfo($user_id,$contact_id);
    print_r($result);
}
//TODO 未处理课程
function get_user_schedule(){
    $userid=$_POST['user_id'];
    $contactid=$_POST['contactid'];
    require_once('businesslogic/getUserSchedule.php');
    $result=\bl\getUserSchedule($contactid);
    print_r($result);
}

function match(){
    $userid=$_POST['user_id'];
    $user_id_arry=$_POST['user_id_array'];
    $begin_time=$_POST['begin_time'];
    $end_time=$_POST['end_time'];
    require_once('businesslogic/match.php');
    $result=\bl\match($userid,$user_id_arry,$begin_time,$end_time);
    print_r($result);
}

function add_contact(){
    $user_id=$_POST['user_id'];
    $friend_id=$_POST['friend_id'];
    $phone_number=$_POST['phone_number'];
    require_once('businesslogic/addContact.php');
    $result=\bl\addContact($user_id,$friend_id,$phone_number);
    print_r($result);
}

function get_contacts(){
    $user_id=$_POST['user_id'];
    require_once('businesslogic/getContacts.php');
    $result=\bl\getContacts($user_id);
    print_r($result);
}

function upload_contact(){
    $name=$_POST['name'];
    $phone=$_POST['phone'];

}

function upload_myInfo(){
    $user_id=$_POST['user_id'];
    $username=$_POST['username'];
}

function init(){
    $user_id=$_POST['user_id'];
}

?>


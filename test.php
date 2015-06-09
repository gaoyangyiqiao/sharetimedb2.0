<?php
/**
 * Created by PhpStorm.
 * User: gaoyang
 * Date: 15/1/27
 * Time: 下午9:16
 */
namespace t;
echo '------------TEST------------<br>';

include('real_index.php');

function getclasstable($student_id,$student_password){
    require_once("businesslogic/getClassTable.php");
    $result=\bl\getClassTable($student_id,$student_password);
    print_r($result);
}

function addactivity($theme,$content,$founder_id,$receive_time,$begin_time,$end_time,$contacts_id,$right){
    $right=1;
    require_once("businesslogic/addActivity.php");
    $result=\bl\addActivity($theme,$content,$founder_id,$receive_time,$begin_time,$end_time,$contacts_id,$right);
    print_r($result);
}


function getphoneusers($phoneStr,$phoneArray){
//    $phoneStr=$_POST['phones'];
//    $phoneArray=explode(",",$phoneStr);
    require_once("businesslogic/getPhoneUsers.php");
    $result=\bl\getPhoneUsers($phoneArray);
    print_r($result);
}


function searchUser($keywords){
//    $user_id=$_POST['user_id'];
//    $keywords=$_POST['keywords'];
    require_once('businesslogic/searchUser.php');
    $result=\bl\searchUser($keywords);
    print_r($result);
}


//TODO 未处理学号和密码
function register($user_phone,$user_name,$student_id,$student_password){

    require_once('businesslogic/register.php');
    $result=\bl\register($user_phone,$user_name,$student_id,$student_password);
    print_r($result);
}

function getcontactinfo($user_id,$contact_id){

    require_once('businesslogic/getContactInfo.php');
    $result=\bl\getContactInfo($user_id,$contact_id);
    print_r($result);
}
//TODO 未处理课程
function getuserschedule($user_id,$contactid){
//    $userid=$_POST['user_id'];
//    $contactid=$_POST['contactid'];
    require_once('businesslogic/getUserSchedule.php');
    $result=\bl\getUserSchedule($contactid);
    print_r($result);
}

function match($userid,$user_id_array,$begin_time,$end_time){

    require_once('businesslogic/match.php');
    $result=\bl\match($userid,$user_id_array,$begin_time,$end_time);
    print_r($result);
}

function addcontact($user_id,$friend_id,$phone_number){

    require_once('businesslogic/addContact.php');
    $result=\bl\addContact($user_id,$friend_id,$phone_number);
    print_r($result);
}

function getcontacts($user_id){
//    $user_id=$_POST['user_id'];
    require_once('businesslogic/getContacts.php');
    $result=\bl\getContacts($user_id);
    print_r($result);
}

function uploadcontact(){
    $name=$_POST['name'];
    $phone=$_POST['phone'];

}

function uploadmyInfo(){
    $user_id=$_POST['user_id'];
    $username=$_POST['username'];
}

function init(){
    $user_id=$_POST['user_id'];
}


\t\getuserschedule(1,1);
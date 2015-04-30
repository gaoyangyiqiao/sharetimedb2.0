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
}

function get_contact_info(){
    $user_id=$_POST['user_id'];
    $contact_id=$_POST['contact_id'];
    require_once('businesslogic/getContactInfo.php');
    $contact=\bl\getContactInfo($user_id,$contact_id);
    $data=array(
        'status'=>1,
        'info'=>array(
            'id'=>$contact_id,
            'name'=>$contact['name'],
            'img'=>$contact['photopath'],
            'phone'=>$contact['phone'],
            'tip'=>$contact['tip'],
            'right'=>$contact['right']
            ),
        );
    print_r(json_encode($data));
}

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
    $content=$_POST['content'];
    $phone_number=$_POST['phone_number'];
    $data=array(
        'status'=>1,
        
        );
}

function get_contacts(){
    $user_id=$_POST['user_id'];
    $contact_id=$_POST['contact_id'];
    $data=array(
        'status'=>1,
        'contacts'=>array(
            array('id'=>'001',
                'name'=>'gaoyang',
                'img'=>'localhost/sharetime/img/1.jpg',
                'phone'=>'13579'),
            array('id'=>'002',
                'name'=>'zfy',
                'img'=>'localhost/sharetime/img/2.jpg',
                'phone'=>'24680'),
            ),        
    );
    print_r(json_encode($data));
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


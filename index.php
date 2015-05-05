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
    case 'search_user':search_user();break;
}

function search_user(){
    $user_id=$_POST['user_id'];
    $keywords=$_POST['keywords'];
    require_once("businesslogic/searchUser.php");
    $result=\bl\searchUser($keywords);
    print_r($result);
}

search_user();

function get_contact_info(){
    $user_id=$_POST['user_id'];
    $contact_id=$_POST['contact_id'];
  
    $data=array(
        'status'=>1,
        'info'=>array(
            'id'=>'002',
            'name'=>'zfy',
            'img'=>'localhost/sharetime/img/2.jpg',
            'phone'=>'24680'
            ),
        );
    print_r(json_encode($data));
}

function get_user_schedule(){
    $userid=$_POST['userid'];
    $contactid=$_POST['contactid'];
    $data=array(
        'status'=>1,
        "user_schedule"=>array(
            "activity"=>array(
                array(
                    "theme"=>"hehe",
                    "founder_id"=>"2",
                    "content"=>"cook",
                    'id'=>'0001',
                    'contacts_id'=>'1,2,3,4',
                    "receive_time"=>'2014-1-1 11:22:33',
                    "start_time"=>'2014-1-1 11:22:33',
                    "end_time"=>'2014-1-1 13:22:33',
                    'right'=>1),
                array(
                    "theme"=>"haha",
                    "founder_id"=>"2",
                    "content"=>"cook",
                    'id'=>'0002',
                    'contacts_id'=>'1,2,3,4',
                    "receive_time"=>'2014-1-1 11:22:33',
                    "start_time"=>'2014-1-2 11:22:33',
                    "end_time"=>'2014-1-2 13:22:33',
                    'right'=>1),
            ),
            'size'=>30,
            'begin_time'=>'2014-1-1 8:00:00')
        );
    print_r(json_encode($data));
}

function match(){
    $userid=$_POST['userid'];
    $user_id_arry=$_POST['user_id_array'];
    $data=array(
        'status'=>1,
        "activity"=>array(
            array(            
            "content"=>"cook",
            'id'=>'0001',
            'contacts_id'=>'1,2,3,4'),
            array(            
            "content"=>"play",
            'id'=>'0002',
            'contacts_id'=>'1,2,3,4'),
            array(            
            "content"=>"cook",
            'id'=>'0003',
            'contacts_id'=>'1,2,3,4'),
            ),
        'size'=>30,
        'begin_time'=>'2014-3-4 8:00',
        );
    print_r(json_encode($data));
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


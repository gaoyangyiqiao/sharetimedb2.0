<?php
/**
 * Created by PhpStorm.
 * User: gaoyang
 * Date: 15/3/25
 * Time: 下午9:16
 */
$item=$_POST['action'];
switch($item){
    case 'user':operateUser();break;
    case 'activity':operateActivity();break;
    case 'schedule':operateSchedule();break;
    case 'contacts':operateContacts();break;
}
function operateUser(){
    $order=$_POST[''];
    switch($order){
        case 'del':break;
        case 'new':break;
        case 'upd':break;
        case 'get':break;
    }
}
function operateActivity(){
    $order=$_POST[''];
    switch($order){
        case 'del':break;
        case 'new':break;
        case 'reset':break;
    }
}
function operateSchedule(){
    $order=$_POST[''];
    switch($order){
        case 'get':break;
        case 'del':break;
        case 'setacti':break;
    }
}
function operateContacts(){
     $order=$_POST[''];
    switch($order){
        case 'get':break;
        case 'del':break;
        case 'add':break;
    }
}
?>


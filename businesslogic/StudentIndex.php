<?php
/**
 * Created by PhpStorm.
 * User: gaoyang
 * Date: 15/6/5
 * Time: 下午3:37
 * 传入学号和密码，返回课程信息
 */
namespace bl;
//
include('timeTransfer.php');

function studentIndex($student_id,$student_password){
    $fetcher=new \bl\Fetchcourse();
    $courses=$fetcher->getCourses($student_id,$student_password);
    $transfer_once=\bl\njuTimeTransfer($courses);
    $transfer_final=\bl\classTableToActivities($transfer_once);
    return $transfer_final;
}
//print_r(studentIndex("131250043","19941026"));

<?php
/**
 * Created by PhpStorm.
 * User: gaoyang
 * Date: 15/6/7
 * Time: 上午12:20
 */
namespace bl;
require('studentIndex.php');

function getClassTable($student_id,$student_password){

    $classes=\bl\studentIndex($student_id,$student_password);
    $data=array(
        'status'=>1,
        'classes'=>$classes
    );
    return json_encode($data);
}

//print_r(getClassTable("131250043","19941026"));
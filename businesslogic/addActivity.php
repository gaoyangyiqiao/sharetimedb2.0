<?php
/**
 * Created by PhpStorm.
 * User: gaoyang
 * Date: 15/5/25
 * Time: 上午8:03
 */
namespace bl;


$root_path=dirname(dirname(__FILE__));
require($root_path.'/controller/ActivityController.php');
function addActivity($theme,$content,$founder_id,$receive_time,$begin_time,$end_time,$contacts_id,$right){

    $activity=array(
        'id'=>0,
        'theme'=>$theme,
        'content'=>$content,
        'founder'=>$founder_id,
        'receive_time'=>$receive_time,
        'begin_time'=>$begin_time,
        'end_time'=>$end_time,
        'contacts_id'=>$contacts_id,
        'right'=>$right
    );
    $activityId=\controller\addActivity($activity);
    $data=array(
        'status'=>1,
        'activity_id'=>$activityId
    );

    return json_encode($data);
}

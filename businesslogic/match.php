<?php
/**
 * Created by PhpStorm.
 * User: gaoyang
 * Date: 15/4/29
 * Time: 下午8:18
 */
    namespace bl;
    $root_path=dirname(dirname(__FILE__));
    require($root_path.'/controller/ScheduleOperator.php');
    function match($user_id,$contacts_id,$begin_time,$end_time){

        $users=explode(',',$contacts_id);
        $users[]=$user_id;
        $activities=array();
        foreach($users as $v){

            $tempActivities=\controller\getUserActivitiesInTime($v,$begin_time,$end_time);
            $activities=array_merge($activities,$tempActivities);
        }

        //将activity转换为schedule
        $data=array(
            'status'=>1,
            'schedule'=>array(
                'activity'=>$activities,
                'begin_time'=>$begin_time,
                'end_time'=>$end_time
            )
        );

        return json_encode($data);

    }


?>
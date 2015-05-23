<?php
    namespace bl;
	$root_path=dirname(dirname(__FILE__));
	require($root_path.'/controller/ScheduleOperator.php');
    function getUserSchedule($user_id){
        date_default_timezone_set('Asia/Shanghai');
        $begin_time=date(' Y-m-d h:i:s',time());
        $end_time=date('Y-m-d h:i:s', strtotime("+2 day"));
		$activities=\controller\getUserActivities($user_id);
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

    function getClassTable($courses){
        $classTable=array();
        //判断今天是否为周一
        if(is_array($courses)){
            foreach($courses as $v){

            }
        }
        //判断今天是否是单双周
    }

?>
<?php
	$root_path=dirname(dirname(__FILE__));
	require($root_path.'/controller/ScheduleOperator.php');
	function getUserSchedule($user_id){
        date_default_timezone_set('Asia/Shanghai');
        $begin_time=date(' Y-m-d h:i:s',time());
        $end_time=date('Y-m-d h:i:s', strtotime("+2 day"));
		$activities=getUserActivities($user_id);
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
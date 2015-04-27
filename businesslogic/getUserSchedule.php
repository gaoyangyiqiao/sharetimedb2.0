<?php
	$root_path=dirname(dirname(__FILE__));
	require($root_path.'/controller/ScheduleOperator.php');
	function getUserSchedule($user_id){
		$activities=getUserActivities($user_id);
		//将activity转换为schedule
	}

?>
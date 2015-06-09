<?php
    namespace controller;
	$root_path=dirname(dirname(__FILE__));
	require('dbconfig.php');
	include('initdb.php');
	require($root_path.'/controller/UserController.php');
	require($root_path.'/controller/ActivityController.php');
	require('UserActivityRelationController.php');

	$table_activity="activity";
	$table_user="user";
	$table_relation="user_activity_relation";

	function getUserActivities($user_id){
//		global $table_user;
//		global $table_activity;
//		global $table_relation;
        $table_activity="activity";
        $table_user="user";
        $table_relation="user_activity_relation";

		//获得今天前后两天的activity，首先获得用户所有activity，再将符合条件的activity添加到结果中
//		$sql="select * from {$table_activity} where (datediff(day,begin_time,getdate())<=2 or datediff(day,getdate(),begin_time)<=2) and id in (select activity_id from {$table_relation} where user_id={$user_id})";
        $sql="select * from {$table_activity} where id in (select activity_id from {$table_relation} where user_id={$user_id})";
        $result=mysql_query($sql);
		$i=0;
		$activities=array();
		while($activity=mysql_fetch_array($result)){
			$activities[$i]=$activity;
			$i++;
		}
		return $activities;
	}

    //TODO 存在不能必须相等时间的问题
    function getUserActivitiesInTime($user_id,$begin_time,$end_time){

        $table_activity="activity";
        $table_relation="user_activity_relation";
        //获得今天前后两天的activity，首先获得用户所有activity，再将符合条件的activity添加到结果中
        $sql="select * from {$table_activity} where id in (select activity_id from {$table_relation} where user_id={$user_id}) and end_time<='{$end_time}' and begin_time>='{$begin_time}'";
        $result=mysql_query($sql);
        $activities=array();
        while($activity=mysql_fetch_array($result)){
            $activities[]=$activity;
        }
        return $activities;
    }
//    2015-06-07 08:21:21 [6] => 2015-06-07 13:33:32
//    print_r(\controller\getUserActivitiesInTime(1,"2015-06-08 00:00:00","2015-06-08 07:00:00"));
?>
<?php
	require('dbconfig.php');
	include('initdb.php');
	
	$table='user_activiy_relation';

	function addActivityRelation($relation){
		global $table;
	 	$sql="insert into {$table} values({$relation['user_id']},{$relation['activity_id']})";
		$query=mysql_query($sql);
		//返回该id
		return mysql_insert_id();
	}

	function deleteActivityRelation($relation){
		global $table;
		$sql="delete from {$table} where user_id={$relation['user_id']},activity_id={$relation['activity_id']}";
		$query=mysql_query($sql);		
	}

?>
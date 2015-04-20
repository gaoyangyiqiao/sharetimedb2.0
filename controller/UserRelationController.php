<?php
	require('dbconfig.php');
	include('initdb.php');
	
	$table='user_relation';

	 function addRelation($relation){
	 	global $table;
	 	$sql="insert into {$table} values({$relation['id']},{$relation['user1_id']},{$relation['user2_id']},{$relation['right']},{$relation['tip']})";
		$query=mysql_query($sql);
		//返回该id
		return mysql_insert_id();
	}

	function deleteRelation($relation){
		global $table;
		$sql="delete from {$table} where user1_id={$relation['user1_id']},user2_id={$relation['user2_id']}";
		$query=mysql_query($sql);
	}

	function updateRelation($relation){
		global $table;
		$sql="update {$table} set right={$relation['right']},tip={$relation['tip']}";
	}

	function searchRelation($keyword){
		global $table;
	}


?>
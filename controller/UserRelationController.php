<?php
	require('dbconfig.php');
	include('initdb.php');
	
	$table='user_relation';

	 function addRelation($relation){
	 	global $table;
	 	$sql="insert into {$table} values({$relation['user1_id']},{$relation['user2_id']})";
		$query=mysql_query($sql);
	}

	function deleteRelation($relation){
		global $table;
		$sql="delete from {$table} where user1_id={$relation['user1_id']},user2_id={$relation['user2_id']}";
		$query=mysql_query($sql);
	}

	function updateRelation($relation){
		global $table;
	}

	function searchRelation($keyword){
		global $table;
	}


?>
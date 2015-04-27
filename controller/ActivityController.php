<?php
	require('dbconfig.php');
	include('initdb.php');
	
	$table='activity';

	 function addActivity($activity){
	 	global $table;
	 	$sql="insert into {$table} values({$activity['id']},'{$activity['title']}','{$activity['content']}')";
		$query=mysql_query($sql);
		//返回该id
		return mysql_insert_id();
	}

	function deleteActivity($id){
		global $table;
		$sql="delete from {$table} where id={$id}";
		$query=mysql_query($sql);
	}

	function updateActivity($activity){
		global $table;
		$sql="update {$table} set title='{$activity["title"]}',content='{$activity["content"]}' where id={$activity["id"]}";
		$query=mysql_query($sql);
	}

	function searchActivity($keyword){
		global $table;
		$sql="select * from {$table} where title like %{$keyword}%";
		$query=mysql_query($sql);
		$activies=array();
		$i=0;
		while($result=mysql_fetch_array($query)){
			$activies[$i]=$result;
		}
		return $activies;
	}

	function getActivity($id){
		global $table;
		$sql="select * from {$table} where id={$id}";
		$query=mysql_query($sql);
		$result=mysql_fetch_array($query);
		return $result;
	}


?>
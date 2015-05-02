<?php
namespace controller;

	require('dbconfig.php');
	include('initdb.php');
	
	$table='activity';

	 function addActivity($activity){
         $table='activity';
         $sql="insert into {$table} values({$activity['id']},'{$activity['theme']}','{$activity['content']}',{$activity['founder']},'{$activity[receive_time]}','{$activity[begin_time]}','{$activity[end_time]}','{$activity[contacts_id]}',{$activity[right]})";
		$query=mysql_query($sql);
		//返回该id
		return mysql_insert_id();
	}

	function deleteActivity($id){
        $table='activity';
		$sql="delete from {$table} where id={$id}";
		$query=mysql_query($sql);
	}

	function updateActivity($activity){
        $table='activity';
		$sql="update {$table} set title='{$activity["title"]}',theme='{$activity[theme]}',content='{$activity["content"]}',receive_time='{$activity[receive_time]}',begin_time='{$activity[begin_time]}',end_time='{$activity[end_time]}',contacts_id='{$activity[contacts_id]}' where id={$activity["id"]}";
		$query=mysql_query($sql);
	}

	function searchActivity($keyword){
        $table='activity';
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
        $table='activity';
		$sql="select * from {$table} where id={$id}";
		$query=mysql_query($sql);
		$result=mysql_fetch_array($query);
		return $result;
	}


?>
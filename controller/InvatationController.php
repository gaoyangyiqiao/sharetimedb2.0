<?php
namespace controller;

	require('dbconfig.php');
	include('initdb.php');
	
	$table='invitation';
//默认不通过
	 function addInvitation($invitation){
         $table='invitation';
	 	$sql="insert into {$table} values({$invitation['id']},{$invitation['sender_id']},{$invitation['receiver_id']},'{$invitation['activity_id']}',0)";
		$query=mysql_query($sql);
				//返回该id
		return mysql_insert_id();
	}

	function deleteInvitation($id){
        $table='invitation';
		$sql="delete from {$table} where id={$id}";
		$query=mysql_query($sql);
	}

	function updateInvitation($invitation){
        $table='invitation';
		$sql="update {$table} set is_passed={$invitation["is_passed"]} where id={$invitation["id"]}";
		$query=mysql_query($sql);
	}

	function searchInvitation($keyword){
        $table='invitation';
		$sql="select * from {$table} where activity_id like %{$keyword}%";
		$query=mysql_query($sql);
		$i=0;
		$result=array();
		while($rs=mysql_fetch_array($query)){
			$result[$i]=$rs;
			$i++;
		}
		return $result;
	}

	function getInvitation($id){
        $table='invitation';
		$sql="select * from {$table} where id={$id}";
		$query=mysql_query($sql);
		$i=0;
		$result=array();
		while($rs=mysql_fetch_array($query)){
			$result[$i]=$rs;
			$i++;
		}
		return $result;
	}
?>
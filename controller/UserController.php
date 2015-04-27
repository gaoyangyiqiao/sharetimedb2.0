<?php
	require('dbconfig.php');
	include('initdb.php');
	
	$table='user';

	function addUser($userInfo){
	 	global $table;
	 	$sql="insert into {$table} values({$userInfo['id']},'{$userInfo['name']}','{$userInfo['photopath']}','{$userInfo['phone']}','{$userInfo['password']}')";
		$query=mysql_query($sql);
		//返回该id
		return mysql_insert_id();
	}

	function deleteUser($id){
		global $table;
		$sql="delete from {$table} where id={$id}";
		$query=mysql_query($sql);
	}

	function updateUser($userInfo){
		global $table;
		$sql="update {$table} set name='{$userInfo["name"]}',photopath='{$userInfo["photopath"]}',phone='{$userInfo["phone"]}',password='{$userInfo["password"]}' where id={$userInfo["id"]}";
		$query=mysql_query($sql);
	}

	function searchUser($keyword){
		global $table;
		$sql="select * from {$table} where name like %{$keyword}%";
		$query=mysql_query($sql);
		$query=mysql_query($sql);
		$i=0;
		$result=array();
		while($rs=mysql_fetch_array($query)){
			$result[$i]=$rs;
			$i++;
		}
		return $result;
	}

	function getUser($id){
		global $table;
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
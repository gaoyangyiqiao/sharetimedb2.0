<?php
	require('dbconfig.php');
	include('initdb.php');
	
	$table='st_user';

	 function addUser($userInfo){
	 	$sql="insert into {$table} values({$userInfo['id']},{$userInfo['name']},{$userInfo['photopath']},{$userInfo['phone']},{$userInfo['password']})";
		$query=mysql_query($sql);
	}

	function deleteUser($id){
		$sql="delete from {$table} where id={$id}";
		$query=mysql_query($sql);
	}

	function updateUser($userInfo){
		$sql='update from {$table} set name={$userInfo["name"]},photopath={$userInfo["photopath"]},phone={$userInfo["phone"]},password={$userInfo["password"]}'
		$query=mysql_query($sql);
	}

	function searchUser($keyword){
		$sql="select * from {$table} where name like %{$keyword}%";
	}


?>
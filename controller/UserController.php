<?php
    namespace controller;

	require('dbconfig.php');
	include('initdb.php');
	
	$table='user';

	function addUser($userInfo){
        $table='user';
	 	$sql="insert into {$table} values({$userInfo['id']},'{$userInfo['name']}','{$userInfo['photopath']}','{$userInfo['phone']}','{$userInfo['password']}')";
		$query=mysql_query($sql);
		//返回该id
		return mysql_insert_id();
	}

	function deleteUser($id){
        $table='user';
		$sql="delete from {$table} where id={$id}";
		$query=mysql_query($sql);
	}

	function updateUser($userInfo){
        $table='user';
		$sql="update {$table} set name='{$userInfo["name"]}',photopath='{$userInfo["photopath"]}',phone='{$userInfo["phone"]}',password='{$userInfo["password"]}' where id={$userInfo["id"]}";
		$query=mysql_query($sql);
	}

	function searchUser($keyword){
        $table='user';
		$sql="select * from {$table} where name like '%{$keyword}%'";
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
        $table='user';
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

    function getUserByPhone($phone){
        $table='user';
        $sql="select * from {$table} where phone={$phone}";
        $query=mysql_query($sql);
        $result=array();
        while($rs=mysql_fetch_array($query)){
            $result[]=$rs;
        }
        return $result;
    }
//print_r(getUser(1));
//    print_r(getUserByPhone("2345"));
?>
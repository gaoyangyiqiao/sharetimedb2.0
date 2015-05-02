<?php
namespace controller;

	require('dbconfig.php');
	include('initdb.php');
	
	$table='add_contact';


//默认不通过
	 function addAddContact($addInfo){
         $table='add_contact';
	 	$sql="insert into {$table} values({$addInfo[id]},{$addInfo[sender_id]},{$addInfo[receiver_id]},'{$addInfo[content]}',0)";
		$query=mysql_query($sql);
		//返回该id
		return mysql_insert_id();
	}

	function deleteAddContact($id){
        $table='add_contact';
		$sql="delete from {$table} where id={$id}";
		$query=mysql_query($sql);
	}

	function updateAddContact($addInfo){
        $table='add_contact';
		$sql="update {$table} set content={$addInfo["content"]} where id={$addInfo["id"]}";
		$query=mysql_query($sql);
	}

	function searchAddContact($keyword){
        $table='add_contact';
		$sql="select * from {$table} where content like %{$keyword}%";
		$query=mysql_query($sql);
		$i=0;
		$result=array();
		while($rs=mysql_fetch_array($query)){
			$result[$i]=$rs;
			$i++;
		}
		return $result;
	}

	function getAddContact($id){
        $table='add_contact';
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
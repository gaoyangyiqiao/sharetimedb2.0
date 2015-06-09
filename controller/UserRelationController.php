<?php
namespace controller;

	require('dbconfig.php');
	include('initdb.php');
	
	$table='user_relation';

	 function addRelation($relation){
         $table='user_relation';
	 	$sql="insert into {$table} values({$relation['id']},{$relation['user1_id']},{$relation['user2_id']},{$relation['right']},'{$relation['tip']}')";
		$query=mysql_query($sql);
		//返回该id
		return mysql_insert_id();
	}

	function deleteRelation($relation){
        $table='user_relation';
		$sql="delete from {$table} where user1_id={$relation['user1_id']},user2_id={$relation['user2_id']}";
		$query=mysql_query($sql);
	}

	function updateRelation($relation){
        $table='user_relation';
		$sql="update {$table} set right={$relation['right']},tip='{$relation['tip']}'";
	}

	function searchRelation($keyword){
        $table='user_relation';
	}

	function getRelationInfo($user1_id,$user2_id){
        $table='user_relation';
		$sql="select * from {$table} where user1_id={$user1_id} and user2_id={$user2_id}";
		$query=mysql_query($sql);
		$i=0;
		$result=array();
		while($rs=mysql_fetch_array($query)){
			$result[$i]=$rs;
			$i++;
		}
		return $result;
	}
    //通过用户的id获得用户的好友
    //TODO 此时的用户关系为单向，即一个用户添加另一个用户后另一个用户通讯录中并没有前一个用户
    function getRelations($user_id){
        $table='user_relation';
        $sql="select user2_id from {$table} where user1_id={$user_id}";
        $query=mysql_query($sql);
        $result=array();
        while($rs=mysql_fetch_row($query)){
            $result[]=$rs;
        }
        return $result;
    }

//    print_r(getRelationInfo(1,3));


?>
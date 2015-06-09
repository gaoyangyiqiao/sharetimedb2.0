<?php
namespace controller;

	require('dbconfig.php');
	include('initdb.php');
	
	$table='user_activiy_relation';

	function addActivityRelation($relation){
        $table='user_activity_relation';
	 	$sql="insert into {$table} values({$relation['user_id']},{$relation['activity_id']})";
		$query=mysql_query($sql);
        if($query)
		    return 1;
	    else
            return 0;
    }

	function deleteActivityRelation($relation){
        $table='user_activiy_relation';
		$sql="delete from {$table} where user_id={$relation['user_id']},activity_id={$relation['activity_id']}";
		$query=mysql_query($sql);
        if($query)
            return 1;
        else
            return 0;
	}

?>
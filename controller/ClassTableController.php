<?php
/**
 * Created by PhpStorm.
 * User: gaoyang
 * Date: 15/5/19
 * Time: 上午11:46
 */
namespace controller;

require('dbconfig.php');
include('initdb.php');

function addClass($course){
    $table='classtable';
    $sql="insert into {$table} values(0,'{$course[name]}','{$course[place]}','{$course[section]}','{$course[day_of_week]}','{$course[weeks]}')";
    $query=mysql_query($sql);
    //返回该id
    return mysql_insert_id();
}

function deleteClass($id){
    $table='classtable';
    $sql="delete from {$table} where id={$id}";
    $query=mysql_query($sql);
}

function updateClass($course){
    $table='classtable';
    $sql="update {$table} set place={$course["place"]},section={$course["section"]} where id={$course["id"]}";
    $query=mysql_query($sql);
}

function findClass($keywords){
    $table='calsstable';
    $sql="select * from {$table} where name like %{$keywords}%";
    $query=mysql_query($sql);
    $i=0;
    $result=array();
    while($rs=mysql_fetch_array($query)){
        $result[$i]=$rs;
        $i++;
    }
    return $result;
}

function getClass($id){
    $table='classtable';
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
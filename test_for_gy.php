<?php
/**
 * Created by PhpStorm.
 * User: gaoyang
 * Date: 15/1/27
 * Time: 下午9:16
 */
//用于高杨测试服务器


function my_post($url, $post) {
    $timeout=500;
    $curl = curl_init();//初始化curl模块
    curl_setopt($curl, CURLOPT_URL, $url);//登录提交的地址
    curl_setopt($curl, CURLOPT_HEADER, 0);//是否显示头信息
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);//是否自动显示返回的信息
    curl_setopt($curl, CURLOPT_POST, 1);//post方式提交
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($post));//要提交的信息
    curl_setopt ($curl, CURLOPT_CONNECTTIMEOUT, $timeout);
    print_r(curl_exec($curl));//执行cURL
    curl_close($curl);//关闭cURL资源，并且释放系统资源
}

//设置post的数据
$post = array (
    'action'=> 'get_contacts',
    'userid'=> '1'
);

$url='http://127.0.0.1:3306/sharetimedb/index.php';

my_post($url,$post);






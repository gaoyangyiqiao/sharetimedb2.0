<?php
/**
 * Created by PhpStorm.
 * User: gaoyang
 * Date: 15/5/12
 * Time: 上午11:32
 */
namespace bl;
include("Fetchcourse.class.php");
//$courseTime=array('')
//week=Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday;class=1-2,3-4,5-6,7-8,1-3,1-4,5-7,5-8,9-10,9-11;

//专门用于输出数组
function p($array){
    foreach($array as $v){
        print_r($v);
        echo '<br/>';
    }
}

 function njuTimeTransfer(){
     $fetcher=new \bl\Fetchcourse();

     $courseInfo=$fetcher->getCourses("","");

     $result=array();

    if(is_array($courseInfo)){
        for($i=0;$i<sizeof($courseInfo);$i++){
            $courseInfo[$i]["time_place"]=trim($courseInfo[$i]["time_place"]);
            $strarray=explode(" ",$courseInfo[$i]["time_place"]);
//            print_r($strarray);
            // TODO 没有分析某些特殊的数组
            if(sizeof($strarray)%4==0){
                $time=array();
                //[0]代表周几，[1]代表第几节,[2]代表第几周
                for($j=0;$j<sizeof($strarray);$j++){
                    if($j%4==0&&$j!=0){
                        $result[]=$time;
                    }
                        $time[$j%4]=$strarray[$j];
                }
                $result[]=$time;
            }

            //课程日期
            if(strpos($courseInfo[$i]["time_place"],"周一")>=0){

            }
            if(strpos($courseInfo[$i]["time_place"],"周二")>=0){

            }
            if(strpos($courseInfo[$i]["time_place"],"周三")>=0){

            }
            if(strpos($courseInfo[$i]["time_place"],"周四")>=0){

            }
            if(strpos($courseInfo[$i]["time_place"],"周五")>=0){

            }
            if(strpos($courseInfo[$i]["time_place"],"周六")>=0){

            }
            if(strpos($courseInfo[$i]["time_place"],"周日")>=0){

            }

            //课程时间
            if(strpos($courseInfo[$i]["time_place"],"1-2")>=0){

            }
            if(strpos($courseInfo[$i]["time_place"],"1-3")>=0){

            }
            if(strpos($courseInfo[$i]["time_place"],"1-4")>=0){

            }
            if(strpos($courseInfo[$i]["time_place"],"2-3")>=0){

            }
            if(strpos($courseInfo[$i]["time_place"],"2-4")>=0){

            }
            if(strpos($courseInfo[$i]["time_place"],"3-4")>=0){

            }
            if(strpos($courseInfo[$i]["time_place"],"5-6")>=0){

            }
            if(strpos($courseInfo[$i]["time_place"],"5-7")>=0){

            }
            if(strpos($courseInfo[$i]["time_place"],"5-8")>=0){

            }
            if(strpos($courseInfo[$i]["time_place"],"6-7")>=0){

            }
            if(strpos($courseInfo[$i]["time_place"],"6-8")>=0){

            }
            if(strpos($courseInfo[$i]["time_place"],"7-8")>=0){

            }
            if(strpos($courseInfo[$i]["time_place"],"9-10")>=0){

            }
            if(strpos($courseInfo[$i]["time_place"],"9-11")>=0){

            }
        }
        p($result);
    }else{
        return "error in njuTimeTransfer";
    }
}


njuTimeTransfer();


?>
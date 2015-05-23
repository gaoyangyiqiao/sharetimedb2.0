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

function classToTime($class){
    if(strpos($class,"1-2")>=0){
        return "08:00:00-09:50:00";
    }
    else if(strpos($class,"1-3")>=0){
        return "08:00:00-11:00:00";
    }
    else if(strpos($class,"1-4")>=0){
        return "08:00:00-12:00:00";
    }
    else if(strpos($class,"2-3")>=0){
        return "09:00:00-10:50:00";
    }
    else if(strpos($class,"2-4")>=0){
        return "09:00:00-12:00:00";
    }
    else if(strpos($class,"3-4")>=0){
        return "10:10:00-12:00:00";
    }
    else if(strpos($class,"5-6")>=0){
        return "14:00:00-15:50:00";
    }
    else if(strpos($class,"5-7")>=0){
        return "14:00:00-17:00:00";
    }
    else if(strpos($class,"5-8")>=0){
        return "14:00:00-18:00:00";
    }
    else if(strpos($class,"6-7")>=0){
        return "15:00:00-17:00:00";
    }
    else if(strpos($class,"6-8")>=0){
        return "15:00:00-18:00:00";
    }
    else if(strpos($class,"7-8")>=0){
        return "16:10:00-18:00:00";
    }
    else if(strpos($class,"9-10")>=0){
        return "18:30:00-20:20:00";
    }
    else if(strpos($class,"9-11")>=0){
        return "18:30:00-21:30:00";
    }
}
//0代表周日
function weekToTime($week){
    //课程日期

    if($week=="周一"){
        return 1;
    }
    else if($week=="周二"){
        return 2;
    }
    else if($week=="周三"){
        return 3;
    }
    else if($week=="周四"){
        return 4;
    }
    else if($week=="周五"){
        return 5;
    }
    else if($week=="周六"){
        return 6;
    }
    else if($week=="周日"){
        return 0;
    }
}

//哪些周包含该门课,0代表单周，1代表双周
function dateToTime($date){
    //即使是空字符，"">=0成立，空字符大于等于0返回1
    if($date=="单周"){
        return 0;
    }
    else if($date=="双周"){
        return 1;
    }
    else{
        //一个汉字算3个字符单位
        return substr($date,0,strlen($date)-3);
    }
}

 function njuTimeTransfer(){
     $fetcher=new \bl\Fetchcourse();

     $courseInfo=$fetcher->getCourses("131250043","19941026");
     $result=array();

    if(is_array($courseInfo)){
        for($i=0;$i<sizeof($courseInfo);$i++){
            $courseInfo[$i]["time_place"]=trim($courseInfo[$i]["time_place"]);
            $strarray=explode(" ",$courseInfo[$i]["time_place"]);
//            print_r($strarray);
            // TODO 没有分析某些特殊的数组
            if(sizeof($strarray)%4==0){
                $info=array();//
                //[0]代表周几，[1]代表第几节,[2]代表第几周[3]地点[4]name
                for($j=0;$j<sizeof($strarray);$j++){
                    if($j%4==0&&$j!=0){
                        $result[]=$info;
                    }
                    $info[$j%4]=$strarray[$j];
                    if($j%4==3){
                        $info[4]=$courseInfo[$i]["name"];
                        $info[5]=$courseInfo[$i]["course_id"];
                    }
                }
                $result[]=$info;
            }

        }
        //result的转换
        for($k=0;$k<sizeof($result);$k++){
            $result[$k][0]=weekToTime($result[$k][0]);
            $result[$k][1]=classToTime($result[$k][1]);
            $result[$k][2]=dateToTime($result[$k][2]);
        }
//      p($result);
        return $result;
    }else{
        return "error in njuTimeTransfer";
    }
}


njuTimeTransfer();

?>
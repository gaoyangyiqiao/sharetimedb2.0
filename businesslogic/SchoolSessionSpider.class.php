<?php

    namespace bl;

    class Spider{

        public function get_content($url, $cookie) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie); //读取cookie
            $rs = curl_exec($ch); //执行cURL抓取页面内容
            curl_close($ch);
            return $rs;
        }

        function arrayFilter($array){
            $arr = array();
            foreach ($array as $key => $val) {
                //去除空元素
//                $val=str_replace("&nbsp;","",$val);
//                $val=str_replace("<br />","",$val);
//                if (empty($val)) {
//                    continue;
//                }
                if(strpos($val,"～")!=false&&strpos($val,"学期")){
                    $arr[] = $val;
                }
//                $arr[] = $val;
            }
            return $arr;
        }


        function getSessionTime(){
            $url = "http://jw.nju.edu.cn/allContentDetail.aspx?MenuType=PX-XZZQ-XLML&id=20130929-08591878%7ec9dbb50c";
            $contents = file_get_contents($url);
            $contents=str_replace("<br>","",$contents);
            $preg="/<span style=\"white-space:nowrap;\">(.*?)<\/span>/is";

            preg_match_all($preg, $contents, $arr);
            $arr[1]=$this->arrayFilter($arr[1]);
//            include_once('common.php');
//            p($arr[1]);
            $result=$arr[1];
            return $result;
        }


        function parse($date_in_chinese){

        }

    }

//    $spider=new Spider();
//    print_r($spider->getSessionTime());



    ?>
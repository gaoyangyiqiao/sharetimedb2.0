<?php
namespace bl;
//用来抓取教务网信息的类
class Fetchcourse{
    //模拟登录
    public function login_post($url, $cookie, $post) {
        $curl = curl_init();//初始化curl模块
        curl_setopt($curl, CURLOPT_URL, $url);//登录提交的地址
        curl_setopt($curl, CURLOPT_HEADER, 0);//是否显示头信息
        curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);//是否自动显示返回的信息
        curl_setopt($curl, CURLOPT_COOKIEJAR, $cookie); //设置Cookie信息保存在指定的文件中
        curl_setopt($curl, CURLOPT_POST, 1);//post方式提交
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($post));//要提交的信息
        curl_exec($curl);//执行cURL
        curl_close($curl);//关闭cURL资源，并且释放系统资源
    }



    //登录成功后获取数据
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

    //整理获得的课程信息
    public function transfer($array){
        $course=array();
        $result=array();
        if(is_array($array['courseInfo'])){
            for($i=0;$i<sizeof($array['courseInfo']);$i++){
                if($i%11==0){
                    $course['course_id']=$array['courseInfo'][$i];
                    continue;
                }if($i%11==2){
                    $course['name']=$array['courseInfo'][$i];
                    continue;
                }if($i%11==4){
                    $course['teacher']=$array['courseInfo'][$i];
                    continue;
                }if($i%11==5){
                    $course['time_place']=$array['courseInfo'][$i];
                    $result['courseInfo'][$i/11]=$course;
                    continue;
                }
            }
            $result['userInfo']=$array['userInfo'];
            return $result;
        }
    }

    //获取用户的课程信息和用户信息
     public function getInfo($username, $password){
        $post = array (
            'userName'=> $username,
            'password'=> $password
        );

        //登录地址
        $url = "http://jwas2.nju.edu.cn:8080/jiaowu/login.do";
        //设置cookie保存路径
        $cookie = dirname(__FILE__) . '/cookie_jw.txt';
        //登录后要获取信息的地址
        $url2 = "http://jwas2.nju.edu.cn:8080/jiaowu/student/teachinginfo/courseList.do?method=currentTermCourse";
        //模拟登录
        $this->login_post($url, $cookie, $post);
        //获取登录页的信息
        $content = $this->get_content($url2, $cookie);
        //转码
         mb_convert_encoding($content, "UTF-8", "auto");
         print_r($content);
         
        //去除换行符
        $content=str_replace("\n","",$content);
        $content=str_replace("\r","",$content);
        $content=str_replace("\t","",$content);
        $content=str_replace("\r\n","",$content);
         $content=str_replace("<br/>","  ",$content);//去除br换行符,替换为两个空格
        $content=str_replace("  "," ",$content);
         //清除换行符、空格符、制表符
         // $content = preg_replace("/([\r\n|\n|\t| ]+)/",'',$content);
        //删除cookie文件
        @unlink($cookie);
        //匹配页面信息
        $preg = "/<td valign=\"middle\">(.*?)<\/td>/is";
        //
        preg_match_all($preg, $content, $arr,PREG_PATTERN_ORDER);

        $str = $arr[1];
        
        //获取姓名和身份
        $preg_userinfo="/<div id=\"UserInfo\">(.*?)<\/div>/is";
        preg_match_all($preg_userinfo,$content,$userInfo);

        $userInfo[1][0]=str_replace("欢迎您：", "", $userInfo[1][0]);
        $userInfo[1][0]=str_replace("当前身份：", "", $userInfo[1][0]);
        $userInfo[1][0]=str_replace("&nbsp;&nbsp;&nbsp;&nbsp;", "-", $userInfo[1][0]);

        $info=explode("-", $userInfo[1][0]);
       
        // if($info[1]=='学生'){
        //     $info[1]='student';
        // }if($info[1]=='教师'){
        //     $info[1]='teacher';
        // }
        $result['userInfo']=$info;

        $result['courseInfo']=$str;

//         print_r($result);
         //输出内容
        return $this->transfer($result);
    }

    //获取用户的身份信息
    public function getRole($username,$password){
        $content=$this->getInfo($username,$password);
        $role=$content['userInfo'];
        return $role;
    }

    public function getCourses($username,$password){
        $content=$this->getInfo($username,$password);
        $courses=$content['courseInfo'];
        return $courses;
    }
}

//    $fetch=new Fetchcourse();
//    $content=$fetch->getCourses("131250043","19941026");
//
//    for($i=0;$i<sizeof($content);$i++){
//        print_r($content[$i]);
//        echo "<br/>";
//    }


?>
<?php
 	class ImageHandler{
        public $photo_path;

        function __construct(){
            $this->photo_path=dirname(dirname(__FILE__))."/picture/";

        }
        //picture为接收的key，name为用户的id
 		function save(){
            $target_path = $this->photo_path.basename( $_FILES['picture']['name']);
            if(move_uploaded_file($_FILES['picture']['tmp_name'], $target_path)) {
                echo "uploaded";
            }  else{
                echo "error, please try again!" . $_FILES['picture']['error'];
            }

            return $_FILES['picture']['error'];
 		}

 		function get($user_id){
            $path="http://".$_SERVER['HTTP_HOST']."/sharetimedb2/picture/".$user_id.".png";
 			return $path;
 		}

 	}


?>
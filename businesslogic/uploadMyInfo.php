<?php
namespace bl;

	$root_path=dirname(dirname(__FILE__));
	require($root_path.'/controller/UserController.php');
	function saveInfo($id=0,$name,$photopath,$phone,$password=0){
		echo 'it is in saveInfo--->>>';
		$userInfo=array(
			'id'=>$id,
			'name'=>$name,
			'photopath'=>$photopath,
			'phone'=>$phone,
			'password'=>$password
			);

        $user_id=\controller\addUser($userInfo);
        return $user_id;

	}

?>
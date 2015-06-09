<?php
    namespace bl;
	$root_path=dirname(dirname(__FILE__));
	require($root_path.'/controller/UserController.php');
	require($root_path.'/controller/UserRelationController.php');
	function getContactInfo($user_id,$contact_id){
		$contact=\controller\getUser($contact_id);
        $relationInfo=\controller\getRelationInfo($user_id,$contact_id);
        $contact[0]['tip']=$relationInfo[0]['tip'];
        $contact[0]['right']=$relationInfo[0]['right'];

        $data=array(
            'status'=>1,
            'info'=>array(
                'id'=>$contact_id,
                'name'=>$contact[0]['name'],
                'img'=>$contact[0]['photopath'],
                'phone'=>$contact[0]['phone'],
                'tip'=>$contact[0]['tip'],
                'right'=>$contact[0]['right']
            ),
        );

		return json_encode($data);
	}
?>
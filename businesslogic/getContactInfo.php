<?php
	$root_path=dirname(dirname(__FILE__));
	require($root_path.'/controller/UserController.php');
	require($root_path.'/controller/UserRelationController.php');
	function getContactInfo($user_id,$contact_id){
		$contact=array();
		while($rs=mysql_fetch_array(getUser($contact_id))){
			$contact['id']=$rs['id'];
			$contact['name']=$rs['name'];
			$contact['photopath']=$rs['photopath'];
			$contact['phone']=$rs['phone'];
		}
		while($row=mysql_fetch_array(getRelationInfo($user_id,$contact_id))){
			$contact['tip']=$row['tip'];
			$contact['right']=$row['right'];
		}	

		return $contact;
	}
?>
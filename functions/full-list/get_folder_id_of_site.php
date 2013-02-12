<?php

	session_start();
	include ('../db.php');
	include('../general.php');
	
	//get folder_id of the selected site
	$folder_id=get_folder_id_from_sites($_GET['site_id']);
	 
	 $data['folder_id']=$folder_id;
	echo json_encode($data);
	
?>	
 
<?php
	session_start();
	
	include('../db.php');
	
	 
	
	$tag_id= $_GET['tag_id'];
   
  	mark_tag_read($tag_id);
	
	//get the task id, and send it back as json
	
	//$data=array();
	$to_do_id[]=get_to_do_id_from_tags($tag_id);
	
  $data['to_do_id']=$to_do_id;
  $data['yi']=56;
  $data['asd']='k';
  $data['dsa']='wiiiiii';

	echo  json_encode($data);
	
	
?>
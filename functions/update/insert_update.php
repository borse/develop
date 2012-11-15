<?php
	include('../general.php');
	
	include('../connect_db.php');
	
	//include from auth.php
	//Start session
	session_start();
	
	//Check whether the session variable SESS_MEMBER_ID is present or not
	if(!isset($_SESSION['SESS_MEMBER_ID']) || (trim($_SESSION['SESS_MEMBER_ID']) == '')) {
		header("location: access-denied.php");
		exit();
	}//end of include===============
	
	
	 
	//add values to vars:
	
		//id of the update creater
		$develper_id= $_SESSION['SESS_MEMBER_ID'];
		$to_do_id= $_POST['to_do_id'];  //this is a hidden input in the form
		//prevent sql injection, clean function found in funtions/general.php
		$details= clean($_POST['details']);//text from textarea 
		//array of tagged devs
		
		$appointed_devs_id= $_POST['appointed_devs_id'];
	 
	//end of vars
	
	//insert new update to to_do_updates table
	$query="INSERT INTO to_do_updates (to_do_id,details,developer_id,status) 
	VALUES ('$to_do_id','$details','$develper_id',1)" ;
	//run query
	if(!$results= mysql_query($query,$db_link))
	{
		echo 'error in to_do_updates ', mysql_error();
		exit();
	}	else
	{
		echo 'update added';
	}
	//id of the to_do_update that was just created
	$to_do_update= mysql_insert_id();
	
	 
	for ($i = 0; $i  < count($appointed_devs_id); $i++) 
	{
		
	
	//insert all tags  to tags  table
	$query="INSERT INTO tags (to_do_id,creator_dev_id,appointed_dev_id,to_do_update_id) 
	VALUES ('$to_do_id','$develper_id','$appointed_devs_id[$i]','$to_do_update')" ;
	
	if(!$results= mysql_query($query,$db_link))
	{
		echo 'error in tags ', mysql_error();
		exit();
	}	else
	{
		echo 'tag added';
	}
	
	
		 
	 
		
			
	}//end of for
	 
		
	
	 
	
	?>
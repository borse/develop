<?php

include ('../db.php');

//$db_link= get_conn_and_connect();


$update_id=$_POST['update_id'];
//echo 'update_id= ', $update_id,'<br />';

$action= $_POST['action'];

switch($action)
{
	
	case "active" :
	//1
	$status=1;
	break;

	case "completed" :
	//2
	$status=2;
	break;

	case "cancelled" :
	//3
	$status=3;
	break;

	
}//end of switch ($action)

//echo 'status= ',$status,'<br />';

//run query
   $setfields = array("status");
    $setvalues = array($status);
    $wherefields = array("update_id");
    $wherevalues = array($update_id);
if(!update('to_do_updates',$setfields,$setvalues,$wherefields,$wherevalues))
{
 	echo 'there is an error' ;	
	exit;
}
else
{
//	echo "done";
}



//close_conn($db_link);
?>
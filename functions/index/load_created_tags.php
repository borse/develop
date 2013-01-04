<?php

	//Start session
	session_start();
	
	include('../db.php');
	
	
	
	//$db_link= get_conn_and_connect();
	
	$deveolper_id= $_SESSION['SESS_MEMBER_ID'];

	
	$rows=get_created_tags($deveolper_id);
	//print_r($row);
	//reverse the array rows.. to print the lastest tags, instead of the first tags..
	$rows=array_reverse($rows);
	
	//echo "you tagged" "aapointed_dev_id" at "pagename/taskname" ... link leads to to_do_update_id
	
	$counter=1;
	
	foreach($rows as $row)
	{
		echo '<a href="update.php?object=',$row['to_do_id'],'"> you have tagged ', $name=get_appointed_dev_name($row['appointed_dev_id']), ' @ ',get_page_name($row['to_do_id']),'/',get_task_name($row['to_do_id']),'@ Update NO: ',$row['to_do_update_id'],' </a> <br>';
		if($counter==10)
		{
				break;
		}
	
	
			$counter++;
		
		
	}


?>
<?php
	session_start();
	
	include('../db.php');
	$developer_id= $_SESSION['SESS_MEMBER_ID'];
	
	$rows=get_appointed_tags($developer_id);
	//reverse the array rows.. to print the lastest tags, instead of the first tags..
	$rows=array_reverse($rows);
	
	$counter=1;
	
	// echo User has taged you @ pagename/tasktitle @ update NO: $row['to_do_update_id']
	foreach($rows as $row)
	{
		echo '<a href="update.php?object=',$row['to_do_id'],'">', $name=get_appointed_dev_name($row['creator_dev_id']),' has tagged you @ ',get_page_name($row['to_do_id']),'/',get_task_name($row['to_do_id']),'@ Update NO: ',$row['to_do_update_id'],' </a> <br>';
		if($counter==10)
		{
				break;
		}
	
	
			$counter++;
		
		
	}




?>
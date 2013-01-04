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
		if ($row['isRead']==1)
		{
		continue;	
		}
		//echo '<a onclick="notification_clicked(',$row['tag_ID'],')">', $name=get_appointed_dev_name($row['creator_dev_id']),' has tagged you @ ',get_page_name($row['to_do_id']),'/',get_task_name($row['to_do_id']),'@ Update NO: ',$row['to_do_update_id'],' </a> <br>';
		 
	?>
        	<a class="info" onclick="notification_clicked(<?=$row['tag_ID']?>)"> <b><?=$name=get_appointed_dev_name($row['creator_dev_id'])?> </b>has tagged you @ <b><?=get_page_name($row['to_do_id'])?></b>/<b><?=get_task_name($row['to_do_id']) ?></b>  <br/>@ Update NO:  <b><?=$row['to_do_update_id']?> </b> </a> <br/>
        <?php
	 
		
		
	}




?>
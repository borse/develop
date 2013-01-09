<?php
//Start session
	session_start();
	
	include('../connect_db.php');
	include('../db.php');
	
	$deveolper_id= $_SESSION['SESS_MEMBER_ID'];
	//sellect task title and id, from tasks,  where the dev_id= logged in user
	$query="SELECT title,to_do_id FROM to_do WHERE devolper_id= '$deveolper_id'";
	
	//run query
	if(!$results= mysql_query($query,$db_link))
	{
		echo "error: ",mysql_error();
		exit;
	}//end if
	
	
	while($row= mysql_fetch_assoc($results))
	{
		?>
        <p class="info">  Page :<b><?= get_page_name($row['to_do_id'])?> </b> |||||||||||| Task:  <a class="info" href= "<?='update.php'.'?object='.$row['to_do_id']?> "><b><?= $row['title']?></b></a> </p> 
      
     
        
        		
		<?php	
	}
	
	
	
 

?>
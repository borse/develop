<?php

	session_start();
	include ('../db.php');
	include('../general.php');
	$id= $_POST['id'];
	$action= $_POST['action'];

	 switch($action) {	//decide what to do
	
	case "open_page":
		//print all the to_do in this page
	 	 $rows=tasks_in_page($id); //function found in db.php
		  print_all_tasks($rows);//function found at the button of page
		 
	break;
	
	case "add_page":
	add_page($id);
	  
	break;
	
	case "add_folder":
	add_folder($id);
	  
	break;
	
	case "add_task":
	 add_task($id);
	break;
	
	}


//functions:
function print_all_tasks($rows)
{
	echo '<ul>';
	foreach($rows as $row)
	{
		?>
			<li><a href="http://borse.myftp.org/develop/update.php?object=<?=$row['to_do_id']?>"><?=$row['title']?></a></li>                
		<?php
	}//end of foreach
	
	echo '</ul>';
}//end of function print_all_tasks

function add_page($id)
{
	
}//end of add_page

function add_folder($id)
{
	
}//end of add_folder

function add_task($id)
{
	
}//end of add_task
?>
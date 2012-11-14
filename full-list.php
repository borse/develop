<?php

	require_once('auth.php');


	include('functions/general.php');
	include('functions/full-list.php');

	include('functions/connect_db.php');
	//=============================== TO-DO ID= 18===============================
	//if done was clicked
	if(isset($_GET['done']))
	{
		get_done();
		
	}//end of if $_get done
	
	//=============================== TO-DO ID= 18===============================
	
	//proccess page data if  new page submited
	//check if $_post Page form
	if(isset($_POST['new_page']))
	{	
		post_new_page();
		
	
	}//end of $_POST[ if-------------------
	
	
	//check if $_post TO DO form
	if(isset($_POST['new_to_do']))
	{
		post_new_to_do();
		
		
	}//end of $_POST[ new to do IF
	
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Develop</title>
<link href="css/loginmodule.css" rel="stylesheet" type="text/css" />
</head>
<style type="text/css">
.aligen_cen {
	text-align: center;
}
.alig_center {
	text-align: center;
}
</style>
</head>

<body>


<?php
include('minicode/menu.php');
	//ig "new page" link was clicked.. display new page form
	if(isset($_GET['new_page']))
	{
		//draw new page form
		get_new_page();
	}//end if ($_GET['new_page']))
?>


<?php

	//ig "new to_do" link was clicked.. display new to_do form
	if(isset($_GET['to_do']))
	{	
		get_to_do();
		
	}//end if


?>





<?php

	//=============================== TO-DO ID= 17===============================
	//if linke "list finished tasks" is clicked, change table
	if(isset($_GET['listfinshedtasks']))
	{	
					//list finished tasts
					get_list_finshed_tasks();
					
	//=============================== TO-DO ID= 17===============================				
	}else //list onGoing tasks =======normal view
	{
					
					//list ongoing tasts
					 get_list_ongoing_tasks();
					
	}//end of 'else' argument   of -> if(isset($_GET['listfninshedtasks']))
?>
    <p>&nbsp; </p>
    
<p>&nbsp;</p>
</body>
</html>

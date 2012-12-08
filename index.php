<?php

	require_once('auth.php');


	include('functions/general.php');
	include('functions/full-list.php');
	
	include('functions/db.php');

	include('functions/connect_db.php');
	

	

	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Develop</title>
<link href="css/index.css" rel="stylesheet" type="text/css" />
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

<div id="div_menu">
<?php
include('minicode/menu.php');
	//ig "new page" link was clicked.. display new page form
	if(isset($_GET['new_page']))
	{
		//draw new page form
		get_new_page();
	}//end if ($_GET['new_page']))





?>
</div>

<div id="div_main_body">
	<div id="div_created_tasks" >
    	<p> Tasks created by me:</p>
        <div id="div_tasks_table">
 			       
        </div>
     </div>
</div>









	
    <p>&nbsp; </p>
    
<p>&nbsp;</p>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
  
<script type="text/javascript" src="js/index.js"></script>
</body>
</html>

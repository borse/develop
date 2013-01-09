<?php

	require_once('auth.php');


	include('functions/general.php');
	include("functions/db.php");
 
 
	 
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head> <meta charset="utf-8" />
    <title>Lines between Draggable and Droppable</title>
      <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css"
        rel="stylesheet" type="text/css" />
    
<link href="css/new-full-list.css" rel="stylesheet" type="text/css" />
</head>
  
</head>

 
<body id="body">
<?php
include('minicode/menu.php');

 ?>
 
   <select name="select_site" id ="select_site">
                <?php
					
					$rows=get_all_table("sites"	);
					//display sites drop down menu
					foreach($rows as $row)
					{
				?>
		
        				   <option value="<?php echo $row['site_id'] ?>"><?php echo $row['name'] ?></option>				
				
                <?php		
					}//end of while
					
				
				?>
              </select> 
              
              
                <input  type="textfield" value="folder id" id="folder_id"/>
         
 <div id="draw_map">
   
  </div>
    
    
   
    <p>&nbsp; </p>
    
<p>&nbsp;</p>

 

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/jquery-ui.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/1.5.2/raphael-min.js"></script>
    <script type="text/javascript" src="js/scripts/general.js"></script>
<script type="text/javascript" src="js/new-full-list.js"></script>


</body>
</html>

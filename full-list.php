 

<?php

	require_once('auth.php');


	 
	include('functions/full-list/full-list.php');
	include('functions/general.php');
	include("functions/db.php");

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
<head> <meta charset="utf-8" />
    <title>Lines between Draggable and Droppable</title>
      <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css"
        rel="stylesheet" type="text/css" />
    
<link href="css/full-list.css" rel="stylesheet" type="text/css" />
</head>
  
</head>

 
<body id="body">


<?php
include('minicode/menu.php');

 ?>
 
<?php
 
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
              
              
               
         
 <div id="draw_map">
   
  </div>
    
    
   
    <p>&nbsp; </p>
    
<p>&nbsp;</p>

 

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/jquery-ui.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/1.5.2/raphael-min.js"></script>
    <script type="text/javascript" src="js/scripts/general.js"></script>
<script type="text/javascript" src="js/full-list.js"></script>


</body>
</html>

 

<?php

	require_once('auth.php');


	 
	//include('functions/full-list/old-full-list.php');
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
		?>
				<script type="text/javascript">
			        window.alert("<?=add_page_to_table()?>")
				</script>
        			 
		<?php
		
	
	}//end of $_POST[ if-------------------
	
	
		if(isset($_POST['new_to_do']))
	{	
		?>
			 
                	<script type="text/javascript">
			     	   window.alert("<?=add_task_to_table()?>")
					</script>
				 
		<?php
		
	
	}//end of $_POST[ if-------------------
 
	//proccess page data if  new folder submited
	//check if $_post folder  form
	if(isset($_POST['new_folder']))
	{	
		?>
				<script type="text/javascript">
					window.alert("<?=add_folder_to_table()?>")
				</script>
				 
		<?php
		
	
	}//end of $_POST[ if-------------------
	
	 
	
 
 
	 
	
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
    <div id="containerz">
            
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
                          
                          
                           
                          <div id="svgbasics">
                                    </div>
                                     
                                    <div id="pnlAllIn" style="z-index: 10;"> 
                                        </div> 
             <div id="draw_map">
               
              </div>
               <div id="dialog" title="Reset persons mapping?" style="z-index: 10;">
                    <p>
                        <span class="ui-icon ui-icon-alert"></span>Do you wish to delete all connection
                        resetting the mapping to it's original positions?</p>
                </div>
                <div id="dialogMappingResult" title="Current Mapping" style="z-index: 10;">
                    <p>
                        Here is a list of the current mapping:
                    </p>
                    <ul style="list-style: none;">
                        <li>No mapping was done yet</li></ul>
                </div>
                <a id="popButton" href="#" style="z-index: 10;">reset mapping</a> <a id="getMappings"
                    href="#" style="z-index: 10;">show mapping</a>
        
        </div> <!--	 END OF CONTAINER-->
       
       
        <div id="popup_box">    <!-- OUR PopupBox DIV-->
            <a id="popupBoxClose">Close</a>    
            <div id="popup_box_content">
           	 Pages will load here .. relax :@
            </div>
            
        </div>
       
  
    
     
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/jquery-ui.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/1.5.2/raphael-min.js"></script>
        <script type="text/javascript" src="js/scripts/general.js"></script>
    <script type="text/javascript" src="js/full-list.js"></script>
    

</body>
</html>

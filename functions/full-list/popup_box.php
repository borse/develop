<?php

	session_start();
	include ('../db.php');
	include('../general.php');
	$id= $_POST['id'];
	$action= $_POST['action'];
	$site_id=$_POST['site_id'];

	 switch($action) {	//decide what to do
	
	case "open_page":
		//print all the to_do in this page
	 	 $rows=tasks_in_page($id); //function found in db.php
		 ?>
          <a onclick="loadPopupBox('add_task',<?= $id?>,0 )">Create a new  task</a>
         <?php
		  print_all_tasks($rows);//function found at the button of page
		 
	break;
	
	case "add_page":
	add_page($id);
	  
	break;
	
	case "add_folder":
	add_folder($id,$site_id);
	  
	break;
	
	case "add_task":
	 add_task($id);
	break;
	
	}


//functions:
function print_all_tasks($rows)
{
	echo '<ul>';
	//if rows is not empty
	if($rows)
	{
		foreach($rows as $row)
		{
			?>
				<li><a href="http://borse.myftp.org/develop/update.php?object=<?=$row['to_do_id']?>"><?=$row['title']?></a></li>                
			<?php
		}//end of foreach
	}else
	{
		echo "No tasks for this page";	
		
	}
	
	echo '</ul>';
}//end of function print_all_tasks

function add_page($id)
{
	echo 'hey';
	$folder_id=$id;
	
	//draw page
	?>
    	
				<form  class= "formz" id="form3" name="form3" method="post" action="">
				<h1>New Page:</h1>
                <p></p>
                
				  <table width="200" border="0">
					<tr>
					  <td></td>
					  <td>&nbsp;</td>
					  <td>&nbsp;</td>
					</tr>
					<tr>
					  <td>Page name:</td>
					  <td><label for="textfield2"></label>
					  <input type="text" name="textfield2" id="textfield2" /></td>
                      <input type="hidden" name="folder_id" value="<?=$folder_id?>" />
					  <td><input type="submit" name="new_page" id="new_page" value="Add" /></td>
                      
					</tr>
				  </table>
			 
				</form>
                
                <?php
				
				
				
}//end of add_page

function add_folder($id,$site_id)
{
	$parent_id=$id;
	
	//draw page
	?>
    	
				<form class= "formz"  id="form2" name="form2" method="post" action="">
				<h1>Create Folder:</h1>
                <p></p>
                
				  <table width="200" border="0">
					<tr>
					  <td></td>
					  <td>&nbsp;</td>
					  <td>&nbsp;</td>
					</tr>
					<tr>
					  <td>Folder name:</td>
					  <td><label for="textfield2"></label>
					  <input type="text" name="textfield2" id="textfield2" /></td>
                      <input type="hidden" name="parent_id" value="<?=$parent_id?>" />
                       <input type="hidden" name="site_id" value="<?=$site_id?>" />
					  <td><input type="submit" name="new_folder" id="new_folder" value="Create Folder" /></td>
					</tr>
				  </table>
			 
				</form>
                
                <?php
	
}//end of add_folder

function add_task($id)
{
	?>
	<h1>New Task:</h1>       
        
                
               
        <form class= "formz"  id="form1" name="form1" method="post" action="">
          <table width="200" border="0">
             <tr>
              <td></td>
              <td>&nbsp;</td>
            </tr>
        
            <tr>
              <td>Task title</td>
              <td><label for="textfield"></label>
              <input type="text" name="textfield" id="textfield" /></td>
            </tr>
            <tr>
              <td>Details:</td>
              <td>
              <textarea name="to_do_details" id ="to_do_details"  cols="45" rows="5"></textarea></td>
            </tr>
               <tr>
              <td>&nbsp;</td>
              <input type="hidden" name="page_id" value="<?=$id?>" />
              <td><input type="submit" name="new_to_do" id="new_to_do" value="Create Task" /></td>
              
            </tr>
          </table>
        </form>
    <?php
	
}//end of add_task



?>
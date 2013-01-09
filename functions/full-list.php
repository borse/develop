
<?php
	
	//draws new page form
	function get_new_page()
	{
			include('functions/connect_db.php');
		?>
			 
				<form id="form2" name="form2" method="post" action="<?PHP echo $_SERVER['PHP_SELF']?>">
				<h1>New Page:</h1>
                <p></p>
                <p><b>adding new pages disabled for  now/maintaince mode</b></p>
				  <table width="200" border="0">
					<tr>
					  <td></td>
					  <td>&nbsp;</td>
					  <td>&nbsp;</td>
					</tr>
					<tr>
					  <td>New page:</td>
					  <td><label for="textfield2"></label>
					  <input type="text" name="textfield2" id="textfield2" /></td>
					  <td><input type="submit" name="new_page" id="new_page" value="Add" /></td>
					</tr>
				  </table>
			 
				</form>
			
			<?php
			//stop loading rest of page
			exit();
	
	}//end of function get_new_page()
	//==================================================================================\\
	//                      ===========                     =========== 				\\
	//===========															==========	\\
	//                                        ===========								\\
	//==================================================================================\\
	
	function get_done()
	{
		include('functions/connect_db.php');
		$to_do_id=$_GET['done'];
		// update done status to "finished"
		$query="UPDATE to_do SET done=1 WHERE to_do_id='$to_do_id'";
		
		//run query
		if(!$results= mysql_query($query,$db_link))
		{
			echo 'query error 1';
			exit();
		}//end of if
		
		echo 'to-do ', $to_do_id,' set as finished';		
		
		
		
	}//end of function get_done
	//============================================================================
	//==================================================================================\\
	//                      ===========                     =========== 				\\
	//===========															==========	\\
	//                                        ===========								\\
	//==================================================================================\\
	
	function post_new_page()
	{
		include('functions/connect_db.php');
		//save inserted page name into var name
		$name= clean($_POST['textfield2']); //check for erros later
		
		// check of new inserted page name exists or not
		$query="SELECT * FROM pages WHERE name='$name'";
		
		//run query
		if(!$results= mysql_query($query,$db_link))
		{
			echo 'query error 1';
			exit();
		}//end of if
		
		if($row=mysql_fetch_assoc($results))
		{
			echo 'error: page already exists';
		}else // no such page. create a new one
		 {
			//create new row 
			$query="INSERT INTO pages (name) VALUES ('$name')";
			//run query
			if(!$results= mysql_query($query,$db_link))
			{
				echo 'query error 2';
				exit();
			}else
			 {
				echo $name,' added!';
			 }//end of else
			
		 }//end of else
		
	}//end of function post_new_page
	//============================================================================
	//==================================================================================\\
	//                      ===========                     =========== 				\\
	//===========															==========	\\
	//                                        ===========								\\
	//==================================================================================\\
	
	function post_new_to_do()
	{	
		include('functions/connect_db.php');
		//save form into vars
		$title= clean($_POST['textfield']);
		$page= clean($_POST['to_do_pages']);
		$details= clean($_POST['to_do_details']);
		//set done to default false
		$done=0;
		
		//create new row 
		$query="INSERT INTO to_do (page_id,title,details,done) 
		VALUES ('$page','$title','$details','$done')";
		//run query
		if(!$results= mysql_query($query,$db_link))
		{
			echo 'query 4 error ';
			exit();
		}else
		 {
			echo $title,' added!';
			//display nthe ID created by query
			$to_do_id=mysql_insert_id();
			echo '<br />', 'your comment ID is ',$to_do_id;
			 ?>
				<script type="text/javascript">
				 //display alert with id
                  //pop up, upload done
                 window.alert("object successfully added,id is : <?php echo  $to_do_id?> ")	;
               
                 </script>
                 
             <?php

	
			 
		 }//end of else
		
	
	}//end of function post_new_to_do()
	//============================================================================
	//==================================================================================\\
	//                      ===========                     =========== 				\\
	//===========															==========	\\
	//                                        ===========								\\
	//==================================================================================\\
	
	
	function get_to_do()
	{	include('functions/connect_db.php');
		// select all form pages
		$query="SELECT * FROM pages ";
		
		//run query
		if(!$results= mysql_query($query,$db_link))
		{
			echo 'query 3 error ';
			exit();
		}
		
		
		
	?>
      <h1>New To-Do:</h1>       
       <p></p>
                <p><b>adding new tasks disabled for  now/maintaince mode</b></p>
               
        <form id="form1" name="form1" method="post" action="<?PHP echo $_SERVER['PHP_SELF']?>">
          <table width="200" border="0">
             <tr>
              <td></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>Page:</td>
              <td>
                <select name="to_do_pages" id ="to_do_pages">
                <?php
					//make loop for pages table
					while($row=mysql_fetch_assoc($results))
					{
				?>
		
        				   <option value="<?php echo $row['page_id'] ?>"><?php echo $row['name'] ?></option>				
				
                <?php		
					}//end of while
					
				
				?>
              </select></td>
            </tr>
            <tr>
              <td>To-DO title</td>
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
              <td><input type="submit" name="new_to_do" id="new_to_do" value="Submit" /></td>
            </tr>
          </table>
        </form>
    
    <p>
          <?php
	//stop loading rest of page
	exit();
	}//end of funnction get_to_do()
	//============================================================================
	//==================================================================================\\
	//                      ===========                     =========== 				\\
	//===========															==========	\\
	//                                        ===========								\\
	//==================================================================================\\
	
	
	function get_list_finshed_tasks()
	{	include('functions/connect_db.php');
		//change table to only list finished tasks
					?>	
                    	<h1>Tasks List</h1>
                   		<p style="text-align:right;">
						<a style=" color:#09C;" href="<?php echo 'full-list.php' ?>">list ongoing tasks</a>
                        </p>
					<?php
					
					//SELECT all active TO-DO
					$query= 'SELECT * FROM to_do
							 WHERE  done =1';
					
					//run query	
					if(!$results= mysql_query($query,$db_link))
					{
						echo 'query error 3';
						exit();
					}//end of if
					
					
							
					
				
				?>
				</p>
					<p>&nbsp;</p>
					<table width="50%" align = "center" border="1">
					  <tr>
						<td bgcolor="#CCCCCC"><span class="aligen_cen"><em><strong>TO-DO-ID</strong></em></span></td>
						<td bgcolor="#CCCCCC"><span class="aligen_cen"><em><strong>PAGE</strong></em></span></td>
						<td bgcolor="#CCCCCC"><span class="aligen_cen"><em><strong>TITLE</strong></em></span></td>
						<td bgcolor="#CCCCCC"><span class="aligen_cen"><em><strong>DONE</strong></em></span></td>
						<td bgcolor="#CCCCCC"><span class="aligen_cen"><em><strong>UPDATE</strong></em></span></td>
					   
					  </tr>
					  
					  <?php
					  while($row=mysql_fetch_assoc($results))
					  {
					  ?>
					  <tr>
						<td><span class="aligen_cen"><?php echo $row['to_do_id']?></span></td>
						<td><span class="aligen_cen">
						<?php //Page query
								$page_id=$row['page_id'];
						
						
								//SELECT the page from the pages table
								$query2= "SELECT * FROM pages
										 WHERE  page_id ='$page_id' ";
								
								//run query
								if(!$results2= mysql_query($query2,$db_link))
								{
									echo 'query error 1';
									exit();
								}//end of if
				
								if(!$row2=mysql_fetch_assoc($results2))
								{
									echo 'error : page deleted from table';
								}//end of if
								echo $row2['name']; ?>
						</span></td>
						<td><span class="aligen_cen">
						<a href= "<?='update.php'.'?object='.$row['to_do_id']?> "><?=$row['title']?></a>
						
					  </span></td>
						<td>yup</span></td>
						<td><span class="aligen_cen"> <a href= "<?='update.php'.'?object='.$row['to_do_id']?> ">add</a></span></td>           
					  </tr>
					  <?php
					  }//end of while
					  ?>
					</table>
                    <?php	
	}//end of function get_list_finshed_tasks()
	//============================================================================
	//==================================================================================\\
	//                      ===========                     =========== 				\\
	//===========															==========	\\
	//                                        ===========								\\
	//==================================================================================\\
	
	
	function get_list_ongoing_tasks()
	{	
		include('functions/connect_db.php');
		//click this to change table to only list finished tasks
					?>		<h1>Tasks List</h1>
                    	<p style="text-align:right; color:#09C">
					<a  style=" color:#09C;" href="<?php echo 'full-list.php?listfinshedtasks=1' ?>">list finished tasks</a>
                    </p>
					<?php
					
					//SELECT all onGoing TO-DO
					$query= 'SELECT * FROM to_do
							 WHERE  done =0';
					
					//run query
					if(!$results= mysql_query($query,$db_link))
					{
						echo 'query error 1';
						exit();
					}//end of if
					
					
							
					
				
				?>
				</p>
					<p>&nbsp;</p>
					<table width="50%" align = "center" border="1">
					  <tr>
						<td bgcolor="#CCCCCC"><span class="aligen_cen"><em><strong>TO-DO-ID</strong></em></span></td>
						<td bgcolor="#CCCCCC"><span class="aligen_cen"><em><strong>PAGE</strong></em></span></td>
						<td bgcolor="#CCCCCC"><span class="aligen_cen"><em><strong>TITLE</strong></em></span></td>
						<td bgcolor="#CCCCCC"><span class="aligen_cen"><em><strong>DONE</strong></em></span></td>
						<td bgcolor="#CCCCCC"><span class="aligen_cen"><em><strong>UPDATE</strong></em></span></td>
					   
					  </tr>
					  
					  <?php
					  while($row=mysql_fetch_assoc($results))
					  {
					  ?>
					  <tr>
						<td><span class="aligen_cen"><?php echo $row['to_do_id']?></span></td>
						<td><span class="aligen_cen">
						<?php //Page query
								$page_id=$row['page_id'];
						
						
								//SELECT the page from the pages table
								$query2= "SELECT * FROM pages
										 WHERE  page_id ='$page_id' ";
								
								//run query
								if(!$results2= mysql_query($query2,$db_link))
								{
									echo 'query error 1';
									exit();
								}//end of if
				
								if(!$row2=mysql_fetch_assoc($results2))
								{
									echo 'error : page deleted from table';
								}//end of if
								echo $row2['name']; ?>
						</span></td>
						<td><span class="aligen_cen">
						<a href= "<?='update.php'.'?object='.$row['to_do_id']?> "><?=$row['title']?></a>
						
					  </span></td>
						<td><span class="aligen_cen"><a href= "<?='full-list.php'.'?done='.$row['to_do_id']?> ">X</a></span></td>
						<td><span class="aligen_cen"> <a href= "<?='update.php'.'?object='.$row['to_do_id']?> ">add</a></span></td>           
					  </tr>
					  <?php
					  }//end of while
					  ?>
					</table>
      <?php
	}//end of function  get_list_ongoing_tasks()
	
	?>
<?php


	   include('../general.php');
	
		include('../connect_db.php');
		//Start session
		session_start();
		
		//Check whether the session variable SESS_MEMBER_ID is present or not
		if(!isset($_SESSION['SESS_MEMBER_ID']) || (trim($_SESSION['SESS_MEMBER_ID']) == '')) {
			header("location: access-denied.php");
			exit();
	}
	   
	   
	   
	   
	   
	   //--------------
	   $to_do_id= $_POST['to_do_id'];
	   //select all updates from 
	   $query="SELECT * FROM to_do_updates 
	   WHERE to_do_id='$to_do_id'";
		//run query
		if(!$results= mysql_query($query,$db_link))
		{
			echo 'query 1 error ';
			exit();
		}//end if
		   
	   //list all updates
	   while($row=mysql_fetch_assoc($results))
	   {
		   		
	  		

		   print_update(  $row);
	
	   }//end while loop
	  
	 
     //end of page================================================
     
     function print_update(  $row)
	 {
		  $update_id=$row['update_id'];
		 include('../connect_db.php');
		 	//save tagged ppl for each update, in this array.. this array will be automatically reset with each call of this function
			$users_editable[]=  -12;
		   ?>
      
      
      
      <div class="div_data">
          <p> </p>
          
          <p> </p>
        
          <p> </p>
        
        
        <?PHP
		
		 
			
			//query to extract  creator iD and status
			$creator_query= "SELECT  developers.member_id,developers.login ,to_do_updates.status 
			FROM developers,to_do_updates 
			   WHERE developers.member_id=to_do_updates.developer_id && to_do_updates.update_id='$update_id' ";
		
				if(!$creator_results= mysql_query($creator_query,$db_link))
				{
					echo 'creator error ';
					echo ' ',mysql_error();
					exit();
				}//end if
				//fetch results
				$creator_row= mysql_fetch_assoc($creator_results);
				
				//save row into vars
				 $update_creator_username= $creator_row['login'];
				 $update_status= $creator_row['status'];
				 $update_creator_id=$creator_row['member_id'];
				 
				 //this person is able to change this update's status
							$users_editable[]=$update_creator_id;
				 
		 
			//query to extract all tagged deveopers of each to_do_update
			
			$tags_query="SELECT  developers.login ,developers.member_id FROM developers,tags 
			WHERE  developers.member_id=appointed_dev_id  && tags.to_do_update_id='$update_id'";
			
			//excute query
			if(!$tags_results=mysql_query($tags_query,$db_link) )
			{
					echo 'tags query  error ';
					echo ' ',mysql_error();
					exit();
				}//end if
			
			
				
			
			
		
		?>
          
          
          <ul>
          
             <li  id="li_title">Update: <?PHP echo $update_id ?></li> 
             <li id="li_tagged">
				 <?php
                        //loop through all tags for this update
						while($tags_row=mysql_fetch_assoc($tags_results))
						{
							echo $tags_row['login'],', ';
							
							//this person is able to change this update's status
							$users_editable[]=$tags_row['member_id'];
							
						}//end of while
                ?>             
             </li>
			 
             <li id = "li_text"><?php echo $row['details']?></li> 
             <li id="li_dev"><?= $update_creator_username ?></li>
          </ul>
           <p></p>
    
     	 <p></p>
      </div>
    
      <div class="div_tag">
      			<?php 
				
				//check if logged in user is able to edit the status of the update or not
				//in_array(element.array)  , this function searchs the element in the array, ..
				if (in_array($_SESSION['SESS_MEMBER_ID'], $users_editable)) {
  			  		  $p_id= 'id="enabled_status"  onclick="enable_statuz()"';
					}else
					 {
						$p_id=''; 
					 }
				if($update_status==1)
				{
				 echo'	<p  ',$p_id,' class="li_status_active" >Active</p>';
				}
					if($update_status==2)
				{
				 echo'	<p ',$p_id,' class="li_status_completed" >Completed</p>';
				}
					if($update_status==3)
				{
				 echo'	<p ',$p_id,' class="li_status_cancelled" >Cancelled</p>';
				}
				
				?>
                 
          		     
      
      </div>
         <p class="float_breaker">&nbsp;</p>
	  
	 
  		
       
    
     
      
      
      
      
   <?php
		 
	  }//end of print_update
	 
	 
	 ?>
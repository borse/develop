<?php
	
	require_once('auth.php');

	include('functions/general.php');
	
	include('functions/connect_db.php');
	
	
	
	//check if update was pressed
	if(isset($_POST['updates']))
	{
		//add values to vars
		//prevent sql injection, clean function found in funtions/general.php
		$to_do_id= $_POST['to_do_id'];  //this is a hidden input in the form
		$details= clean($_POST['details']);
			
		//insert new update to to_do_updates table
		$query="INSERT INTO to_do_updates (to_do_id,details) VALUES ('$to_do_id','$details')";
		//run query
		if(!$results= mysql_query($query,$db_link))
		{
			echo 'query 2 error ';
			exit();
		}else
		{
			echo 'update added';
		}//end of else
		 
	 	
	}//end of if $_POST[
	
	
 
?>
<!DOCTYPE HTML>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Update</title>
<link href="css/update.css" rel="stylesheet" type="text/css" />
</head>
</head>

<body>


<p>
  



<?php
	include('minicode/menu.php');
  	//check if to_do selected
   if(isset($_GET['object']))
   {
	   

	//display TO-do
	$to_do_id=$_GET['object'];
	
	 $query="SELECT * FROM to_do WHERE to_do_id='$to_do_id'";
		//run query
		if(!$results= mysql_query($query,$db_link))
		{
			echo 'query 3 error ';
			exit();
		}//end if
		
		if(!$row=mysql_fetch_assoc($results))
		{
			echo 'error: to do not found :S';
		}//end of if


?>

<p align="center" style="font-size:18px;color:#900"><?php echo '//=============================== TO-DO ID= ',$to_do_id,'=============================== ' ?> </p>
<p style="text-align:right"><a style="font-size:16px; color:#39F" href="<?='full-list.php'.'?done='.$_GET['object']?>">Done!</a></p>
<table width="717" border="1">
  <tr>
    <td width="71">Title:</td>
    <td width="100%"><?= $row['title']?></td>
  </tr>
  <tr>
    <td>Details:</td>
    <td><?= $row['details']?></td>
  </tr>
</table>
<hr style="color:#60C"/>
<?php


	   
	   
	   
	   
	   
	   
	   //--------------
	   $to_do_id= $_GET['object'];
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
	  ?>
       <div class="div_loop">
      
      
      <div class="div_data">
          <p> </p>
          
          <p> </p>
        
          <p> </p>
        
          <hr/>
          <ul>
          
             <li  class="li_title">Update: <?PHP echo $row['update_id']?></li> 
             <li class = "li_text"><?php echo $row['details']?></li> 
          </ul>
           <p></p>
    
     	 <p></p>
      </div>
    
      <div class="div_tag">
          <p> </p>
          
          <p> </p>
        
          <p> </p>
        
          <hr/>
          <ul>
             <li  class="li_title">Update: <?PHP echo $row['update_id']?></li> 
             <li class = "li_text"><?php echo $row['details']?></li> 
          </ul>
           <p></p>
    
    	  <p></p>
      
      </div>
  		
     
    
       </div>
      
      
      
      
      <?php
	   }//end while loop
	 
	   
   }//end if $_GET
?>
  
  
 
  <div class="div_update_input">
  
    
    <p>&nbsp;</p>
    
        <hr/>
    
    
        <form id="form1" name="form1" method="post" action="">
        <input name="to_do_id" type = "hidden" value= "<?php echo $_GET['object'] ?>"/>
          <table width="200" border="0">
            <tr>
              <td>Update:</td>
              <td><label for="textarea2"></label>
              <textarea name="details" id="details" cols="45" rows="5"></textarea></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><input type="submit" name="updates" id="button" value="Update" /></td>
            </tr>
          </table>
        </form>
    
</div>
</body>
</html>

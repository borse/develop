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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Update</title>
<link href="loginmodule.css" rel="stylesheet" type="text/css" />
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
      <p> </p>
      
      <p> </p>
    
      <p> </p>
    
      <hr/>
          
<table width="656" border="0">
        <tr>
          <td width="39" bgcolor="#CCCCCC">ID</td>
          <td width="607" bgcolor="#CCCCCC">Update</td>
        </tr>
        
     
        <tr>
          <td><?PHP echo $row['update_id']?></td>
          <td><?php echo $row['details']?></td>
        </tr>
     
     </table>
    
 
      <p></p>
    
      <p></p>
    
      
      
      
      
      
      <?php
	   }//end while loop
	 
	   
   }//end if $_GET
?>
  
  
  
  
  
</p>


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
<p>&nbsp;</p>
</body>
</html>

<?php
	
	require_once('auth.php');

	include('functions/general.php');
	
	include('functions/connect_db.php');
	
	
	
	
	
	
	
	
 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Update</title>
<link href="css/update.css" rel="stylesheet" type="text/css" />

</head>
 

<body>


<p id="display"></p>


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
<p style="text-align:right"><a style="font-size:16px; color:#39F" href="<?php echo 'full-list.php'.'?done='.$_GET['object']?>">Done!</a></p>
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
 <div id="div_body">

<?php	   
   }//end if $_GET
?>


  </div>
    
  
<div id="update_form">
   <p class="float_breaker">&nbsp;</p>
 
 
 
 
  <div class="div_update_input">
         <hr/>
    
  <form id="form1" name="form1" method="post" action="">
        <input name="to_do_id" type = "hidden" value= "<?php echo $_GET['object'] ?>"/>
          <table width="200" border="0">
           <tr>
           <td>Tagged:</td>
           <td><p id="display_tagged"> .</p> </td>
           </tr>
            <tr>
              <td>Update:</td>
              <td><label for="textarea2"></label>
              <textarea name="details" id="details" cols="45" rows="5"></textarea></td>
            </tr>
            <tr>
              <td>     </td>
              <td><input type="submit" name="updates" id="updates" value="Update" /></td>
            </tr>
          </table>
        </form>
    
</div>
<div id ="div_update_tags" class="div_update_tags">
	<ul>
    	
        
    </ul>
</div>
<input type="textbox" id="text1"/>
</div>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
  
<script type="text/javascript" src="js/update.js"></script>
<div id="displaydata">display</div>
  <div id="div_status_change">
     <p>s</p>
    </div>
</body>
</html>

<?php
include('../connect_db.php');

//save username from post, and take care of sql injection
$username= mysql_real_escape_string($_POST['username']);


// % is exactly like * when u search in windows search
$query="SELECT member_id, login FROM developers WHERE login LIKE '$username%'";

//run query, print if errors
if(!$results=mysql_query($query,$db_link))
{
	echo mysql_error();
	exit();
}
//array to save usernames in
$user_list = array();
$counter=0;

while(($row=mysql_fetch_assoc($results))!==false)
{
			//$user_list[$counter] = array('id' => $row['member_id'], 'username' => $row['login']);
		//	$counter++;
		?>
		<li id="li<?= $counter?>" onclick="add_to_dev_array('li<?= $counter?>',<?= $row['member_id']?>,'<?= $row['login']?>')"><?= $row['login']?></li>
			<?php
			$counter++;
}//end of while
//echo json_encode($user_list);



//$results =mysql_query($query,$db_link);

?>

<li style="background-color:#FFDBDC" id="li_cancel" onclick="add_to_dev_array('li_cancel',0,'')">Cancel</li>



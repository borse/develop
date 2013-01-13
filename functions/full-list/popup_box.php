<?php

	session_start();
	include ('../db.php');
	include('../general.php');
	$id= $_POST['id'];
	$action= $_POST['action'];

	 switch($action) {	//decide what to do
	
	case "open_page":
		//print all the to_do in this page
	 	 $rows=tasks_in_page($id); //function found in db.php
		  print_all_tasks($rows);//function found at the button of page
		 
	break;
	
	case "add_page":
	
	 unset($_SESSION['cart'][$product_id]); //if the quantity is zero, remove it completely (using the 'unset' function) - otherwise is will show zero, then -1, -2 etc when the user keeps removing items.
	break;
	
	case "add_task":
	unset($_SESSION['cart']); //unset the whole cart, i.e. empty the cart.
	break;
	
	}


//functions:
function print_all_tasks($rows)
{
	echo '<ul>';
	foreach($rows as $row)
	{
		?>
			<li><a href="http://borse.myftp.org/develop/update.php?object=<?=$row['to_do_id']?>"><?=$row['title']?></a></li>                
		<?php
	}//end of foreach
	
	echo '</ul>';
}//end of function print_all_tasks


?>
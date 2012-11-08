<?php
//connect to database
	$db_link = mysql_connect("localhost", "1116075_db", "SIlver");
 
	if (!$db_link){
	
	echo"datbabase connection failed";
	exit;
	
		}
		
	
	
	if(!mysql_select_db("db_develop"))
	{
		echo " error selecting db";
		exit;
	}

	//end of connection===
	?>
	
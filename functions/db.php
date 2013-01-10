<?php
//creats conncetion to db_develop, returns $db_link 
function get_conn_and_connect()
{
    $db_link = mysql_connect("localhost","1116075_db","SIlver");
    if (!$db_link)
      {
      	echo("cant connect to borse.com!");
      }

    if (!mysql_select_db("db_develop", $db_link))
      {
      	echo("cant connect to db_dev");
      }

    return $db_link;
} //END OF ==> get_con_and_connect()

//close connection $db_link;
function close_conn($db_link) 
{
    mysql_close($db_link);
}//END OF ==>close_conn()


//excutes a query using included parameters, returns a SINGLE $row
function get ($table, $fields, $values)
{
    if(sizeof($fields) != sizeof($values))
    {
	echo"error in add field and value mismatch.";
	return 0;
    }
    $query = "";
    for ($i=0; $i<sizeof($fields); $i++)
    {
	$query.= ("$fields[$i]='$values[$i]' AND ");
    }
    $query = "SELECT * FROM $table WHERE ".substr($query,0,-5);
    $db_link = get_conn_and_connect();
    
	if(!$results = mysql_query($query, $db_link))
	{
		echo $query,'<br/>';
		echo "error in query"	,mysql_error();
		exit;
	}
    
    if (!$row = mysql_fetch_assoc($results) ) 
    {
	//echo"hey";
        close_conn($db_link);
        return false;
    }
    close_conn($db_link);
    return $row;
}//  END OF == > get()



//excutes a query ,selects all fields, returns an ARRAY of $row
function get_all_table($table)
{
    if(sizeof($fields) != sizeof($values))
    {
	echo"error in add field and value mismatch.";
	return 0;
    }
 
    
    $query = "SELECT * FROM $table  ";
    $db_link = get_conn_and_connect();
    $results = mysql_query($query, $db_link);
    $rows = array();
    $i = 0;

    while ($row = mysql_fetch_assoc($results))
    {
		$rows[$i] = $row;
		$i++;
    }
    if (sizeof($rows) == 0) 
    {
        close_conn($db_link);
        return false;
    }
    close_conn($db_link);
    return $rows;
}//END OF==> getall_table()


//excutes a query using included parameters, returns an ARRAY of $row
function get_multi($table, $fields, $values)
{
    if(sizeof($fields) != sizeof($values))
    {
	echo"error in add field and value mismatch.";
	return 0;
    }
    $query = "";
    for ($i=0; $i<sizeof($fields); $i++)
    {
	$query.= ("$fields[$i]='$values[$i]' AND ");
    }
    $query = "SELECT * FROM $table WHERE ".substr($query,0,-5);
    $db_link = get_conn_and_connect();
    $results = mysql_query($query, $db_link);
    $rows = array();
    $i = 0;

    while ($row = mysql_fetch_assoc($results))
    {
		$rows[$i] = $row;
		$i++;
    }
    if (sizeof($rows) == 0) 
    {
        close_conn($db_link);
        return false;
    }
    close_conn($db_link);
    return $rows;
}//END OF==> get_multi()

////excutes a query ,update included fields using included values,  returns TRUE/FALSE
function update($table, $setfields, $setvalues, $wherefields, $wherevalues)
{
    if(sizeof($setfields) != sizeof($setvalues) and sizeof($wherefields) != sizeof($wherevalues) )
    {
	echo"error in add field and value mismatch.";
	return 0;
    }
    $query = "";
    for ($i=0; $i<sizeof($setfields); $i++)
    {
	$query.= ("$setfields[$i]='$setvalues[$i]',");
    }

    $query2 = "";
    for ($i=0; $i<sizeof($wherefields); $i++)
    {
	$query2.= ("$wherefields[$i] = '$wherevalues[$i]' AND ,");
    }

    $query = "UPDATE $table SET ".substr($query,0,-1)." WHERE ".substr($query2,0,-5);
    $db_link = get_conn_and_connect();
    $results = mysql_query($query, $db_link);
    if ($results == false) 
    {
        close_conn($db_link);
        return false;
    }
    close_conn($db_link);
    return true;
}//END OF==> update()


//exeutes a query, Insert a new field, using included parameters, returns  MYSQL_INSERT_ID()/FALSE
function add($table, $fields, $values)
{
    if(sizeof($fields) != sizeof($values))
    {
	echo"error in add field and value mismatch.";
	return 0;
    }
    $db_link = get_conn_and_connect();
    $query="";
    $query2="";
    for ($i=0; $i<sizeof($fields); $i++)
    {
		// .= is an increament?
	$query.="$fields[$i],";
	$query2.="'$values[$i]',";
    }
    $query = "INSERT INTO $table(".substr($query,0,-1).")VALUES(".substr($query2,0,-1).")";
 
    $results = mysql_query($query,$db_link);
    if ($results) 
    {
        $curr_id = mysql_insert_id();
        close_conn($db_link);
      	return $curr_id;
    }

    close_conn($db_link);
    return false;
}//END OF ==> add()

///=================================== END OF WRAPPERS :) =================///

function get_user_id($username)
{
    $fields = array("login");
    $values = array($username);
    $row = get("developers", $fields, $values);
    if($row)
    {
        return $row['member_id'];
    }
    return false;
} //end of function get_user_id($username) =====

//opens tags table, lists all tags created by the supplied Member_ID
function get_created_tags($developer_id)
{
	
    $fields = array("creator_dev_id");
    $values = array($developer_id);
    $rows = get_multi("tags", $fields, $values);
    if($rows)
    {
		//return alot of results, this is an array
        return $rows;
    }
    return false;
}//end of  function get_created_tags($developer_id)=========

function get_appointed_dev_name($developer_id)
{
	 $fields = array("member_id");
    $values = array($developer_id);
    $row = get("developers", $fields, $values);
    if($row)
    {
        return $row['login'];
    }
	else
	{
	echo  mysql_error();
	exit	;
	}
    return false;
	
}

function get_page_name($to_do_id)
{
	$fields = array("to_do_id");
    $values = array($to_do_id);
    $row = get("to_do", $fields, $values);
    if($row)
    {
		//start new query,  get name of the page from pages table
     
		$fields = array("page_id");
    	$values = array($row['page_id']);
		unset ($row);
   	 	$row = get("pages", $fields, $values);
		
		//return the name of page
		return $row['name'];
		
		
    }
	else
	{
	echo  mysql_error();
	exit	;
	}
    return false;
}//end of function get_page_name($to_do_id)

function get_task_name($to_do_id)
{
	$fields = array("to_do_id");
    $values = array($to_do_id);
    $row = get("to_do", $fields, $values);
	  if($row)
    {
        return $row['title'];
    }
	else
	{
	echo  mysql_error();
	exit	;
	}
    return false;
	
}//end of function get_task_name($to_do_id)

function get_appointed_tags($developer_id)
{
	
    $fields = array("appointed_dev_id");
    $values = array($developer_id);
    $row = get_multi("tags", $fields, $values);
    if($row)
    {
		//return alot of results, this is an array
        return $row;
    }
    return false;
}//end of function get_appointed_tags($deveolper_id)

function 	mark_tag_read($tag_id)
{
	 $setfields = array("isRead");
    $setvalues = array("1");
    $wherefields = array("tag_ID");
    $wherevalues = array($tag_id);
    $row = update("tags", $setfields, $setvalues, $wherefields, $wherevalues);
    if ($row != false)
    {
        return true;
    }
    return false;
}//end of function 	mark_tag_read($to_do_id)

function get_to_do_id_from_tags($tag_id)
{
	$fields = array("tag_id");
    $values = array($tag_id);
    $row = get("tags", $fields, $values);
	  if($row)
    {
        return $row['to_do_id'];
    }
	else
	{
	echo  mysql_error();
	exit	;
	}
    return false;
}//end of function get_to_do_id_from_tags($tag_id)
	
//get path from table folders
function 	get_folder_path($folder_id)
{
	 $fields = array("folder_id");
    $values = array($folder_id);
    $row = get("folders", $fields, $values);
    if($row)
    {
        return $row['path'];
    }
	else
	{
	echo  mysql_error();
	exit	;
	}
    return false;
}//end of function 	get_folder_path($folder_id)



function get_folder_id_using_path_and_folder_name($folder,$path)
{
	   $fields = array("name", "path");
    $values = array($folder, $path);
    $row = get("folders", $fields, $values);
	
    if ($row == false) return false;
    return $row['folder_id'];
	
}//end of function get_folder_id_using_path_and_folder_name($folder,$path);

function add_parent_ids_to_path_array($path_array)
{
	
	$current_id=$path_array[0];
	$i=0;
	//endless loop
	while($i==0)
	{
			//while parent ID is not 0
		 if(($current_id=get_parent_id($current_id))!=0)
		 {
			 array_push($path_array, $current_id);
			 
			 
		 }
		 else
		{
			 break;
		 }
		
	}//end of endless while loop
	
	return $path_array;
}//end of function add_parent_ids_to_path_array($path_array);

function get_parent_id($folder_id)
{
	 $fields = array("folder_id");
    $values = array($folder_id);
    $row = get("folders", $fields, $values);
    if($row)
    {
        return $row['parent_id'];
    }
    return false;
	
}//get_parent_id


function get_all_folders_where_parent_id($folder_id)
{
	$fields = array("parent_id");
    $values = array($folder_id);
    $rows = get_multi("folders", $fields, $values);
    if($rows)
    {
		//return alot of results, this is an array
        return $rows;
    }
    return false;
}//end 			get_all_rows_where_parent_id($folder_id)

?>

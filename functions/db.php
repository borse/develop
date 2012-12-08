<?php
//creats conncetion to db_develop, returns $con 
function get_conn_and_connect()
{
    $con = mysql_connect("localhost","1116075_db","SIlver");
    if (!$con)
      {
      	echo("cant connect to borse.com!");
      }

    if (!mysql_select_db("db_develop", $con))
      {
      	echo("cant connect to db_dev");
      }

    return $con;
} //END OF ==> get_con_and_connect()

//close connection $con;
function close_conn($con) 
{
    mysql_close($con);
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
    $con = get_conn_and_connect();
    
	if(!$results = mysql_query($query, $con))
	{
		echo $query,'<br/>';
		echo "error in query"	,mysql_error();
		exit;
	}
    
    if (!$row = mysql_fetch_assoc($results) ) 
    {
	//echo"hey";
        close_conn($con);
        return false;
    }
    close_conn($con);
    return $row;
}//  END OF == > get()


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
    $con = get_conn_and_connect();
    $results = mysql_query($query, $con);
    $rows = array();
    $i = 0;

    while ($row = mysql_fetch_assoc($results))
    {
		$rows[$i] = $row;
		$i++;
    }
    if (sizeof($rows) == 0) 
    {
        close_conn($con);
        return false;
    }
    close_conn($con);
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
    $con = get_conn_and_connect();
    $results = mysql_query($query, $con);
    if ($results == false) 
    {
        close_conn($con);
        return false;
    }
    close_conn($con);
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
    $con = get_conn_and_connect();
    $query="";
    $query2="";
    for ($i=0; $i<sizeof($fields); $i++)
    {
		// .= is an increament?
	$query.="$fields[$i],";
	$query2.="'$values[$i]',";
    }
    $query = "INSERT INTO $table(".substr($query,0,-1).")VALUES(".substr($query2,0,-1).")";
 
    $results = mysql_query($query,$con);
    if ($results) 
    {
        $curr_id = mysql_insert_id();
        close_conn($con);
      	return $curr_id;
    }

    close_conn($con);
    return false;
}//END OF ==> add()

///=================================== END OF WRAPPERS :) =================///

function get_user_id($username)
{
    $fields = array("login");
    $values = array($username);
    $id = get("developers", $fields, $values);
    if($id)
    {
        return $id['member_id'];
    }
    return false;
}



?>

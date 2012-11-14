<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Login Form</title>
<link href="css/loginmodule.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
//array for validation of the texts boxes
	var x=[0,0,1,0];
	function check_login(id_of_textbox3)
	{
		var username=document.getElementById(id_of_textbox3);
		var error=true;
		
		//TO-DO-------------- make it like firstname but add  underscore and numbers--------------------------------------------TO-DO--------
     	//if (username.charCodeAt(i) > 122 || username.charCodeAt(i) < 65)
		// {
		//		error = false;
		
			
		// }
	}
//function to enable registration button in case all validations is correct
	function enable_bottun(){
	var disabled=false;
	for(var i=0;i<4;i++){
	if(i==2)
	continue;
	if(x[i]==0)
	disabled=true;
	}
	
	document.getElementById("registration").disabled =disabled;
	}
	
	function check_password(id_of_textbox1,id_of_textbox2){
	
	var flag=1;
	if(document.getElementById(id_of_textbox1).value.length<6)
	flag=0;
	else{
		if(document.getElementById(id_of_textbox1).value.length!=document.getElementById(id_of_textbox2).value.length)
			flag=0;
			else
			{
			
				for(var i in document.getElementById(id_of_textbox1).value.length){
				
					if(document.getElementById(id_of_textbox1).value[i]!=document.getElementById(id_of_textbox2).value[i]){
						flag=0;
						
						}
						}
			}
	
	}
	x[3]=flag;
	enable_bottun();
	}
	function check_name(id_of_textbox) {
		//my variables
		
		var name = document.getElementById(id_of_textbox).value;
		var flag = true;
		var is_fname=true;
		var image1_url;
		var image2_url;
		var index=0;
		if(id_of_textbox=="lname")
		is_fname=false;
		
		if(is_fname){
		image1_url="img_c1";
		image2_url="img_r1";
		}
		else
		{
		image1_url="img_c2";
		image2_url="img_r2";
		index=1;
		}
		
		if (name.length == 0)
			flag = false;

		for (i in name) {

			if (name.charCodeAt(i) > 122 || name.charCodeAt(i) < 65) {
				flag = false;
				

			}//end of if
			if(name.charCodeAt(i) >=91 && name.charCodeAt(i) <=96)
				flag=false;

		}//end of for

		if (flag) {
			document.getElementById(image1_url).style.display = "inline";
			x[index]=1;
			document.getElementById(image2_url).style.display = "none";
		}//end if
		else {

			document.getElementById(image1_url).style.display = "none";
			x[index]=0;
			document.getElementById(image2_url).style.display = "inline";
		}//end else
	
	enable_bottun();
	}//end of function
</script>
</head>
<body>
	<?php
	if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
		echo '<ul class="err">';
		foreach($_SESSION['ERRMSG_ARR'] as $msg) {
			echo '<li>',$msg,'</li>'; 
		}
		echo '</ul>';
		unset($_SESSION['ERRMSG_ARR']);
	}
?>
	<!--register-exec.php-->


	<form id="loginForm" name="loginForm" method="post"
		action="register-exec.php">
		<table width="300" border="0" align="center" cellpadding="2"
			cellspacing="0">
			<tr>
				<th>First Name</th>
				<td><input name="fname" type="text" class="textfield" onblur="check_name('fname')" id="fname" />
				</td>
				<td><img id="img_c1" src="images/register-form/register-form-icons/correct.PNG" style="display: none" /></td>
				<td><img id="img_r1" src="images/register-form/register-form-icons/wrong.PNG" style="display: none" /></td>
			</tr>
			<tr>
				<th>Last Name</th>
				<td><input name="lname" type="text" class="textfield" onblur="check_name('lname')" id="lname" />
				</td>
				<td><img id="img_c2" src="images/register-form/register-form-icons/correct.PNG" style="display: none" /></td>
				<td><img id="img_r2" src="images/register-form/register-form-icons/wrong.PNG" style="display: none" /></td>
			
			</tr>
			<tr>
				<th width="124">Login</th>
				<td width="168"><input name="login" type="text" onblur="check_login('login')" "class="textfield" id="login" />
				</td>
				<td><img id="img_c3" src="images/register-form/register-form-icons/correct.PNG" style="display: none" /></td>
				<td><img id="img_r3" src="images/register-form/register-form-icons/wrong.PNG" style="display: none" /></td>
			
			</tr>
			<tr>
				<th>Password</th>
				<td><input name="password" type="password" class="textfield" onblur="check_password('password','cpassword')" id="password" />
				</td>
				<td><img id="img_c4" src="images/register-form/register-form-icons/correct.PNG" style="display: none" /></td>
				<td><img id="img_r4" src="images/register-form/register-form-icons/wrong.PNG" style="display: none" /></td>
			
			</tr>
			<tr>
				<th>Confirm Password</th>
				<td><input name="cpassword" type="password" class="textfield" onblur="check_password('password','cpassword')" id="cpassword" />
				</td>
				<td><img id="img_c5" src="images/register-form/register-form-icons/correct.PNG" style="display: none" /></td>
				<td><img id="img_r5" src="images/register-form/register-form-icons/wrong.PNG" style="display: none" /></td>
			
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><input type="submit" name="Submit" value="Register" id="registration" disabled="true"/>
				</td>
			</tr>
		</table>

	</form>
</body>
</html>

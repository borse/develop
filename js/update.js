// JavaScript Document
 
var counter=0;

hide_element("#div_update_tags",1);

$('#div_update_tags').live('keypress', function(e) {
	$('#details').text(e.keyCode);
});
$(function() {
	$('#details').keypress(function(e) {
		//e.preventDefault();
		$('#display').text(e.keyCode === 0 ? e.which : e.keyCode);
		//if the pressed key = @
		if(e.which==64)
		{
			//show_element('#div_update_tags',5000);
			
			 show_element("#div_update_tags",350);
			 //========================
			 //save data from login text field	
				var username = $('#text1').val();
				
				   
				//send "username" to php script, recive answer(data) as 0 or 1
				$.post('functions/update/fetch_usernames.php',{username:username},function(data){
					//start of function
					
					//after reciving answer
					
					//$('#displaydata').html(data);
					//var newObj = data;
					$('#div_update_tags').html(data);	
			
						
						
							
				   }//end of function
				);//end of $.post
				
			 //========================
			
		}
	});
});


function hide_element(element,speed)
  {
	  $(element).hide(speed);
  }//end of function_hide element
  
function show_element(element,speed)
  {
	  $(element).show(speed);
  }//end of function_show element
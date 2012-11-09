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
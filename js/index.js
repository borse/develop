// JavaScript Document

load_created_tasks();
 //Variables: =============================================== --- VARIABLES--- =======================================



//Events: ===================================================== --- EVENTS--- =======================================




//functions: =============================================== --- FUNCTIONS--- =======================================
function load_created_tasks()
{
	 
	 
	 		//url for ajax function,, 
			url =  "functions/index/load_created_tasks.php";
			 /* Send the data using post and put the results in a div */
	   
		  $.post( url, {  },
				function( data ) {
			 // var content = $( data ).find( '#content' );
			  //$( "#result" ).empty().append( content );
			   
			  $('#div_tasks_table').html(data);
			  
				}//end of function
			);//end of post	
}//end of load_created_tasks
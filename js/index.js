// JavaScript Document
 


load_unread_notifications();
  
    // Call horizontalNav on the navigations wrapping element
    $('.full-width').horizontalNav({});
 
//populate_recent_notification_table();
 //Variables: =============================================== --- VARIABLES--- =======================================



//Events: ===================================================== --- EVENTS--- =======================================
window.setInterval(function(){
  /// call your function here
 // $('#div_print_table').html("");
//populate_recent_notification_table();
  load_unread_notifications();
}, 5000);

function notification_clicked(tag_id)
{
	
		
			//mark notification as read, then forward to the update page
		//url for ajax function,, 
			url =  "functions/index/mark_notification_read.php";
			 /* Send the data using post and put the results in a div */
	   		var to_do_id = 60;
		  $.getJSON( url, {tag_id:tag_id},
				function( data ) {
			 // var content = $( data ).find( '#content' );
			  //$( "#result" ).empty().append( content );
			   
			  	 //  $('#div_notification_table').html(data);
				 
				to_do_id=data.to_do_id;
				
				// similar behavior as clicking on a link
				window.location.href = "update.php?object=" + to_do_id;
				 //alert(gay);
			   
			  
				}//end of function
			);//end of post	
	
	
}//end of function notification_clicked(to_do_id)

//functions: =============================================== --- FUNCTIONS--- =======================================

function load_created_tasks()
{
	 
	 
	 		//url for ajax function,, 
			url =  "functions/index/load_created_tasks.php";
			 /* Send the data using post and put the results in a div */
	   		$('#p_nav_clicked').html("you have created the following tasks:");
		  $.post( url, {  },
				function( data ) {
			 // var content = $( data ).find( '#content' );
			  //$( "#result" ).empty().append( content );
			   
			  $('#div_print_table').html(data);
			   
			  
				}//end of function
			);//end of post	
}//end of load_created_tasks



function load_created_tags(counter)
{
	 
	 
	 		//url for ajax function,, 
			url =  "functions/index/load_created_tags.php";
			 /* Send the data using post and put the results in a div */
	   //show element after it has been loaded
			
			$('#p_nav_clicked').html("you have tagged these people:");
			//populate the table
		  $.post( url, {counter:counter },
				function( data ) {
			 // var content = $( data ).find( '#content' );
			  //$( "#result" ).empty().append( content );
			   
			  $('#div_print_table').html(data);
			  
				}//end of function
			);//end of post	
		 
			
			
}//end of load_created_tasks

function populate_recent_notification_table()
{
	
	//load 10 notification, save to data.. this function retrusn ajax data
	  //url for ajax function,, 
			url =  "functions/index/load_notifications.php";
			 /* Send the data using post and put the results in a div */
	   //show element after it has been loaded
		var counter= 10;
			
			//populate the table
		return  $.post( url, {counter:counter},
				function( data ) {
			 // var content = $( data ).find( '#content' );
			  //$( "#result" ).empty().append( content );
			   
			    
			  
			   $('#div_notification_table').html(data);
			  
				}//end of function
			
			);//end of post	
 
	
 
	  
//   $('#div_notification_table').html(data);	
	
}
function load_notifications(counter)
{
	//url for ajax function,, 
			url =  "functions/index/load_notifications.php";
			 /* Send the data using post and put the results in a div */
	   //show element after it has been loaded
			$('#p_nav_clicked').html("These people tagged you in the following posts:");
			
			//populate the table
		return  $.post( url, {counter:counter},
				function( data ) {
			 // var content = $( data ).find( '#content' );
			  //$( "#result" ).empty().append( content );
			   
			   $('#div_print_table').html(data);
			    
			  
			 
			  
				}//end of function
			
			);//end of post	
		 
}//end of function load_notifications()


function load_unread_notifications()
{
	//url for ajax function,, 
			url =  "functions/index/load_unread_notifications.php";
			 /* Send the data using post and put the results in a div */
	   //show element after it has been loaded
			
			
			//populate the table
		  $.post( url, {  },
				function( data ) {
			 // var content = $( data ).find( '#content' );
			  //$( "#result" ).empty().append( content );
			   
			   $('#div_unread_notifications_table').html(data);
			  
				}//end of function
			);//end of post	
}//end of function load_notifications()

function clear_div_print_table()
{  
$('#div_print_table').html("");
$('#p_nav_clicked').html("Select an Option from above");
 
} //end of function clear_dive_print_table()
// JavaScript Document
 
 //Variables: =============================================== --- VARIABLES--- =======================================
var mLeft ;
var  mTop ;
var counter=0;
var appointed_devs_id=[];
var appointed_devs_names=[];
var details_text="";
var $form = $( '#form1' ),

 //this is a hidden input	
to_do_id = $form.find( 'input[name="to_do_id"]' ).val();

load_updates();
hide_element("div_update_tags",1);
 



//Events: =============================================== --- EVENTS--- =======================================
 $(document).mousemove(function(e){

	  mLeft=e.pageX;
    mTop=	  e.pageY
   }); 

 $("#form1").submit(function(event) {
	
	// alert('FUCK OFF!, IM NOT YOUR SLAVE!');
	 //prevent devault action of button
	 event.preventDefault();
	 
	   var $form = $( this ),
		//var details = details textarea
        details = $form.find( 'textarea[name="details"]' ).val(),
		//this is a hidden input	
		to_do_id = $form.find( 'input[name="to_do_id"]' ).val(),
		//ussrl for ajax function,, 
        url =  "functions/update/insert_update.php";
    	 /* Send the data using post and put the results in a div */
   
	  $.post( url, { appointed_devs_id:appointed_devs_id,details: details,to_do_id: to_do_id},
	        function( data ) {
         // var content = $( data ).find( '#content' );
          //$( "#result" ).empty().append( content );
		   
		  $('#displaydata').html(data);
		  
      		}//end of function
    	);//end of post
	 
	 //refresh list of updates

	 load_updates();
	 //reset all values


  $('#details').val("");
 
 $('#display_tagged').html(" ");
 
 //delete all elements of array
  var aLen = ( appointed_devs_id.length - 1 ); 
   for ( var x = aLen; appointed_devs_id[ x ]; x-- ) { // Removing all 500 items from the bigArray.
      appointed_devs_id.pop( x ); 
	  appointed_devs_names.pop( x ); 
	  
   }//end for
 
	
	});//end of form submit


//draw the status bullets


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
			
			 show_element("div_update_tags",350);
			
			 //backuo deatials_text doesnot contain '@' char			
			 
			 
			 	
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
			
		}//end of if
		//backup text 
		  
		 details_text=$('#details').val();
	});
});

//functions: =============================================== --- FUNCTIONS--- =======================================

function enable_statuz(){
	
	//show the div)_status_change, and move it to the mouse cursor:
 	show_element('div_status_change',1);
	
	
	move_element('div_status_change');
	  
			 
	
	 
	
	
} //end of function enable status

//change the current status of to_do_update
function change_status(element_id, value)
{
	hide_element(element_id);
}//end of function change)status
function add_to_dev_array(element,dev_id,dev_name)
{
	
	//if cancel was pressed
	
	//if cancel not pressed
	if(element != "li_cancel")
	{
		//add appointed dev id to array
		appointed_devs_id.push(dev_id);
	
		//add appointed dev name to array, for display
		  appointed_devs_names.push(dev_name);
	}
	 
	var x=document.getElementById("display_tagged");
	x.innerHTML=appointed_devs_names;
		$('#details').val(details_text);	
	//hide clicked username li
	hide_element(element,600);
	//hide all usernames div

	
	$('#div_update_tags').fadeOut(1200, function() {
		
		hide_element("div_update_tags",1050);
		
	
    
  });//end of fadeout

	
	
}//end of function add to_dev_array






function load_updates(){
	

			//ussrl for ajax function,, 
			url =  "functions/update/load_updates.php";
			 /* Send the data using post and put the results in a div */
	   
		  $.post( url, {  to_do_id: to_do_id},
				function( data2) {
			 // var content = $( data ).find( '#content' );
			  //$( "#result" ).empty().append( content );
			   
			  $('#div_body').html(data2);
			  
				}//end of function
			);//end of post	
	
}//end of function load_updates
function hide_element(element,speed)
  {
	  $('#'+element).hide(speed);
  }//end of function_hide element
  
function show_element(element,speed)
  {
	  $('#'+element).show(speed);
  }//end of function_show element
  
  //move any element to the clicked position
  function move_element(element_id) 
 {
	 //get the element
	 
	 var element=document.getElementById(element_id);
	 element.style.position="absolute";
	 element.style.left=mLeft+"px";
	 element.style.top=mTop+"px";
	 
	 //$("#div_status_change").animate({ 
     //   Left: "+=" +mouseLeft + "px",
    //}, 1000 );
	 
	 
	 
		
    //$('element').style.position = "absolute";
	//$('element').style.top += mouseTop  	;
	//$('element').style.left += mouseLeft   ;
 
}



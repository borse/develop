<?php

	session_start();
	include ('../db.php');
	include('../general.php');
	$folder_id= $_POST['folder_id'];
	
	//draw path as text--del later
	$path=get_folder_path($folder_id);
	
	echo $path,'<br />';

	//add selected folder to the path array
	$path_array=array($folder_id);
 	
	//add all parent folders to the  path array
	$path_array=add_parent_ids_to_path_array($path_array);
 	
	//reverse the path order.. to be  grandparent/parent/folder .. instead of folder/parent/grandparent
 	$path_array=array_reverse($path_array);
	
	

	echo'<br />';
	print_r($path_array);

	
	
	//this folder seperates folders names within the path, whenever '/' is found ... returns ARRAY of foldernames
	  $folder_names = explode("/", $path);
	  
 
?>

 <div id="svgbasics">
        </div>
         
        <div id="pnlAllIn" style="z-index: 10;">
            <div>
                <table cellspacing="5" cellpadding="40" style="width: 100%; text-align: center;">
                    <tbody>
                        <tr>

									<?php 
                                     
                                     
                                         
                                          foreach($path_array  as $folder_id)
                                          {
                                             
                                                //get  all rows  where parent_id = $folder_id
                                                $rows=get_all_rows_where_parent_id($folder_id);
                                                ?>
                                                 <td style="width: 50%; vertical-align: top;">
                                                <?php
                                                //nested loop
                                                foreach($rows as $row)
                                                {
													 
                                                    ?>
                                                		
                                                           <div style="border: 2px solid gray; padding: 10px; width: 320px; margin-bottom: 10px;
                                                           
                                                           <?php
														   //make coloired
														   if($row['folder_id']==$folder_id)
														   {
															echo 'background-color:#FFD3B7;'   ;
														   }
														   
														   ?>
                                                           
                                                           "
                                                                class="ui-corner-all draggable ui-draggable" id="wrapper">
                                                                <table cellspacing="0" cellpadding="0" style="width: 100%;">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td style="width: 50px; text-align: center;" rowspan="2">
                                                                                <img alt="" src="icons/user-48x48.png" />
                                                                            </td>
                                                                            <td style="font-size: 1.2em; font-weight: bold; text-align: left;">
                                                                                 <?=$row['name'] ?>
                                                                            </td>
                                                                            <td style="text-align: right; vertical-align: top; width: 16px;" rowspan="2">
                                                                                <span class="ui-icon-arrow-4 ui-icon"></span><span class="ui-icon-shuffle ui-icon">
                                                                                </span>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="font-size: 0.9em; text-align: left;">
                                                                                 insert page
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <input type="hidden" value="01" />
                                                            </div>    
                                                    <?php									
												}//end of foreach($rows as $row)
                                                    
                                                 
                                              //new field
											    ?>
                                                 </td>
                                                <?php
                                              
                                          }//  end  foreach($path_array  as $folder_id)
                                         
                                     ?>
          
                        </tr>
                    </tbody>
                </table>
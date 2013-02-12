<?php

	session_start();
	include ('../db.php');
	include('../general.php');
	$folder_id= $_POST['folder_id'];
	$site_id= $_POST['site_id'];
	
	//this is a dirty fix:
	 $site_id=get_folder_id_from_sites($site_id);
	 
	  


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

	  //draw tables.. root folder.. then loop of wtv is inside it 
	  draw_map($path_array,$site_id);

	  //connect all folders withen the path
	 // draw_lines($path_array,$site_id);


	  function draw_map($path_array,$site_id)
	  {
 
			?>

            
                                <table cellspacing="5" cellpadding="40" style="width: 40%; text-align: center;">
                                    <tbody>
                                        <tr>
                
                							<?php 
                                      

											   //get root folder row
											   $fields = array("folder_id");
											   $values = array($site_id);
											   $row = get("folders", $fields, $values);

										 		//draw the site root folder:  
											   ?>
                                       <td style="width: 50%; vertical-align: top;">
                                                          
                                                                 
                                                           <div 
                                                           style="border: 2px solid gray; padding: 10px; width: 200px; margin-bottom: 10px;
                                                                     background-color:#FFD3B7;"  
                                                            class="ui-corner-all draggable ui-draggable" id="folder_<?=$site_id?>"
                                                            onclick="draw_map(<?=$site_id?>)"  >
                                                                <table cellspacing="0" cellpadding="0" style="width: 100%;">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td style="width: 50px; text-align: center;" rowspan="2">
                                                                                <img alt="" src="icons/user-48x48.png" />
                                                                            </td>
                                                                            <td style="font-size: 1.2em; font-weight: bold; text-align: left;">
                                                                                 <?=$row['folder_id']?>=><?=$row['name'] ?> 
                                                                            </td>
                                                                            <td style="text-align: right; vertical-align: top; width: 16px;" rowspan="2">
                                                                                
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="font-size: 0.9em; text-align: left;">
                                                                                 <a onclick="loadPopupBox('add_page',<?= $row['folder_id']?>,<?=$site_id?> )">insert page</a>
                                                                            </td>
                                                                              <td style="font-size: 0.9em; text-align: left;">
                                                                                 <a onclick="loadPopupBox('add_folder',<?= $row['folder_id']?>,<?=$site_id?>)">insert folder</a>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <input type="hidden" value="<?=$row['folder_id']?>" />
                                                            </div>    
                                                           
                                                          </td>
                
                                                    <?php 
                                                     //draw rest of folders
                                                     
                                                         
                                                          foreach($path_array  as $folder_id)
                                                          {
                                                             
                                                                //get  all rows  where parent_id = $folder_id
                                                                if(get_all_folders_where_parent_id($folder_id))
																{
																	    $rows=get_all_folders_where_parent_id($folder_id);

                                                                ?>
                                                                 <td style="width: 50%; vertical-align: top;">
                                                                <?php
                                                                //nested loop
                                                                foreach($rows as $row)
                                                                {
                                                                     
                                                                    ?>
                                                                        
                                                                           <div style="border: 2px solid gray; padding: 10px; width: 200px; margin-bottom: 10px;
                                                                           
                                                                           <?php
                                                                           //make coloired
                                                                           foreach($path_array as $folder)
                                                                           {
                                                                               if($row['folder_id']==$folder)
                                                                               {
                                                                                echo 'background-color:#FFD3B7;'   ;
                                                                               }//end if 
                                                                           }//end foreach
                                                                           ?>
                                                                           
                                                                           "
                                                                                class="ui-corner-all draggable ui-draggable" id="folder_<?=$row['folder_id']?>" onclick="draw_map(<?=$row['folder_id']?>)">
                                                                                <table cellspacing="0" cellpadding="0" style="width: 100%;">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td style="width: 50px; text-align: center;" rowspan="2">
                                                                                                <img alt="" src="icons/user-48x48.png" />
                                                                                            </td>
                                                                                            <td style="font-size: 1.2em; font-weight: bold; text-align: left;">
                                                                                                 <?=$row['folder_id']?>=><?=$row['name'] ?> 
                                                                                            </td>
                                                                                            <td style="text-align: right; vertical-align: top; width: 16px;" rowspan="2">
                                                                                                
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td style="font-size: 0.9em; text-align: left;">
                                                                                                 <a onclick="loadPopupBox('add_page',<?= $row['folder_id']?>,<?=$site_id?>  )">insert page</a>
                                                                                            </td>
                                                                                            <td style="font-size: 0.9em; text-align: left;">
                                                                                                         <a onclick="loadPopupBox('add_folder',<?= $row['folder_id']?>,<?=$site_id?>)">insert folder</a>
                                                                                                    </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                                <input type="hidden" value="<?=$row['folder_id']?>" />
                                                                            </div>    
                                                                    <?php									
                                                                }//end of foreach($rows as $row)
                                                                    
																	//after folders , display pages
																	?>
                                                                    	<div 
                                                                                   
                                                                                    class="div_pages" id="pages_ <?='folder_id'?>"
                                                                                       >
                                                                                        <table cellspacing="0" cellpadding="0" style="width: 100%;">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td style="width: 50px; text-align: center;" rowspan="2">
                                                                                                        <img alt="" src="icons/paper.png" />
                                                                                                    </td>
                                                                                                    <td style="font-size: 1.2em; font-weight: bold; text-align: left;">
                                                                                                         Pages inside <b style="color:#903"><?=get_folder_name($row['parent_id'])?> </b>
                                                                                                    </td>
                                                                                                    <td style="text-align: right; vertical-align: top; width: 16px;" rowspan="2">
                                                                                                        
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td style="font-size: 0.9em; text-align: left;">
                                                                                                         <a onclick="loadPopupBox('add_page',<?= $row['parent_id']?>,<?=$site_id?>  )">insert page</a>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr >
                                                                                                <td colspan="2" style="width=100%">
                                                                                                <div style="height:100%; width:">
                                                                                                      <br/>      
                                                                                                <div id="get pages">
                                                                                                </div>
																									 <ul>
                                                                                                <?php
																									//get all pages and save them in rows
																									if($rows=get_all_pages($folder_id))
																									{
																										
																										//print every page
																										foreach($rows as $row)
																										{
																											?>
																											<li><a onclick="loadPopupBox('open_page',<?= $row['page_id']?>,<?=$site_id?>  )"> <?= $row['name']?></a></li>
																											<?php																										
																										}//end of foreach
																									}else
																									{
																									echo "no page found"	;
																									}//end of else
																									
																								?>
                                                                                                </ul>
                                                                                                </div>                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                    <input type="hidden" value="<?=$row['folder_id']?>" />
                                                                                    </div>    
                                                                          
                                                                    <?php
                                                                 	}//end if
																	//if no folders are found, then display pages
																	else
																	{?>
                                                                    <td style="width: 50%; vertical-align: top;">
                                                                         
                                                                                
                                                                                 <div 
                                                                                   
                                                                                    class="div_pages" id="pages_ <?='folder_id'?>"
                                                                                       >
                                                                                        <table cellspacing="0" cellpadding="0" style="width: 100%;">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td style="width: 50px; text-align: center;" rowspan="2">
                                                                                                        <img alt="" src="icons/paper.png" />
                                                                                                    </td>
                                                                                                    <td style="font-size: 1.2em; font-weight: bold; text-align: left;">
                                                                                                         Pages inside <b style="color:#903"><?=get_folder_name($folder_id)?> </b>
                                                                                                    </td>
                                                                                                    <td style="text-align: right; vertical-align: top; width: 16px;" rowspan="2">
                                                                                                        
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td style="font-size: 0.9em; text-align: left;">
                                                                                                         <a onclick="loadPopupBox('add_page',<?=$folder_id?> )">insert page</a>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr >
                                                                                                <td colspan="2" style="width=100%">
                                                                                                <div style="height:100%; width:">
                                                                                                      <br/>      
                                                                                                <div id="get pages">
                                                                                                </div>
																									 <ul>
                                                                                                <?php
																									//get all pages and save them in rows
																									if($rows=get_all_pages($folder_id))
																									{
																										
																										//print every page
																										foreach($rows as $row)
																										{
																											?>
																												<li><a onclick="loadPopupBox('open_page',<?= $row['page_id']?>, <?=$site_id?> )"> <?= $row['name']?></a></li>
                                                                                                            
																											<?php																										
																										}//end of foreach
																									}else
																									{
																									echo "no page found"	;
																									}//end of else
																									
																								?>
                                                                                                </ul>
                                                                                                </div>                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                        <input type="hidden" value="<?=$row['folder_id']?>" />
                                                                                    </div>    
                                                                          
                                                                         </td>
																		<?php
																	}//end of else
                                                              //new field
                                                                ?>
                                                                 </td>
                                                                <?php
                                                              
                                                          }//  end  foreach($path_array  as $folder_id)
                                                         
                                                     ?>
                          
                                        </tr>
                                    </tbody>
                                </table>
				<?php
	  }//end of drawmap<br />





	  function draw_lines($path_array,$site_id)
	  {
		  $lines =array($sources=array());
		  foreach($path_array as $folder)
		  {
			  //usually the value in the first index of $path_array, is either 1 or 0..  stands for sites root folder, no line 
			if ($folder ==$site_id)
			{
				continue;
			}//end if	
				//for each colum, find the targets of the folder

		 		if(get_all_folders_where_parent_id($folder))
				{
					$targets=get_all_folders_where_parent_id($folder);
						foreach($targets as $target)
					{
						 //add line  folder=>target




						$lines[$folder]= array ($target['folder_id']);

					}//end foreach
				}//end if

				//draw a line from folder to each target


				echo 'Abc..';

		  }//end of foreach

		  print_r($lines);
	  }//end of function draw_linmes


   ?>

<div class="col-lg-11">                              
         <div class="clear"></div>
 <div id='ajax-list'>
    <script>
function doSave(id) {
   var id_file = id;
   
  var filetitle = $("#material_file_title"+id_file).val();
  var material_url =  $("#fileupl"+id_file).val();
  var fileOrder =  $("#material_file_order"+id_file).val();


  saveFile(id_file, filetitle, material_url, fileOrder);

  
}

function saveFile(id_file, filetitle, material_url, fileOrder)
{

	  	$.ajax({
			url: '<?php echo BASE_URL_BACKEND;?>/Material_file/saveMaterialFile',
			type: 'post',
			data: {primary_key: id_file, title: filetitle, url :material_url, order: fileOrder},
                        
			beforeSend: function()
			{	
                                $('.loadergif'+id_file).show();
			},
			complete: function()
			{
				//alert("succesfull edited data");
				$('.loadergif'+id_file).hide();
                                
			}
			});
}



</script>

<?php if(!empty($ListMaterialFile)){?>	

    <ul class='photos-crud'>
        <form name="formAssignment" method="POST" action="" onsubmit="return false;">
    <?php if(count($ListMaterialFile) > 0){
        $no=1; foreach($ListMaterialFile as $file){
                $no++;
        ?>
            <li id="photos_<?php echo $file['material_file_id']; ?>">              
                            
                            <div class="col-sm-8 col-md-8">
                            <div class="product-image-wrapper panel panel-default ">
                            <div class="panel-body">
                            <div class="productinfo text-center">
				<div class='photo-box'>
                                   
                                    
                                        <?php if($file['material_file_title'] !== null){ ?>
                                          <div class="loadergif<?php echo $file['material_file_id']; ?> col-md-5 text-center" style="display: none;"><img src='<?php echo IMAGES_BASE_URL;?>/preloader.gif' /></div>
                                        <div class="form-group">
                                            <input type="text" class="ic-title-field form-control"  id="material_file_title<?php echo $file['material_file_id']; ?>" value="<?php echo $file['material_file_title']; ?>" autocomplete="off" />
					</div>
                                          
                                                <div class="form-group">                                                    
                                            <div style="margin-bottom:2px;" class="fileupl<?php echo $file['material_file_id']; ?>"></div>
                                            <input type="text" name="fileupl<?php echo $file['material_file_id']; ?>" id="fileupl<?php echo $file['material_file_id']; ?>" class="form-control" value="<?php echo $file['material_file']; ?>">
                                            <div style="margin-right:50px;">
                                                       <p class="help-block" style="color:#00F;">Paste Link file url source</p>
                                                          
                                            </div>
                                        </div>  
                                          
                                         <div class="clear"></div><?php }?>
                                        <?php if($file['material_file_order'] !== null){ ?>
                                         <div class="form-group">
                                           <input type="text" class="ic-title-field form-control"  id="material_file_order<?php echo $file['material_file_id']; ?>" name="material_file_order<?php echo $file['material_file_id']; ?>"  value="<?php echo $file['material_file_order']; ?>" autocomplete="off" />                       
                                         </div>
                                        
                                       
                                        <div class="clear"></div>
                                        <?php }?>                                  
					<div class='delete-box'>
                                        <div class="form-group">
                                                                       
					</div>
                                                <a button class="btn-success btn-sm" id="<?php echo $file['material_file_id'];?>"  onclick="doSave(this.id)"><i class="icon-save"></i></a> &nbsp;
                                                 <?php if($approve){ ?>
                                                            <?php if($file['material_file_active_status'] == 1) {?>
                                                        &nbsp;   <a class="btn-success btn-sm" title="Click to Inactive" href="<?php echo BASE_URL_BACKEND."/".$controller."/active/".$file['material_file_id'];?>"><i class="icon-ok"></i></a> &nbsp; 
                                                            <?php } else { ?>
                                                        &nbsp;    <a class="btn-danger btn-sm" title="Click to Active" href="<?php echo BASE_URL_BACKEND."/".$controller."/active/".$file['material_file_id'];?>"><i class="icon-remove"></i></a> &nbsp;
                                                            <?php } ?>
                                                    <?php } ?>

                                                    <?php if($delete){ ?>
                                                          &nbsp;  <a class="btn-danger btn-sm" title="Click to Delete" onclick="var answer = confirm('delete <?php echo $file['material_file_title'];?> ?'); if (answer){window.location = '<?php echo BASE_URL_BACKEND.'/'.$controller;?>/delete/<?php echo $file['material_file_id'];?>';}"><span class="icon-trash"></span></a> &nbsp;
                                                    <?php } ?>
                                           
						
					</div>
					
				</div>
                            </div>
                            </div>
                            </div>
                            </div>
			</li>                          
                                    

                         <?php } ?> <?php }else {?>      
                        <li> data not found </li>                         
                            <?php } ?>
                </form>  
		</ul>
        <?php }?>

</div>     
    

</div> 

<div class="col-lg-11">                              
         <div class="clear"></div>
 <div id='ajax-list'>
    <script>
function doSave(id) {
   var id_subpage = id;
   
  var subpagetitle = $("#subpage_title"+id_subpage).val();
  var subpageDesc =  document.getElementById("trackingDiv"+id_subpage).value;
  var subpageUrl =  $("#imgurl"+id_subpage).val();
  var subpageOrder =  $("#subpage_order"+id_subpage).val();

  saveSubpage(id_subpage, subpagetitle, subpageDesc,subpageUrl,subpageOrder);

  
}

function saveSubpage(id_subpage, subpagetitle, subpageDesc,subpageUrl,subpageOrder)
{

	  	$.ajax({
			url: '<?php echo BASE_URL_BACKEND;?>/Content_subpage/saveSubpage',
			type: 'post',
			data: {primary_key: id_subpage, title: subpagetitle, desc: subpageDesc, imgurl: subpageUrl, order: subpageOrder},
                        
			beforeSend: function()
			{	
                                $('.loadergif'+id_subpage).show();
			},
			complete: function()
			{
				//alert("succesfull edited data");
				$('.loadergif'+id_subpage).hide();
                                
			}
			});
}



</script>

<?php if(!empty($ListSubpage)){?>	

    <ul class='photos-crud'>
        <form name="formAssignment" method="POST" action="" onsubmit="return false;">
    <?php if(count($ListSubpage) > 0){
        $no=1; foreach($ListSubpage as $subpage){
                $no++;
        ?>
            <li id="photos_<?php echo $subpage['content_subpage_id']; ?>">              
                            
                            <div class="col-sm-8 col-md-8">
                            <div class="product-image-wrapper panel panel-default ">
                            <div class="panel-body">
                            <div class="productinfo text-center">
				<div class='photo-box'>
                                   <div class="form-group">
                                    <div class="loadergif<?php echo $subpage['content_subpage_id']; ?> col-md-5 text-center" style="display: none;">
                                       <img src='<?php echo IMAGES_BASE_URL;?>/preloader.gif' />
                                   </div>
                                   </div>  
                                         <div class="clear"></div>
                                         
                                          <?php if($subpage['content_subpage_image'] !== null){ ?>
                                            <div class="form-group" <?php if($page_type == 2) { echo 'style="display:none"';}?>>

                                                          <?php
                                                                $content_subpage_image_thumbs = BASE_URL.str_replace('/admin/images','/admin/.thumbs/images',$subpage['content_subpage_image']);
                                                                if(!empty($subpage['content_subpage_image'])){
                                                                        $content_subpage_image = $subpage['content_subpage_image'];
                                                                } else {
                                                                        $content_subpage_image = "";
                                                                }
                                                                ?>
                                                <div class="col-lg-6">
                                                  <div style="margin-bottom:10px;" class="imgurl<?php echo $subpage['content_subpage_id']; ?>"><?php if(!empty($subpage['content_subpage_image'])){ ?><img src="<?php echo $content_subpage_image; ?>" style="max-width:400px; padding:5px; border:solid 1px #ccc;"><?php } ?></div>
                                                  <input type="text" name="subpage_imgurl<?php echo $subpage['content_subpage_id']; ?>" readonly="readonly" id="imgurl<?php echo $subpage['content_subpage_id']; ?>" class="form-control" value="<?php echo $content_subpage_image ?>">
                                                  <p class="help-block">width and height optimal is 240px x 240px</p>
                                                  <div style="margin-right:10px;">
                                                                <a onClick="openKCFinder('imgurl<?php echo $subpage['content_subpage_id']; ?>');" id="link-file" class="link">Browse</a>
                                                                <a onClick="reset_value('imgurl<?php echo $subpage['content_subpage_id']; ?>');" id="link-file" class="link">Reset</a>
                                                   </div>
                                                  <div class="clear"></div>
                                                  </div>
                                            </div>

                                            <div class="clear"></div>
                                        <?php }?>
                                         
                                        <?php if($subpage['content_subpage_title'] !== null){ ?>
                                        <div class="form-group">
                                           <input type="text" class="ic-title-field form-control"  id="subpage_title<?php echo $subpage['content_subpage_id']; ?>" value="<?php echo $subpage['content_subpage_title']; ?>" autocomplete="off" />
					
					</div>
                                      
                                        <?php }?>
                                         
                                         
                                        <?php if($subpage['content_subpage_desc'] !== null){ ?>
                                         <textarea id="trackingDiv<?php echo $subpage['content_subpage_id']; ?>" style="display: none"> </textarea>
                                       
                                         <div class="form-group" <?php if($page_type == 3) { echo 'style="display:none"';}?>>
                                             <textarea id="IDsubdesc<?php echo $subpage['content_subpage_id']; ?>" name="IDsubdesc<?php echo $subpage['content_subpage_id']; ?>" class="ic-description-field form-control ckeditor"><?php echo $subpage['content_subpage_desc']; ?></textarea>
					
                                             <script>
                                            
                                            
                                        CKEDITOR.replace( 'IDsubdesc<?php echo $subpage['content_subpage_id']; ?>', {
                                                toolbar: [
                                                        { name: 'document', items : [ 'Source'] },
                                                        { name: 'insert', items : [ 'Table','HorizontalRule','SpecialChar','PageBreak'] },
                                                        { name: 'colors',      items : [ 'TextColor','BGColor' ] },
                                                        { name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar' ] },
                                                        { name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },
                                                        { name: 'paragraph', items : [ 'JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock', '-', 'NumberedList','BulletedList'] },
                                                 ],
                                                width : 800,
                                                height: 100
                                               
                                        });
                                    timer = setInterval(updateDiv,100);
                                    function updateDiv(){
                                        var editorText = CKEDITOR.instances.IDsubdesc<?php echo $subpage['content_subpage_id']; ?>.getData();
                                        $('#trackingDiv<?php echo $subpage['content_subpage_id']; ?>').html(editorText);
                                    }
                                       
                                        
                                        
                                        </script> 
                                         </div>
                                       
                                        <div class="clear"></div>
                                        <?php }?>                                  
					<div class='delete-box'>
                                        <div class="form-group">
                                        <?php if($order){ ?>
                                           <input type="text" id="subpage_order<?php echo $subpage['content_subpage_id'];?>" class="form-control" style="text-align:center; width:40px;" name="order[<?php echo $subpage['content_subpage_id'];?>]" size="1" maxlength="2" value="<?php echo $subpage['content_subpage_order'];?>">
                                         <?php } ?>                                
					</div>
                                                <a button class="btn-success btn-sm" id="<?php echo $subpage['content_subpage_id'];?>"  onclick="doSave(this.id)"><i class="icon-save"></i></a> &nbsp;
                                                 <?php if($approve){ ?>
                                                            <?php if($subpage['content_subpage_active_status'] == 1) {?>
                                                        &nbsp;   <a class="btn-success btn-sm" title="Click to Inactive" href="<?php echo BASE_URL_BACKEND."/".$controller."/active/".$subpage['content_subpage_id'];?>"><i class="icon-ok"></i></a> &nbsp; 
                                                            <?php } else { ?>
                                                        &nbsp;    <a class="btn-danger btn-sm" title="Click to Active" href="<?php echo BASE_URL_BACKEND."/".$controller."/active/".$subpage['content_subpage_id'];?>"><i class="icon-remove"></i></a> &nbsp;
                                                            <?php } ?>
                                                    <?php } ?>

                                                    <?php if($delete){ ?>
                                                          &nbsp;  <a class="btn-danger btn-sm" title="Click to Delete" onclick="var answer = confirm('delete <?php echo $subpage['content_subpage_title'];?> ?'); if (answer){window.location = '<?php echo BASE_URL_BACKEND.'/'.$controller;?>/delete/<?php echo $subpage['content_subpage_id'];?>';}"><span class="icon-trash"></span></a> &nbsp;
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

<div class="col-lg-11">                              
         <div class="clear"></div>
 <div id='ajax-list'>
    <script>


function saveTitle(data_id, data_title)
{

	  	$.ajax({
			url: '<?php echo BASE_URL_BACKEND;?>/Worksgallery/saveTitle',
			type: 'post',
			data: {primary_key: data_id, value: data_title},
                        
			beforeSend: function()
			{
				$('.file-upload-messages-container:first').show();
				$('.file-upload-message').html("<?php echo 'saving_title';?>");
			},
			complete: function()
			{
				$('.file-upload-messages-container').hide();
				$('.file-upload-message').html('');
                                //alert("succesfull edited " + data_title);
			}
			});
}

function saveDescription(data_id, data_description)
{
	
	  	$.ajax({
			url: '<?php echo BASE_URL_BACKEND;?>/Worksgallery/saveDescription',
			type: 'post',
			data: {primary_key: data_id, value: data_description},
			beforeSend: function()
			{
				$('.file-upload-messages-container:first').show();
				$('.file-upload-message').html("<?php echo 'saving_description';?>");
				//alert("begin " + data_description + " id " + data_id);
			},
			complete: function()
			{
				$('.file-upload-messages-container').hide();
				$('.file-upload-message').html('');
				//alert("succesfull edited " + data_description );
			}
			});
}

</script>

<?php if(!empty($ListGallery)){?>
	
	<script type='text/javascript'>
		$(function(){
			
			$(".photo-box img").mousedown(function(){
				return false;
			});
    	
    		$('.ic-title-field').keyup(function(e) {
    			if(e.keyCode == 13) {
					var data_id = $(this).attr('data-id');
					var data_title = $(this).val();
                                  alert(data_title);
					saveTitle(data_id, data_title);
    			}
    		});

    		$('.ic-title-field').bind({
    			  click: function() {
    				$(this).css('resize','both');
    			    $(this).css('overflow','auto');
    			    $(this).animate({height:30},30);
    			  },
    			  blur: function() {
      			    $(this).css('resize','none');
      			  	$(this).css('overflow','hidden');
      			  	$(this).animate({height:30},30);

					var data_id = $(this).attr('data-id');
					var data_title = $(this).val();
                                        //alert(data_title);
					saveTitle(data_id, data_title);
    			  }
    		});
		$('.ic-description-field').keyup(function(e) {
    			if(e.keyCode == 13) {
					var data_id = $(this).attr('data-id');
					var data_description = $(this).val();

					saveDescription(data_id, data_description);
    			}
    		});

    		$('.ic-description-field').bind({
    			  click: function() {
    				$(this).css('resize','both');
    			    $(this).css('overflow','auto');
    			    $(this).animate({height:50},45);
    			  },
    			  blur: function() {
      			    $(this).css('resize','none');
      			  	$(this).css('overflow','hidden');
      			  	$(this).animate({height:50},45);

					var data_id = $(this).attr('data-id');
					var data_description = $(this).val();

					saveDescription(data_id, data_description);
    			  }
    		});
		});
	</script>

    <ul class='photos-crud'>
        <form name="formAssignment" method="POST" action="" onsubmit="return false;">
    <?php if(count($ListGallery) > 0){
        $no=0; foreach($ListGallery as $gallery){
                $no++;
        ?>
            <li id="photos_<?php echo $gallery['gallery_id']; ?>">              
                            
                            <div class="col-sm-6 col-md-4">
                            <div class="product-image-wrapper panel panel-default ">
                            <div class="panel-body">
                            <div class="productinfo text-center">
				<div class='photo-box'>
                                    <img class="img-center" src="<?php echo IMAGES_BASE_URL.'/'.$gallery['gallery_image']; ?>" alt="" width="150" height="100">
                                    
                                        <?php if($gallery['gallery_title'] !== null){ ?>
                                        
                                        <div class="form-group">
                                            <input type="text" class="ic-title-field form-control" data-id="<?php echo $gallery['gallery_id']; ?>" value="<?php echo $gallery['gallery_title']; ?>"autocomplete="off" />
					</div>
                                         <div class="clear"></div><?php }?>
                                        <?php if($gallery['gallery_desc'] !== null){ ?>
					 <div class="form-group">
                                        <textarea class="ic-description-field form-control" data-id="<?php echo $gallery['gallery_id']; ?>" autocomplete="off" ><?php echo $gallery['gallery_desc']; ?></textarea>
					</div>
                                        <div class="clear"></div><?php }?>
    
                                        
					<div class='delete-box'>
                                        <div class="form-group">
                                        <?php if($order){ ?>
                                           <input type="text" class="form-control" style="text-align:center; width:40px;" name="order[<?php echo $gallery['gallery_id'];?>]" size="1" maxlength="2" value="<?php echo $gallery['gallery_order'];?>">
                                         <?php } ?>                                
					</div>
                                                 <?php if($approve){ ?>
                                                            <?php if($gallery['gallery_active_status'] == 1) {?>
                                                        &nbsp;   <a class="btn-success btn-sm" title="Click to Inactive" href="<?php echo BASE_URL_BACKEND."/".$controller."/active/".$gallery['gallery_id'];?>"><i class="icon-ok"></i></a> &nbsp; 
                                                            <?php } else { ?>
                                                        &nbsp;    <a class="btn-danger btn-sm" title="Click to Active" href="<?php echo BASE_URL_BACKEND."/".$controller."/active/".$gallery['gallery_id'];?>"><i class="icon-remove"></i></a> &nbsp;
                                                            <?php } ?>
                                                    <?php } ?>

                                                    <?php if($delete){ ?>
                                                          &nbsp;  <a class="btn-danger btn-sm" title="Click to Delete" onclick="var answer = confirm('delete <?php echo $gallery['gallery_title'];?> ?'); if (answer){window.location = '<?php echo BASE_URL_BACKEND.'/'.$controller;?>/delete/<?php echo $gallery['gallery_id'];?>';}"><span class="icon-trash"></span></a> &nbsp;
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
		 <?php echo($paging); ?>
        <?php }?>

</div>     
     

</div> 
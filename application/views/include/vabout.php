<div class="content team" id="menu-2">
     <div class="templatemo_ourteam">
     		<div class="container templatemo_hexteam">
            	<div class="row col-md-12 col-sm-12">
                    <?php if($getContent){ ?>
                     <?php $i=1; foreach($getContent as $gc){ ?>
                    
                    
                    
                   <div class="col-md-8 col-sm-8 about-txt" >
                    	<h2> <?php echo $gc->content_title;?></h2>
                        <p>
                            <?php echo $gc->content_desc;?>
                        </p>
                    </div>
                     <?php if ($gc->gallery) {?> 
                                               
                            <div class="about-images" >  
                            <?php foreach ($gc->gallery as $gall) {?>                        
                                        <div class="hex col-sm-6  <?php echo  aboutClass($gall->gallery_order);?> about<?php echo $gall->gallery_order;?>">
                                            <div>
                                              <div class="hexagon hexagonabout gallery-item ">
                                                <div class="hexagon-in1">
                                                  <div class="hexagon-in2" style="background-image: url(<?php echo IMAGES_BASE_URL .'/'.$gall->gallery_image; ?>);">
                                                    <div class="overlay">
                                                        <a href="<?php echo IMAGES_BASE_URL .'/'.$gall->gallery_image; ?>" data-rel="lightbox"></a>
                                                    </div>
                                                      <div class="spntext"> <span><?php echo $gall->gallery_title;?></span></div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                            
                                              
                         <?php }?>
                                               
                        </div>                
                    <?php }?>
                    
                <?php $i++; } ?>
                <?php } ?>     
                
                </div>
            </div>
            <div class="clear"></div>
            
            
     </div>
     </div>
 <div class="container aboutspace">
    	<div class="row">
        	<div class="templatemo_loadmore">
			
            </div>
        </div>
    </div>
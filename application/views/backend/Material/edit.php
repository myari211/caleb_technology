<body>
	<section id="container" class="">
      <?php include VIEWS_PATH_BACKEND."/menu.php"; ?>
	  
	  <?php include VIEWS_PATH_BACKEND."/leftMenu.php"; ?>

	   <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
					<section class="panel">
                          <header class="panel-heading">
                              <?php echo $breadcrump['module_group_name']; ?> - <?php echo $breadcrump['module_name']; ?> - Edit
                          </header>
                          <div class="panel-body">
                                <form name="form1" action="<?php echo BASE_URL_BACKEND.'/'.$controller.'/doEdit/'.$rsWorks[0]['works_id']; ?>" method="post" class="form-horizontal" role="form">
                              <?php if(isset($error)){ ?>
                                        <div class="form-group has-error">
                                                <div class="col-lg-12">
                                                      <label for="inputError" class="control-label"><?php echo $error;?></label>
                                                </div>
                                        </div>
                                        <?php } ?>
                                
                                <div class="form-group">
                                    <label for="menu" class="col-lg-2 col-sm-2 control-label">Selects Menu</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="menu_id" id="echoActive"  value="<?php echo $rsWorks[0]['menu_id']; ?>" style="display: none"/> 
                                         <?php include 'vopt_menu.php'; ?> 
                                    </div>                                      
                                </div>
                                  <div class="form-group">
                                    <label for="menu" class="col-lg-2 col-sm-2 control-label">Services</label>
                                        <div class="col-lg-4">
                                        <select class="form-control" name="services_id" id="services_id">
                                              <?php foreach($Services as $sv):?>
                                            <option <?php if($rsWorks[0]['services_id'] == $sv->services_id ) echo 'selected';?> value='<?php echo $sv->services_id;?>'><?php echo $sv->services_title;?> </option>
                                            <?php endforeach ?>
                                            
                                        </select> 
                                           
                                        </div>
                                  
                                </div>    
                                    
                                 <div class="form-group">
                                    <label for="menu" class="col-lg-2 col-sm-2 control-label">Works View</label>
                                        <div class="col-lg-4">
                                        <select class="form-control" name="category_id" id="id_type">
                                            <?php foreach($Workscategory as $pg):?>
                                            <option <?php if($rsWorks[0]['category_id'] == $pg->category_id ) echo 'selected';?> value='<?php echo $pg->category_id;?>'><?php echo $pg->category_title;?> </option>
                                            <?php endforeach ?>
                                        </select> 
                                        </div>
                                </div>
                               <div class="form-group">
                                      <label for="works_title" class="col-lg-2 col-sm-2 control-label">Works Title</label>
                                      <div class="col-lg-4">
                                          <input name="works_title" type="text" class="form-control" placeholder="Works Title" value="<?php echo $rsWorks[0]['works_title']; ?>">
                                         <input name="works_titleOld" type="hidden" value="<?php echo $rsWorks[0]['works_title']; ?>">
                                       </div>
                                  </div>
                                <div class="form-group">
                                      <label for="inputDescription" class="col-lg-2 col-sm-2 control-label">Works Short Description</label>
                                      <div class="col-lg-10">
										  <textarea id="IDworksshortdesc" name="works_shortdesc" class="form-control" placeholder="About Short Description" rows="4"><?php echo $rsWorks[0]['works_short_desc']; ?></textarea>
										  <script>
												CKEDITOR.replace( 'IDworksshortdesc', {
													toolbar: [
														{ name: 'document', items : [ 'Source'] },
														{ name: 'insert', items : [ 'Table','HorizontalRule','SpecialChar','PageBreak'] },
														{ name: 'colors',      items : [ 'TextColor','BGColor' ] },
														{ name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },
														{ name: 'paragraph', items : [ 'JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock', '-', 'NumberedList','BulletedList'] },
													 ],
													width : 900,
													height: 200
												});
											</script>
									 </div>
                                  </div>
                                    <div class="form-group">
                                      <label for="inputDescription" class="col-lg-2 col-sm-2 control-label">Works Description</label>
                                      <div class="col-lg-10">
										  <textarea id="IDworksdesc" name="works_desc" class="form-control ckeditor" placeholder="Works Description" rows="7"><?php echo $rsWorks[0]['works_desc']; ?></textarea>
											<script>
												CKEDITOR.replace( 'IDworksdesc', {
													
													width : 900,
													height: 300,
													contentsCss : ["<?php echo CSS_BASE_URL;?>/style.css"]
												});
											</script>
                                      </div>
                                  </div>
                                    
                                    <div class="form-group">
                                      <label for="inputDescription" class="col-lg-2 col-sm-2 control-label">Works About </label>
                                    <div class="col-lg-10">
                                        <textarea id="IDworksaboutdesc" name="works_about" class="form-control" placeholder="About Short Description" rows="4"><?php echo $rsWorks[0]['works_about']; ?></textarea>
                                        <script>
                                        CKEDITOR.replace( 'IDworksaboutdesc', {
                                                toolbar: [
                                                        { name: 'document', items : [ 'Source'] },
                                                        { name: 'insert', items : [ 'Table','HorizontalRule','SpecialChar','PageBreak'] },
                                                        { name: 'colors',      items : [ 'TextColor','BGColor' ] },
                                                        { name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },
                                                        { name: 'paragraph', items : [ 'JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock', '-', 'NumberedList','BulletedList'] },
                                                 ],
                                                width : 900,
                                                height: 200
                                        });
                                        </script>
                                    </div>
                                </div>   
                                 <div class="form-group">
                                      <label for="inputDescription" class="col-lg-2 col-sm-2 control-label">Works Client</label>
                                    <div class="col-lg-10">
                                        <textarea id="IDworkclient" name="works_client" class="form-control" placeholder="About Short Description" rows="4"><?php echo $rsWorks[0]['works_client']; ?></textarea>
                                        <script>
                                        CKEDITOR.replace( 'IDworkclient', {
                                                toolbar: [
                                                        { name: 'document', items : [ 'Source'] },
                                                        { name: 'insert', items : [ 'Table','HorizontalRule','SpecialChar','PageBreak'] },
                                                        { name: 'colors',      items : [ 'TextColor','BGColor' ] },
                                                        { name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },
                                                        { name: 'paragraph', items : [ 'JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock', '-', 'NumberedList','BulletedList'] },
                                                 ],
                                                width : 900,
                                                height: 200
                                        });
                                        </script>
                                    </div>
                                </div>
                                    
                                    
                                    <div class="form-group">
                                      <label for="works_highlight" class="col-lg-2 col-sm-2 control-label">Highlight </label>
                                      <div class="col-lg-4">
                                            <?php if($rsWorks[0]['works_highlight'] == 1){ ?>
                                          <input type="checkbox" value="1" id="works_highlight" name="works_highlight" checked="">
                                            <?php } else { ?>
                                            <input type="checkbox" value="1" id="works_highlight" name="works_highlight">
                                            <?php }?>
                                      </div>
                                    </div>
                                    <div class="form-group">         
                                      <label for="works_imageurl" class="col-lg-2 col-sm-2 control-label">Works Images</label>
                                                <?php
                                                      $works_image_thumbs = BASE_URL.str_replace('/admin/images','/admin/.thumbs/images',$rsWorks[0]['works_image']);
                                                      if(!empty($rsWorks[0]['works_image'])){
                                                              $works_image = BASE_URL.$rsWorks[0]['works_image'];
                                                      } else {
                                                              $works_image = "";
                                                      }
                                                      ?>
                                      <div class="col-lg-4">
                                        <div style="margin-bottom:10px;" class="imageurl"><?php if(!empty($rsWorks[0]['works_image'])){ ?><img src="<?php echo $works_image; ?>" style="max-width:400px; padding:5px; border:solid 1px #ccc;"><?php } ?></div>
                                        <input type="text" name="works_imageurl" readonly="readonly" id="imageurl" class="form-control" value="<?php echo $works_image ?>">
                                        <p class="help-block">width and height optimal is 400px x 400px</p>
                                        <div style="margin-right:10px;">
                                                      <a onClick="openKCFinder('imageurl');" id="link-file" class="link">Browse</a>
                                                      <a onClick="reset_value('imageurl');" id="link-file" class="link">Reset</a>
                                         </div>
                                        </div>
                                  </div>
								  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Works Alias URL</label>
                                      <div class="col-lg-4">
                                          <input name="works_alias" type="text" class="form-control" placeholder="Works Alias" value="<?php echo $rsWorks[0]['works_alias']; ?>">
                                                    <input name="newsaliasOld" type="hidden" value="<?php echo $rsWorks[0]['works_alias']; ?>">
                                           </div>
                                  </div>
								  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Works Meta Description</label>
                                      <div class="col-lg-4">
                                          <input name="works_metadescription" type="text" class="form-control" placeholder="Works Meta Description" value="<?php echo $rsWorks[0]['works_meta_description']; ?>">
									 </div>
                                  </div>
								  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Works Meta Keywords</label>
                                      <div class="col-lg-4">
                                          <input name="works_metakeywords" type="text" class="form-control" placeholder="Works Meta Keywords" value="<?php echo $rsWorks[0]['works_meta_keywords']; ?>">
									 </div>
                                  </div>
                                  <div class="form-group">
                                      <div class="col-lg-offset-2 col-lg-10">
										  <input name="tbEdit" class="btn btn-info btn-sm" type="submit" value="Save">&nbsp;
										  <input name="cancel" class="btn btn-info btn-sm" type="button" value="Cancel" onClick="location.href='<?php echo BASE_URL_BACKEND.'/'.$controller; ?>'">
                                      </div>
                                  </div>
                              </form>
                          </div>
                      </section>
                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
	  
	  <?php include VIEWS_PATH_BACKEND."/footer.php"; ?>

	</section>
	
	<!-- js placed at the end of the document so the content load faster -->
     <!--  <script src="<?php //echo JS_BASE_URL; ?>/jquery.js"></script>-->
    <script src="<?php echo JS_BASE_URL; ?>/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="<?php echo JS_BASE_URL; ?>/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?php echo JS_BASE_URL; ?>/jquery.scrollTo.min.js"></script>
   
    <script src="<?php echo JS_BASE_URL; ?>/respond.min.js" ></script>
	
	<script src="<?php echo JS_BASE_URL; ?>/select2.min.js"></script>
	<link rel="stylesheet" href="<?php echo CSS_BASE_URL; ?>/select2.min.css">
	<script>
	$(document).ready(function(){
		$("#IDnewstag").select2({
			 tags: true
		});
	});
	</script>
	
    <!--common script for all content-->
    <script src="<?php echo JS_BASE_URL; ?>/common-scripts.js"></script>
</body>
</html	
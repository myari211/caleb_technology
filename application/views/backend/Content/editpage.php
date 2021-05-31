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
                                <form name="form1" action="<?php echo BASE_URL_BACKEND.'/'.$controller.'/doEditPage/'.$rsContent[0]['content_page_id']; ?>" method="post" class="form-horizontal" role="form">
                              <?php if(isset($error)){ ?>
                                        <div class="form-group has-error">
                                                <div class="col-lg-12">
                                                      <label for="inputError" class="control-label"><?php echo $error;?></label>
                                                </div>
                                        </div>
                                        <?php } ?>
                                 <input type="text" name="menu_id" id="echoActive"  value="<?php echo $rsContent[0]['menu_id']; ?>" style="display: none"/> 
                                 
                                 <div class="form-group">
                                    <label for="menu" class="col-lg-2 col-sm-2 control-label">Content Page View</label>
                                        <div class="col-lg-4">
                                        <select class="form-control" name="page_type" id="id_type">
                                            <?php foreach($Pageview as $pg):?>
                                            <option <?php if($rsContent[0]['page_type'] == $pg->page_type ) echo 'selected';?> value='<?php echo $pg->page_type;?>'><?php echo $pg->page_title;?> </option>
                                            <?php endforeach ?>
                                        </select> 
                                        </div>
                                </div>
                               <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Content Page Title</label>
                                      <div class="col-lg-4">
                                          <input name="content_page_title" type="text" class="form-control" placeholder="Content Page Title" value="<?php echo $rsContent[0]['content_page_title']; ?>">
                                         <input name="content_page_titleOld" type="hidden" value="<?php echo $rsContent[0]['content_page_title']; ?>">
                                       </div>
                                  </div>
                                <div class="form-group" style="display:none">
                                      <label for="inputDescription" class="col-lg-2 col-sm-2 control-label">Content Page Short Description</label>
                                      <div class="col-lg-10">
										  <textarea id="IDcontentshortdesc" name="content_page_shortdesc" class="form-control" placeholder="Content Page Short Description" rows="4"><?php echo $rsContent[0]['content_page_short_desc']; ?></textarea>
										  <script>
												CKEDITOR.replace( 'IDcontentshortdesc', {
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
                                      <label for="inputDescription" class="col-lg-2 col-sm-2 control-label">Content Page Description</label>
                                      <div class="col-lg-10">
										  <textarea id="IDcontentdesc" name="content_page_desc" class="form-control ckeditor" placeholder="Content Page Description" rows="7"><?php echo $rsContent[0]['content_page_desc']; ?></textarea>
											<script>
												CKEDITOR.replace( 'IDcontentdesc', {
													
													width : 900,
													height: 300,
													contentsCss : ["<?php echo CSS_BASE_URL;?>/style.css"]
												});
											</script>
                                      </div>
                                  </div>
                                    <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Content Page Images</label>
                                                <?php
                                                      $content_page_image_thumbs = BASE_URL.str_replace('/admin/images','/admin/.thumbs/images',$rsContent[0]['content_page_image']);
                                                      if(!empty($rsContent[0]['content_page_image'])){
                                                              $content_page_image = $rsContent[0]['content_page_image'];
                                                      } else {
                                                              $content_page_image = "";
                                                      }
                                                      ?>
                                      <div class="col-lg-4">
                                        <div style="margin-bottom:10px;" class="imageurl"><?php if(!empty($rsContent[0]['content_page_image'])){ ?><img src="<?php echo $content_page_image; ?>" style="max-width:400px; padding:5px; border:solid 1px #ccc;"><?php } ?></div>
                                        <input type="text" name="content_page_imageurl" readonly="readonly" id="imageurl" class="form-control" value="<?php echo $content_page_image ?>">
                                        <p class="help-block">width and height optimal is 400px x 400px</p>
                                        <div style="margin-right:10px;">
                                                      <a onClick="openKCFinder('imageurl');" id="link-file" class="link">Browse</a>
                                                      <a onClick="reset_value('imageurl');" id="link-file" class="link">Reset</a>
                                         </div>
                                        </div>
                                  </div>
                                  
                                <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Content Page Alias URL</label>
                                      <div class="col-lg-4">
                                          <input name="content_page_alias" type="text" class="form-control" placeholder="Content Page Alias" value="<?php echo $rsContent[0]['content_page_alias']; ?>">
                                                    <input name="newsaliasOld" type="hidden" value="<?php echo $rsContent[0]['content_page_alias']; ?>">
                                           </div>
                                  </div>
                                <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Content Page Meta Description</label>
                                      <div class="col-lg-4">
                                          <input name="content_page_metadescription" type="text" class="form-control" placeholder="Content Page Meta Description" value="<?php echo $rsContent[0]['content_page_meta_description']; ?>">
                                </div>
                                  </div>
                                <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Content Page Meta Keywords</label>
                                      <div class="col-lg-4">
                                          <input name="content_page_metakeywords" type="text" class="form-control" placeholder="Content Page Meta Keywords" value="<?php echo $rsContent[0]['content_page_meta_keywords']; ?>">
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
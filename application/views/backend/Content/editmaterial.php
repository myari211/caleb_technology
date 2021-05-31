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
                                <form name="form1" action="<?php echo BASE_URL_BACKEND.'/'.$controller.'/doEditMaterial/'.$rsMaterial[0]['material_id']; ?>" method="post" class="form-horizontal" role="form">
                              <?php if(isset($error)){ ?>
                                        <div class="form-group has-error">
                                                <div class="col-lg-12">
                                                      <label for="inputError" class="control-label"><?php echo $error;?></label>
                                                </div>
                                        </div>
                                        <?php } ?>
                                
                                
                               <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Material Title</label>
                                      <div class="col-lg-4">
                                          <input name="material_title" type="text" class="form-control" placeholder="Material Title" value="<?php echo $rsMaterial[0]['material_title']; ?>">
                                         <input name="material_titleOld" type="hidden" value="<?php echo $rsMaterial[0]['material_title']; ?>">
                                       </div>
                                  </div>
                                <div class="form-group">
                                      <label for="material_highlight" class="col-lg-2 col-sm-2 control-label">Highlight </label>
                                      <div class="col-lg-4">
                                            <?php if($rsMaterial[0]['material_highlight'] == 1){ ?>
                                          <input type="checkbox" value="1" id="material_highlight" name="material_highlight" checked="">
                                            <?php } else { ?>
                                            <input type="checkbox" value="1" id="material_highlight" name="material_highlight">
                                            <?php }?>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Material Images</label>
                                                <?php
                                                      $material_image_thumbs = BASE_URL.str_replace('/admin/images','/admin/.thumbs/images',$rsMaterial[0]['material_image']);
                                                      if(!empty($rsMaterial[0]['material_image'])){
                                                              $material_image = BASE_URL.$rsMaterial[0]['material_image'];
                                                      } else {
                                                              $material_image = "";
                                                      }
                                                      ?>
                                      <div class="col-lg-4">
                                        <div style="margin-bottom:10px;" class="imageurl"><?php if(!empty($rsMaterial[0]['material_image'])){ ?><img src="<?php echo $material_image; ?>" style="max-width:400px; padding:5px; border:solid 1px #ccc;"><?php } ?></div>
                                        <input type="text" name="material_imageurl" readonly="readonly" id="imageurl" class="form-control" value="<?php echo $material_image ?>">
                                        <p class="help-block">width and height optimal is 400px x 400px</p>
                                        <div style="margin-right:10px;">
                                                      <a onClick="openKCFinder('imageurl');" id="link-file" class="link">Browse</a>
                                                      <a onClick="reset_value('imageurl');" id="link-file" class="link">Reset</a>
                                         </div>
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
    <script src="<?php echo JS_BASE_URL; ?>/jquery.nicescroll.js" type="text/javascript"></script>
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
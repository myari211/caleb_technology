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
                                <form name="form1" action="<?php echo BASE_URL_BACKEND.'/'.$controller.'/doEdit/'.$rsLatest_training[0]['latest_training_id']; ?>" method="post" class="form-horizontal" role="form">
                              <?php if(isset($error)){ ?>
                                        <div class="form-group has-error">
                                                <div class="col-lg-12">
                                                      <label for="inputError" class="control-label"><?php echo $error;?></label>
                                                </div>
                                        </div>
                                        <?php } ?>
                             
                                <div class="form-group">
                                      <label for="latest_training_title" class="col-lg-2 col-sm-2 control-label">latest_training Title</label>
                                      <div class="col-lg-4">
                                          <input name="latest_training_title" type="text" class="form-control" placeholder="latest_training Title" value="<?php echo $rsLatest_training[0]['latest_training_title']; ?>">
                                         <input name="latest_training_titleOld" type="hidden" value="<?php echo $rsLatest_training[0]['latest_training_title']; ?>">
                                       </div>
                                </div>
                                
                                <div class="form-group">
                        <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label"> Images</label>
                        <?php
                                                      $latest_training_image_thumbs = BASE_URL.str_replace('/admin/images','/admin/.thumbs/images',$rsLatest_training[0]['latest_training_image']);
                                                      if(!empty($rsLatest_training[0]['latest_training_image'])){
                                                              $latest_training_image = BASE_URL.$rsLatest_training[0]['latest_training_image'];
                                                      } else {
                                                              $latest_training_image = "";
                                                      }
                                                      ?>
                                      <div class="col-lg-4">
                                         <div style="margin-bottom:10px;" class="imageurl">
                                             <?php if(!empty($rsLatest_training[0]['latest_training_image'])){ ?>
                                             <img  id="imgurl" src="<?php echo $latest_training_image; ?>" style="max-width:400px; padding:5px; border:solid 1px #ccc;"><?php } ?></div> 
                                                <input type="text" name="latest_training_imageurl" readonly="readonly" id="imageurl" class="form-control" value="<?php echo $latest_training_image; ?>" onchange="setVal(this);">
                                                <div style="margin-right:10px;">
                                                     <a class="btn btn-outline-primary btn-sm" data-toggle="modal"  href="javascript:;" data-target="#Modalimageurl" onClick="openKCFinder('categoryimageurl');" id="link-file" class="link"><i class="icon-eye-open"></i></a>
                                                    <a class="btn btn-outline-primary btn-sm" onClick="reset_value('imageurl');" id="link-file" class="link"><i class="icon-refresh"></i></a>
                                                 </div>
                                                <span class="m-form__help" style="color:#00F;">
                                                   width and height optimal is 240px x 240px
                                                </span>
                                                <script>
                                            function setVal(sel)
                                                {
                                                    var url =sel.value;
                                                    $("#imgurl").attr("src", url);

                                                  }
                                            </script>
                                        </div>
                                </div>
                                 
                                <div class="modal fade" id="Modalimageurl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                                        <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                        <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">
                                                                                &times;
                                                                        </span>
                                                                </button>
                                                        </div>
                                                    <div class="modal-body">
                                                        <iframe height="100%" width="100%" class="filemanager" src="<?=TOOLS_BASE_URL;?>/filemanager/dialog.php?type=1&field_id=imageurl&akey=2063c1608d6e0baf80249c42e2be5804&fldr=" frameborder="0" style="overflow: scroll; overflow-x: hidden; overflow-y: scroll;  min-height: 400px;"></iframe>
                                                </div>
                                                </div>
                                        </div>
                                </div> 
				<div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">latest_training Meta Description</label>
                                        <div class="col-lg-4">
                                          <input name="latest_training_metadescription" type="text" class="form-control" placeholder="latest_training Meta Description" value="<?php echo @$rsLatest_training[0]['latest_training_meta_description']; ?>">
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">latest_training Meta Keywords</label>
                                      <div class="col-lg-4">
                                        <input name="latest_training_metakeywords" type="text" class="form-control" placeholder="latest_training Meta Keywords" value="<?php echo @$rsLatest_training[0]['latest_training_meta_keywords']; ?>">
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
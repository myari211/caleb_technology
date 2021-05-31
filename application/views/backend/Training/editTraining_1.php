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
                                <form name="form1" action="<?php echo BASE_URL_BACKEND.'/'.$controller.'/doEditTraining/'.$rsTraining[0]['training_id']; ?>" method="post" class="form-horizontal" role="form">
                              <?php if(isset($error)){ ?>
                                        <div class="form-group has-error">
                                                <div class="col-lg-12">
                                                      <label for="inputError" class="control-label"><?php echo $error;?></label>
                                                </div>
                                        </div>
                                        <?php } ?>
                                
                                <div class="form-group">
                                    <label for="menu" class="col-lg-2 col-sm-2 control-label">Training Brand</label>
                                        <div class="col-lg-4">
                                        <select class="form-control" name="material_id" id="material_id">
                                            <?php foreach($Material as $mt):?>
                                            <option <?php if($rsTraining[0]['material_id'] == $mt->material_id ) echo 'selected';?> value='<?php echo $mt->material_id;?>'><?php echo $mt->material_title;?> </option>
                                            <?php endforeach ?>
                                        </select> 
                                        </div>
                                </div>
                                 <div class="form-group">
                                    <label for="menu" class="col-lg-2 col-sm-2 control-label">Training Type</label>
                                        <div class="col-lg-4">
                                        <select class="form-control" name="training_type" id="training_type">
                                            <option <?php if($rsTraining[0]['material_id'] == 1 ) echo 'selected';?> value="1"> Close to Public</option>
                                            <option <?php if($rsTraining[0]['material_id'] == 2 ) echo 'selected';?> value="2"> Open to Public</option>
                                        </select>                                    
                                        </div>                          
                                </div>
                               <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Training Title</label>
                                      <div class="col-lg-4">
                                          <input name="training_title" type="text" class="form-control" placeholder="Training Title" value="<?php echo $rsTraining[0]['training_title']; ?>">
                                         <input name="training_titleOld" type="hidden" value="<?php echo $rsTraining[0]['training_title']; ?>">
                                       </div>
                                  </div>
                                 <div class="form-group">
                                      <label for="subjecttitle" class="col-lg-2 col-sm-2 control-label">Training Location</label>
                                      <div class="col-lg-4">
                                                <input name="training_location" type="text" class="form-control" placeholder="training location" value="<?php echo $rsTraining[0]['training_location']; ?>">
                                    </div>
                                </div> 
                                
                                <div class="form-group">
                                    <label for="dtp_input2" class="col-md-2 control-label">Training Date</label>
                                    <div class="input-group date form_date col-md-5" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                        <input class="form-control" size="16" type="text" value="<?php echo $rsTraining[0]['training_date']; ?>" readonly>
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                    </div>
                                        <input type="hidden" id="dtp_input2" name="training_date" value="<?php echo $rsTraining[0]['training_date']; ?>"/><br/>
                                </div>
                                
                                <div class="form-group">
                                    <label for="dtp_input3" class="col-md-2 control-label">Training Start Time</label>
                                    <div class="input-group date form_time col-md-5" data-date="" data-date-format="hh:ii" data-link-field="dtp_input3" data-link-format="hh:ii">
                                        <input class="form-control" size="16" type="text" value="<?php echo $rsTraining[0]['training_start_time']; ?>" readonly>
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                    </div>
                                    <input type="hidden" name="training_start_time" id="dtp_input3" value="<?php echo $rsTraining[0]['training_start_time']; ?>" /><br/>
                                </div>
                                
                                <div class="form-group">
                                    <label for="dtp_input4" class="col-md-2 control-label">Training End Time</label>
                                    <div class="input-group date form_time col-md-5" data-date="" data-date-format="hh:ii" data-link-field="dtp_input4" data-link-format="hh:ii">
                                        <input class="form-control" size="16" type="text" value="<?php echo $rsTraining[0]['training_end_time']; ?>" readonly>
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                    </div>
                                    <input type="hidden" name="training_end_time" id="dtp_input4" value="<?php echo $rsTraining[0]['training_end_time']; ?>" /><br/>
                                </div>
                                    
                                    <div class="form-group">
                                      <label for="inputDescription" class="col-lg-2 col-sm-2 control-label">Training Short Description</label>
                                      <div class="col-lg-10">
										  <textarea id="IDtrainingshortdesc" name="training_shortdesc" class="form-control" placeholder="About Short Description" rows="4"><?php echo $rsTraining[0]['training_short_desc']; ?></textarea>
										  <script>
												CKEDITOR.replace( 'IDtrainingshortdesc', {
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
                                      <label for="inputDescription" class="col-lg-2 col-sm-2 control-label">Training Description</label>
                                      <div class="col-lg-10">
                                            <textarea id="IDcontentdesc" name="training_desc" class="form-control ckeditor" placeholder="Training Description" rows="7"><?php echo $rsTraining[0]['training_desc']; ?></textarea>
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
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Training Images</label>
                                                <?php
                                                      $training_image_thumbs = BASE_URL.str_replace('/admin/images','/admin/.thumbs/images',$rsTraining[0]['training_image']);
                                                      if(!empty($rsTraining[0]['training_image'])){
                                                              $training_image = BASE_URL.$rsTraining[0]['training_image'];
                                                      } else {
                                                              $training_image = "";
                                                      }
                                                      ?>
                                      <div class="col-lg-4">
                                        <div style="margin-bottom:10px;" class="imageurl"><?php if(!empty($rsTraining[0]['training_image'])){ ?><img src="<?php echo $training_image; ?>" style="max-width:400px; padding:5px; border:solid 1px #ccc;"><?php } ?></div>
                                        <input type="text" name="training_imageurl" readonly="readonly" id="imageurl" class="form-control" value="<?php echo $training_image ?>">
                                        <p class="help-block">width and height optimal is 400px x 400px</p>
                                        <div style="margin-right:10px;">
                                                      <a onClick="openKCFinder('imageurl');" id="link-file" class="link">Browse</a>
                                                      <a onClick="reset_value('imageurl');" id="link-file" class="link">Reset</a>
                                         </div>
                                        </div>
                                </div>
                                
                                <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Training Alias URL</label>
                                      <div class="col-lg-4">
                                          <input name="training_alias" type="text" class="form-control" placeholder="Training Alias" value="<?php echo $rsTraining[0]['training_alias']; ?>">
                                          <input name="trainingaliasOld" type="hidden" value="<?php echo $rsTraining[0]['training_alias']; ?>">
                                           </div>
                                  </div>
                                <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Training Meta Description</label>
                                      <div class="col-lg-4">
                                          <input name="training_metadescription" type="text" class="form-control" placeholder="Training Meta Description" value="<?php echo $rsTraining[0]['training_meta_description']; ?>">
                                </div>
                                  </div>
                                <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Training Meta Keywords</label>
                                      <div class="col-lg-4">
                                          <input name="training_metakeywords" type="text" class="form-control" placeholder="Training Meta Keywords" value="<?php echo $rsTraining[0]['training_meta_keywords']; ?>">
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
		$("#IDtrainingtag").select2({
			 tags: true
		});
	});
	</script>
    <link href="<?php echo TOOLS_BASE_URL; ?>/bootstrap-datetimepicker/sample/bootstrap/css/bootstrap_icon.css" rel="stylesheet" type="text/css">
    <link href="<?php echo TOOLS_BASE_URL; ?>/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css">
    
    <script src="<?php echo TOOLS_BASE_URL; ?>/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js" type="text/javascript"></script>
    <script type="text/javascript">

	$('.form_date').datetimepicker({        
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });
    $('.form_time').datetimepicker({
      
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 1,
        minView: 0,
        maxView: 1,
        forceParse: 0
    });

</script>
    <!--common script for all content-->
    <script src="<?php echo JS_BASE_URL; ?>/common-scripts.js"></script>
</body>
</html	
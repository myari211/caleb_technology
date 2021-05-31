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
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Training Title</label>
                                      <div class="col-lg-4">
                                          <input name="training_title" type="text" class="form-control" placeholder="Training Title" value="<?php echo $rsTraining[0]['training_title']; ?>">
                                         <input name="training_titleOld" type="hidden" value="<?php echo $rsTraining[0]['training_title']; ?>">
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
                                      <label for="subjecttitle" class="col-lg-2 col-sm-2 control-label">Training Location</label>
                                      <div class="col-lg-4">
                                                <input name="training_location" type="text" class="form-control" placeholder="training location" value="<?php echo $rsTraining[0]['training_location']; ?>">
                                    </div>
                                </div> 
                                
                                
                                <div class="form-group">
                                    <label for="dtp_input2" class="col-md-2 control-label">Training Date</label>
                                    <div class="input-group date form_date col-md-5" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                        <input class="form-control" size="36" type="text" value="<?php echo date('Y-m-d', strtotime($rsTraining[0]['training_date'])); ?>" readonly>
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                    </div>
                                    <input type="hidden" id="dtp_input2" name="training_date" value="<?php echo date('Y-m-d', strtotime($rsTraining[0]['training_date'])); ?>"/><br/>
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
                                        <div style="margin-bottom:10px;" class="imageurl"><?php if(!empty($rsTraining[0]['training_image'])){ ?>
                                            <img id="imgurl" src="<?php echo $training_image; ?>" style="max-width:400px; padding:5px; border:solid 1px #ccc;"><?php } ?></div>
                                        <input type="text" name="training_imageurl" readonly="readonly" id="imageurl" class="form-control" value="<?php echo $training_image ?>" onchange="setVal(this);">
                                        <p class="help-block">width and height optimal is 400px x 400px</p>
                                         <div style="margin-right:10px;">
                                            <a class="btn btn-outline-primary btn-sm" data-toggle="modal"  href="javascript:;" data-target="#Modalimageurl" onClick="openKCFinder('categoryimageurl');" id="link-file" class="link"><i class="icon-eye-open"></i></a>
                                           <a class="btn btn-outline-primary btn-sm" onClick="reset_value('imageurl');" id="link-file" class="link"><i class="icon-refresh"></i></a>
                                        </div>
                                        </div>
                                      <script>
                                        function setVal(sel)
                                            {
                                                var url =sel.value;
                                                $("#imgurl").attr("src", url);

                                              }
                                        </script>
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
                                        <input name="cancel" class="btn btn-info btn-sm" type="button" value="Cancel" onClick="location.href='<?php echo BASE_URL_BACKEND.'/training'; ?>'">
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
	
	<!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo JS_BASE_URL; ?>/jquery.js"></script>
    <script src="<?php echo JS_BASE_URL; ?>/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="<?php echo JS_BASE_URL; ?>/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?php echo JS_BASE_URL; ?>/jquery.scrollTo.min.js"></script>
    
    <script src="<?php echo JS_BASE_URL; ?>/respond.min.js" ></script>
    <!--date pic-->
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
    <!--common script for all pages-->
    <script src="<?php echo JS_BASE_URL; ?>/common-scripts.js"></script>
</body>
</html	
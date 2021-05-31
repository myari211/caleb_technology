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
                              <?php echo $breadcrump['module_group_name']; ?> - <?php echo $breadcrump['module_name']; ?> - Add
                          </header>
                          <div class="panel-body">
                            <form name="form1" action="<?php echo BASE_URL_BACKEND.'/training/doAddTraining'; ?>" method="post" class="form-horizontal" role="form">
                                  <?php if(isset($error)){ ?>
                                <div class="form-group has-error">
                                        <div class="col-lg-12">
                                              <label for="inputError" class="control-label"><?php echo $error;?></label>
                                        </div>
                                </div>
                                <?php } ?>
                                <div class="form-group">
                                      <label for="subjecttitle" class="col-lg-2 col-sm-2 control-label">Training Title</label>
                                      <div class="col-lg-4">
                                                <input name="training_title" type="text" class="form-control" placeholder="training title" value="<?php if(!empty($training_title)){echo $training_title;} ?>">
                                        </div>
                                </div>
                                
                                
                                <div class="form-group">
                                    <label for="menu" class="col-lg-2 col-sm-2 control-label">Training Type</label>
                                        <div class="col-lg-4">
                                        <select class="form-control" name="training_type" id="training_type">
                                            <option value="1"> Close to Public</option>
                                            <option value="2"> Open to Public</option>
                                        </select>                                    
                                        </div>                          
                                </div>
                                
                                <div class="form-group">
                                      <label for="subjecttitle" class="col-lg-2 col-sm-2 control-label">Training Location</label>
                                      <div class="col-lg-4">
                                                <input name="training_location" type="text" class="form-control" placeholder="training location" value="<?php if(!empty($training_location)){echo $training_location;} ?>">
                                    </div>
                                </div> 
                                
                                <div class="form-group">
                                    <label for="dtp_input2" class="col-md-2 control-label">Training Date</label>
                                    <div class="input-group date form_date col-md-5" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                        <input class="form-control" size="16" type="text" value="<?php if(!empty($training_date)){echo $training_date;} ?>" readonly>
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                    </div>
                                        <input type="hidden" id="dtp_input2" name="training_date" value="<?php if(!empty($training_date)){echo date('Y-m-d', strtotime($training_date));} ?>"/><br/>
                                </div>
                                
                                <div class="form-group">
                                    <label for="dtp_input3" class="col-md-2 control-label">Training Start Time</label>
                                    <div class="input-group date form_time col-md-5" data-date="" data-date-format="hh:ii" data-link-field="dtp_input3" data-link-format="hh:ii">
                                        <input class="form-control" size="16" type="text" value="<?php if(!empty($training_start_time)){echo $training_start_time;} ?>" readonly>
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                    </div>
                                    <input type="hidden" name="training_start_time" id="dtp_input3" value="<?php if(!empty($training_start_time)){echo $training_start_time;} ?>" /><br/>
                                </div>
                                
                                <div class="form-group">
                                    <label for="dtp_input4" class="col-md-2 control-label">Training End Time</label>
                                    <div class="input-group date form_time col-md-5" data-date="" data-date-format="hh:ii" data-link-field="dtp_input4" data-link-format="hh:ii">
                                        <input class="form-control" size="16" type="text" value="<?php if(!empty($training_end_time)){echo $training_end_time;} ?>" readonly>
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                    </div>
                                    <input type="hidden" name="training_end_time" id="dtp_input4" value="<?php if(!empty($training_end_time)){echo $training_end_time;} ?>" /><br/>
                                </div>
                                
                              <div class="form-group">
                                      <label for="inputDescription" class="col-lg-2 col-sm-2 control-label">Training Short Description</label>
                                    <div class="col-lg-10">
                                        <textarea id="IDtrainingshortdesc" name="training_shortdesc" class="form-control" placeholder="About Short Description" rows="4"><?php if(!empty($training_shortdesc)){echo $training_shortdesc;} ?></textarea>
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
                                    <textarea id="IDcontentdesc" name="training_desc" class="form-control ckeditor" placeholder="Training Description" rows="7"><?php if(!empty($training_desc)){echo $training_desc;} ?></textarea>
                                       
                                      </div>
                                </div> 
                                    
                                <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">  Images</label>
                                      <div class="col-lg-4">
                                           <div style="margin-bottom:10px;" class="imageurl">
                                                <img id="imgurl" src="" style="max-width:400px; padding:5px; border:solid 1px #ccc;">                                   
                                                </div>
                                                <input type="text" name="training_imageurl" readonly="readonly" id="imageurl" class="form-control" value="<?php if(!empty($contentimageurl)){echo $contentimageurl;} ?>" onchange="setVal(this);">
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
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Training Alias URL</label>
                                      <div class="col-lg-4">
                                          <input name="training_alias" type="text" class="form-control" placeholder="Training Alias" value="<?php if(!empty($training_alias)){echo $training_alias;} ?>">
                                      </div>
                                </div>
				<div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Training Meta Description</label>
                                    <div class="col-lg-4">
                                        <input name="training_metadescription" type="text" class="form-control" placeholder="Training Meta Description" value="<?php if(!empty($training_metadescription)){echo $training_metadescription;} ?>">
                                    </div>
                                </div>
				<div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Training Meta Keywords</label>
                                    <div class="col-lg-4">
                                          <input name="training_metakeywords" type="text" class="form-control" placeholder="Training Meta Keywords" value="<?php if(!empty($training_metakeywords)){echo $training_metakeywords;} ?>">
                                    </div>
                                </div>
                                
                                
                                  <div class="form-group">
                                      <div class="col-lg-offset-2 col-lg-10">
                                        <input name="tbSave" class="btn btn-info btn-sm" type="submit" value="Save">&nbsp;
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